<?php

namespace src;

class BasicRate extends Rate
{
    public function __construct(int $distance, int $time, $gps, $driver)
    {
        $this->distanceCost = 10;
        $this->timeCost = 3;
        parent::__construct($distance, $time, $gps, $driver);
    }
}