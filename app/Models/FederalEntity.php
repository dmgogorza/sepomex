<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalEntity extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * Get the cities for the federal entity
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    /**
     * Get the municipalities for the federal entity
     */
    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
}
