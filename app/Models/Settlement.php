<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'zone',
        'cp',
    ];

    /**
     * Get the settlement type of the settlement
     */
    public function settlementType()
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
}
