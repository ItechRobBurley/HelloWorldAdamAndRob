<?php

namespace Tests\Feature;

use App\DTOs\PlanetDistanceDto;
use App\Services\PlanetDistanceConversion;
use Tests\TestCase;

class DistanceToSpeedTest extends TestCase
{
    /**
     * @test
     */
    public function it_correctly_adds_speed_result_to_dto()
    {
        $dto = app(PlanetDistanceDto::class, [
            'from' => 'X',
            'to' => 'X',
            'distance' => 186500
        ]);

        $convertor = app(PlanetDistanceConversion::class);
        $updatedDto = $convertor->distanceToSpeed($dto);

        $this->assertEquals(1, $updatedDto->time);
    }
}
