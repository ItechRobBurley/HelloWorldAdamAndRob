<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HelloWorldResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Hello World',
            'time to reach destination' => $this->resource->time,
            'distance message travelled' => $this->resource->distance,
            'origin planet' => $this->resource->from,
            'destination planet' => $this->resource->to,
        ];
    }
}
