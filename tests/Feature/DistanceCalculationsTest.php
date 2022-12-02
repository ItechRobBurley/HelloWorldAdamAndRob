<?php

namespace Tests\Feature;

use App\Exceptions\LostAPlanetMasterObiWanHasException;
use App\Repositories\PlanetDistanceRepository\PlanetDistanceRepositoryInterface;
use Tests\TestCase;

class DistanceCalculationsTest extends TestCase
{
    /**
     * @test
     */
    public function it_calculates_distance_correctly()
    {
        $distanceRepo = app(PlanetDistanceRepositoryInterface::class);
        $distanceDto = $distanceRepo->calculate('Earth', 'Venus');

        $this->assertEquals(25724767, $distanceDto->distance);
    }

    /**
     * @test
     */
    public function it_calculates_reversed_params_distance_correctly()
    {
        $distanceRepo = app(PlanetDistanceRepositoryInterface::class);
        $distanceDto = $distanceRepo->calculate('Venus', 'Earth');

        $this->assertEquals(25724767, $distanceDto->distance);
    }

    /**
     * @test
     */
    public function it_calculates_same_source_and_destination_distance_as_zero()
    {
        $distanceRepo = app(PlanetDistanceRepositoryInterface::class);
        $distanceDto = $distanceRepo->calculate('Mercury', 'Mercury');

        $this->assertEquals(0, $distanceDto->distance);
    }

    /**
     * @test
     */
    public function it_throws_exception_on_non_existant_planet()
    {
        $this->expectException(LostAPlanetMasterObiWanHasException::class);
        $this->expectExceptionMessage("How Embarrassing");

        $distanceRepo = app(PlanetDistanceRepositoryInterface::class);
        $distanceRepo->calculate('Mercury', 'Tattoine');
    }

}
