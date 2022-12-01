<?php

namespace App\Repositories\PlanetDistanceRepository\FromConfig;

use App\DTOs\PlanetDistanceDto;
use App\Exceptions\LostAPlanetMasterObiWanHasException;
use App\Repositories\PlanetDistanceRepository\PlanetDistanceRepositoryInterface;

class PlanetDistanceFromConfigRepository implements PlanetDistanceRepositoryInterface
{
    public function calculate(string $from, string $to): PlanetDistanceDto
    {
        $distances = config("planets.$from") ?? config("planets.$to") ?? null;
        $distance = $distances[$to] ?? $distances[$from] ?? null;
        throw_if(!$distance, new LostAPlanetMasterObiWanHasException("How Embarrassing"));

        return new PlanetDistanceDto([]);
    }
}
