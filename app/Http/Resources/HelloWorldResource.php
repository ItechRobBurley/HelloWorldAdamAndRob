<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HelloWorldResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'message' => 'Hello World'
        ];
    }
}
