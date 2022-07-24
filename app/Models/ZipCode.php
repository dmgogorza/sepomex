<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCode extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'code',
    ];

    /**
     * Get the federal entity of the zip code
     */
    public function federalEntity()
    {
        return $this->belongsTo(FederalEntity::class);
    }

    /**
     * Get the city of the zip code
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the municipality of the zip code
     */
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    /**
     * Get the settlements for the zip code
     */
    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
