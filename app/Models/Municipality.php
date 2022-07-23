<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the federal entity of the municipality
     */
    public function federalEntity()
    {
        return $this->belongsTo(FederalEntity::class);
    }
}