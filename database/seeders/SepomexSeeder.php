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
        $this->call(ImportAguascalientesSeeder::class);
        $this->call(ImportBajaCaliforniaSeeder::class);
        $this->call(ImportBajaCaliforniaSurSeeder::class);
        $this->call(ImportCampecheSeeder::class);
        $this->call(ImportChiapasSeeder::class);
        $this->call(ImportChihuahuaSeeder::class);
        $this->call(ImportCiudadDeMexicoSeeder::class);
        $this->call(ImportCoahuilaDeZaragozaSeeder::class);
        $this->call(ImportColimaSeeder::class);
        $this->call(ImportDurangoSeeder::class);
        $this->call(ImportGuanajuatoSeeder::class);
        $this->call(ImportGuerreroSeeder::class);
        $this->call(ImportHidalgoSeeder::class);
        $this->call(ImportJaliscoSeeder::class);
        $this->call(ImportMexicoSeeder::class);
        $this->call(ImportMichoacanDeOcampoSeeder::class);
        $this->call(ImportMorelosSeeder::class);
        $this->call(ImportNayaritSeeder::class);
        $this->call(ImportNuevoLeonSeeder::class);
        $this->call(ImportOaxacaSeeder::class);
        $this->call(ImportPueblaSeeder::class);
        $this->call(ImportQueretaroSeeder::class);
        $this->call(ImportQuintanaRooSeeder::class);
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
