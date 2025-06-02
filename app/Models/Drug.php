<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Drug extends Model
{
    use HasFactory;

    protected $primaryKey = 'drug_id';
    protected $fillable = ['name', 'count', 'disease', 'price', 'pharmacy_id'];
    public $timestamps = false;

    /**
     * Get the pharmacy that owns the drug.
     */
    public function pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class, 'pharmacy_id');
    }
}