<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pharmacy extends Model
{
    use HasFactory;

    protected $primaryKey = 'pharmacy_id';
    protected $fillable = ['pharmacy_name', 'street'];

    /**
     * Get the drugs for the pharmacy.
     */
    public function drugs(): HasMany
    {
        return $this->hasMany(Drug::class, 'pharmacy_id');
    }
}