<?php

namespace Database\Seeders;

use App\Imports\SepomexImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ImportCiudadDeMexicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new SepomexImport, database_path() .'/csv/Ciudad de México.csv');
    }
}
