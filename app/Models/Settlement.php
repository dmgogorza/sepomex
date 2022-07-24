<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'code',
        'name',
        'zone',
    ];

    /**
     * Get the settlement type of the settlement
     */
    public function type()
    {
        return $this->belongsTo(SettlementType::class);
    }

    /**
     * Get the municipality of the settlement
     */
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    /**
     * Get the zip code of the settlement
     */
    public function zipCode()
    {
        return $this->belongsTo(ZipCode::class);
    }
}
