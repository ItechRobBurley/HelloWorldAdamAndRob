<?php

namespace App\Services;

use App\DTOs\PlanetDistanceDto;

class PlanetDistanceConversion
{
    private const LIGHTSPEED_IN_MILES_PER_SECOND = 186000;

    public function distanceToSpeed(PlanetDistanceDto $distanceDto): PlanetDistanceDto
    {
        $distanceDto->time = round($distanceDto->distance / self::LIGHTSPEED_IN_MILES_PER_SECOND);

        return $distanceDto;
    }
}
