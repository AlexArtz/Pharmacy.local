<?php

namespace App\Repositories;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Collection;

class PharmacyRepository implements PharmacyRepositoryInterface
{
    public function all(): Collection
    {
        return Pharmacy::orderBy('pharmacy_name')->get();
    }

    public function find(int $id): ?Pharmacy
    {
        return Pharmacy::with('drugs')->findOrFail($id);
    }
}