<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloWorldCommandTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_zero_with_no_parameters()
    {
        $response = $this->artisan('hello:world');

        $response->assertOk();
        $response->expectsOutput('Your hello from Earth to Earth - a distance of 0 miles - took 0 seconds');
    }

    /**
     * @test
     */
    public function it_returns_correct_calculation_response()
    {
        $response = $this->artisan('hello:world venus uranus');

        $response->assertOk();
        $response->expectsOutput('Your hello from venus to uranus - a distance of 1718388490 miles - took 9239 seconds');
    }
}
