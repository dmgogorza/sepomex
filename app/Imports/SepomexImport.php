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
            if (!FederalEntity::find($row[7])) {
                FederalEntity::create([
                    'id'                => $row[7],
                    'name'              => $row[4],
                ]);
            }

            if (!empty($row[14]) && !empty($row[5]) && !City::find($row[14])) {
                City::create([
                    'id'                => $row[14],
                    'name'              => $row[5],
                    'federal_entity_id' => $row[7],
                ]);
            }

            if (!Municipality::find($row[11])) {
                Municipality::create([
                    'id'                => $row[11],
                    'name'              => $row[3],
                    'federal_entity_id' => $row[7],
                ]);
            }

            if (!SettlementType::find($row[10])) {
                SettlementType::create([
                    'id'                => $row[10],
                    'name'              => $row[2],
                ]);
            }

            Settlement::create([
                'id'                => $row[11] . str_pad($row[12], 4, '0', STR_PAD_LEFT),
                'name'              => $row[1],
                'zone'              => $row[13],
                'cp'                => $row[0],
                'municipality_id'   => $row[11],
                'internal_id'       => $row[12],
                'type_id'           => $row[10],
            ]);
        }
    }
}
