<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ZipCodeTest extends TestCase
{
    public function test_success()
    {
        $response = $this->getJson('/api/zip-codes/01000');
        $response->assertStatus(200);
    }

    public function test_not_found()
    {
        $response = $this->getJson('/api/zip-codes/00000');
        $response->assertStatus(404);
    }

    public function test_json_structure_unique_settlement()
    {
        $response = $this->getJson('/api/zip-codes/20000');
        $response->assertJsonStructure($this->get_json_structure());
    }

    public function test_json_structure_multiple_settlements()
    {
        $response = $this->getJson('/api/zip-codes/20010');
        $response->assertJsonStructure($this->get_json_structure());
    }

    private function get_json_structure(): array
    {
        return [
            'zip_code',
            'locality',
            'federal_entity' => [
                'key',
                'name',
                'code',
            ],
            'settlements' => [
                '*' => [
                    'key',
                    'name',
                    'zone_type',
                    'settlement_type' => [
                        'name',
                    ],
                ]
            ],
            'municipality' => [
                'key',
                'name',
            ],
        ];
    }
}
