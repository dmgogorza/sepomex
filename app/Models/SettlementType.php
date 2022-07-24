<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettlementType extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'code',
        'name'
    ];

    /**
     * Get the settlements for the settlement type
     */
    public function settlements()
    {
        return $this->hasMany(Settlement::class);
    }
}
