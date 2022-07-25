<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SepomexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(ImportSanLuisPotosiSeeder::class);
        $this->call(ImportSinaloaSeeder::class);
        $this->call(ImportSonoraSeeder::class);
        $this->call(ImportTabascoSeeder::class);
        $this->call(ImportTamaulipasSeeder::class);
        $this->call(ImportTlaxcalaSeeder::class);
        $this->call(ImportVerazruzDeIgnacioDeLaLlaveSeeder::class);
        $this->call(ImportYucatanSeeder::class);
        $this->call(ImportZacatecasSeeder::class);
    }
}
