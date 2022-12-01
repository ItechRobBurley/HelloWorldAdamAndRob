<?php

namespace App\Repositories\PlanetDistanceRepository;

use App\DTOs\PlanetDistanceDto;

interface PlanetDistanceRepositoryInterface
{
    public function calculate(string $from, string $to): PlanetDistanceDto;
}
