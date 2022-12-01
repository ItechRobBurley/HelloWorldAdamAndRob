<?php

namespace App\Repositories\PlanetDistanceRepository\FromConfig;

use App\DTOs\PlanetDistanceDto;
use App\Exceptions\LostAPlanetMasterObiWanHasException;
use App\Repositories\PlanetDistanceRepository\PlanetDistanceRepositoryInterface;

class PlanetDistanceFromConfigRepository implements PlanetDistanceRepositoryInterface
{
    public function calculate(string $from, string $to): PlanetDistanceDto
    {
        $from = strtolower($from);
        $to = strtolower($to);

        $distance = config("planets.$from.$to") ?? config("planets.$to.$from") ?? null;

        throw_if(!$distance, new LostAPlanetMasterObiWanHasException("How Embarrassing"));

        return new PlanetDistanceDto($from, $to, $distance);
    }
}
