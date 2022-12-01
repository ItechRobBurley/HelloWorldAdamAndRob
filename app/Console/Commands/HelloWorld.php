<?php

namespace App\Console\Commands;

use App\Http\Resources\HelloWorldResource;
use App\Repositories\PlanetDistanceRepository\PlanetDistanceRepositoryInterface;
use App\Services\PlanetDistanceConversion;
use Illuminate\Console\Command;

class HelloWorld extends Command
{
    protected $signature = 'hello:world {from=Earth} {to=Earth}';

    protected $description = 'Say hello from any world to any other world';

    public function __construct(
        private PlanetDistanceRepositoryInterface $planetDistanceRepository,
        private PlanetDistanceConversion          $planetDistanceConversion
    )
    {
        Command::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $to = $this->argument('to');
        $from = $this->argument('from');

        $distanceDto = $this->planetDistanceRepository->calculate($from, $to);
        $distanceDto = $this->planetDistanceConversion->distanceToSpeed($distanceDto);

        $data = new HelloWorldResource($distanceDto);

        $this->info("Your hello from $from to $to - a distance of " . $data->distance .
            " miles - took " . $data->time . " seconds");

        return Command::SUCCESS;
    }
}
