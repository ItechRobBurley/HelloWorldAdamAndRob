<?php

namespace App\DTOs;

class PlanetDistanceDto
{
    public int $time;

    public function __construct(
        public string $from,
        public string $to,
        public int $distance
    ) {}
}
