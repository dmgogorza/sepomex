<?php

namespace App\Imports;

use App\Models\City;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\SettlementType;
use Illuminate\Support\Collection;
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
                'code'              => $row[7],
                'name'              => $row[4],
            ]);

            if (!empty($row[14]) && !empty($row[5])) {
                City::firstOrCreate([
                    'code'              => $row[14],
                    'name'              => $row[5],
                    'federal_entity_id' => $federalEntity->id,
                ]);
            }

            $municipality = Municipality::firstOrCreate([
                'code'              => $row[11],
                'name'              => $row[3],
                'federal_entity_id' => $federalEntity->id,
            ]);

            $settlementType = SettlementType::firstOrCreate([
                'code'              => $row[10],
                'name'              => $row[2],
            ]);

            Settlement::create([
                'code'              => $row[12],
                'name'              => $row[1],
                'zone'              => $row[13],
                'cp'                => $row[0],
                'municipality_id'   => $municipality->id,
                'type_id'           => $settlementType->id,
            ]);
        }
    }
}
