<?php

namespace App\Repositories;

use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Collection;

interface PharmacyRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?Pharmacy;
}