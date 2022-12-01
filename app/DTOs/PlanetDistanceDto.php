<?php

namespace App\DTOs;

class PlanetDistanceDto
{
    public function __construct(
        public string $from,
        public string $to,
        public int $distance
    ) {}
}
