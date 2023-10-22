<?php

namespace src;

abstract class Rate implements RateInterface
{
    protected $distanceCost;
    protected $timeCost;
    protected $distance;
    protected $time;
    protected $gps;
    protected $driver;

    public function __construct(int $distance, int $time, $gps, $driver)
    {
        $this->distance = $distance;
        $this->time = $time;
        $this->gps = (bool) $gps;
        $this->driver = (bool) $driver;
    }

    protected function getCalc(): int
    {
        return $this->distanceCost * $this->distance + $this->timeCost * $this->time;
    }

    protected function getPeriod(): int
    {
        return ($this->time % 60 > 0) ? ($this->time / 60 + 1) : ($this->time / 60);
    }

    protected function calcWithOptions(): int
    {
        $sum = $this->getCalc();
        if ($this->gps) {
            $sum += 15 * $this->getPeriod();
        }
        if ($this->driver) {
            $sum += 100;
        }
        return $sum;
    }

    public function calcCost():array
    {
        return [
            'distanceCost' => $this->distanceCost,
            'timeCost' => $this->timeCost,
            'calc' => $this->calcWithOptions()
        ];
    }
}