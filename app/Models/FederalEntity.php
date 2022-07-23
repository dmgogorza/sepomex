<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FederalEntity extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the cities for the federal entity
     */
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
