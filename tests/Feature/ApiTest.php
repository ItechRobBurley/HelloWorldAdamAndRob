<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_zero_distance_with_no_parameters()
    {
        $response = $this->get('/api/hello-world');

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'Message' => 'Hello World',
                'Time to reach destination' => '0 seconds',
                'Distance message travelled' => '0 miles',
                'Origin planet' => 'earth',
                'Destination planet' => 'earth',
            ],
        ]);
    }

    /**
     * @test
     */
    public function it_returns_correct_calculation()
    {
        $response = $this->get('/api/hello-world?' . Arr::Query([
            'from' => 'jupiter',
            'to' => 'saturn',
        ]));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'Message' => 'Hello World',
                'Time to reach destination' => '2159 seconds',
                'Distance message travelled' => '401592178 miles',
                'Origin planet' => 'jupiter',
                'Destination planet' => 'saturn',
            ],
        ]);
    }
}
