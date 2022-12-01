<?php

namespace App\Http\Controllers;

use App\Http\Resources\HelloWorldResource;
use App\Repositories\PlanetDistanceRepository\PlanetDistanceRepositoryInterface;
use App\Services\PlanetDistanceConversion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function __construct(
        private PlanetDistanceRepositoryInterface $planetDistanceRepository,
        private PlanetDistanceConversion $planetDistanceConversion
    )
    {
    }

    public function __invoke(Request $request): HelloWorldResource
    {
        $distanceDto = $this->planetDistanceRepository->calculate($request->get('from'), $request->get('to'));

        $distanceToSpeed = $this->planetDistanceConversion->distanceToSpeed($distanceDto);

        return new HelloWorldResource([$distanceDto, $distanceToSpeed]);
    }
}
