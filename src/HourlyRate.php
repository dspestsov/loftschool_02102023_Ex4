<?php

namespace src;

class HourlyRate extends Rate
{
    public function __construct(int $distance, int $time, $gps, $driver)
    {
        $this->distanceCost = 0;
        $this->timeCost = 200;
        parent::__construct($distance, $time, $gps, $driver);
    }

    protected function getCalc(): int
    {
        return $this->timeCost * $this->getPeriod();
    }
}