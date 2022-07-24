<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class SettlementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'key' => (int) $this->code,
            'name' => Str::upper($this->name),
            'zone_type' => Str::upper($this->zone),
            'settlement_type' => [
                'name' => $this->type->name
            ],
        ];
    }
}
