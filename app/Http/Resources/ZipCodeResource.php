<?php

namespace App\Http\Resources;

use App\Models\FederalEntity;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ZipCodeResource extends JsonResource
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
            'zip_code' => $this->code,
            'locality' => Str::upper($this->city->name),
            'federal_entity' => new FederalEntityResource($this->federalEntity),
            'settlements' => new SettlementCollection($this->settlements),
            'municipality' => new MunicipalityResource($this->municipality),
        ];
    }
}
