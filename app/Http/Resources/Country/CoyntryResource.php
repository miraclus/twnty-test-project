<?php

namespace App\Http\Resources\Country;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoyntryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'country_name' => $this->name,
        ];
    }
}
