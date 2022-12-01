<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HelloWorldResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'Message' => 'Hello World',
            'Time to reach destination' => $this->resource->time . ' seconds',
            'Distance message travelled' => $this->resource->distance . ' miles',
            'Origin planet' => $this->resource->from,
            'Destination planet' => $this->resource->to,
        ];
    }
}
