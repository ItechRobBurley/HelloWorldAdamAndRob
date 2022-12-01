<?php

namespace App\Repositories\PlanetDistanceRepository\FromConfig;

use App\DTOs\PlanetDistanceDto;
use App\Repositories\PlanetDistanceRepository\PlanetDistanceRepositoryInterface;

class PlanetDistanceFromConfigRepository implements PlanetDistanceRepositoryInterface
{
    public function calculate(string $from, string $to): PlanetDistanceDto
    {
        /*
         * ToDo: Convert shit here
         */


        return new PlanetDistanceDto([]);
    }
}
