<?php

namespace src;

class StudentRate extends Rate
{
    public function __construct(int $distance, int $time, $gps, $driver)
    {
        $this->distanceCost = 4;
        $this->timeCost = 1;
        parent::__construct($distance, $time, $gps, $driver);
    }
}