<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloWorldRequest;
use App\Http\Resources\HelloWorldResource;
use App\Repositories\PlanetDistanceRepository\PlanetDistanceRepositoryInterface;
use App\Services\PlanetDistanceConversion;
use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    public function __construct(
        private PlanetDistanceRepositoryInterface $planetDistanceRepository,
        private PlanetDistanceConversion          $planetDistanceConversion
    ) {}

    public function index(HelloWorldRequest $request): HelloWorldResource
    {
        $distanceDto = $this->planetDistanceRepository->calculate(
            $request->get('from', 'Earth'),
            $request->get('to', 'Earth')
        );

        $distanceDto = $this->planetDistanceConversion->distanceToSpeed($distanceDto);

        return new HelloWorldResource($distanceDto);
    }
}
