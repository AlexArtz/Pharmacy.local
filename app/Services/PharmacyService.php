<?php

namespace App\Services;

use App\Repositories\PharmacyRepositoryInterface;
use App\Models\Pharmacy;
use Illuminate\Database\Eloquent\Collection;

class PharmacyService
{
    public function __construct(
        private readonly PharmacyRepositoryInterface $pharmacyRepository
    ) {}

    public function getAllPharmacies(): Collection
    {
        return $this->pharmacyRepository->all();
    }

    public function getPharmacyById(int $id): Pharmacy
    {
        return $this->pharmacyRepository->find($id);
    }
}