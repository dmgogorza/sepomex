<?php

namespace App\Imports;

use App\Models\City;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use App\Models\ZipCode;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class SepomexImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $federalEntity = FederalEntity::firstOrCreate([
                'code'              => Str::of($row[7])->padLeft(2, '0'),
                'name'              => $row[4],
            ]);

            if (!empty($row[14]) && !empty($row[5])) {
                $city = City::firstOrCreate([
                    'code'              => Str::of($row[14])->padLeft(2, '0'),
                    'name'              => $row[5],
                    'federal_entity_id' => $federalEntity->id,
                ]);
            }

            $municipality = Municipality::firstOrCreate([
                'code'              => Str::of($row[11])->padLeft(3, '0'),
                'name'              => $row[3],
                'federal_entity_id' => $federalEntity->id,
            ]);

            $settlementType = SettlementType::firstOrCreate([
                'code'              => Str::of($row[10])->padLeft(2, '0'),
                'name'              => $row[2],
            ]);

            $zipCode = ZipCode::firstOrCreate([
                'code'              => Str::of($row[0])->padLeft(5, '0'),
                'federal_entity_id' => $federalEntity->id,
                'city_id'           => $city->id ?? NULL,
                'municipality_id'   => $municipality->id,
            ]);

            Settlement::create([
                'code'              => Str::of($row[12])->padLeft(4, '0'),
                'name'              => $row[1],
                'zone'              => $row[13],
                'zip_code_id'       => $zipCode->id,
                'municipality_id'   => $municipality->id,
                'type_id'           => $settlementType->id,
            ]);
        }
    }
}
