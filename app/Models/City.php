<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'code',
        'name',
    ];

    /**
     * Get the federal entity of the city
     */
    public function federalEntity()
    {
        return $this->belongsTo(FederalEntity::class);
    }
}
