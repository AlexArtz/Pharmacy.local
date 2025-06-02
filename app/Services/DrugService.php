<?php

namespace App\Services;

use App\DTOs\DrugDTO;
use App\Repositories\DrugRepositoryInterface;
use App\Models\Drug;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use InvalidArgumentException;

class DrugService
{
    public function __construct(
        private readonly DrugRepositoryInterface $drugRepository
    ) {}

    public function getAllDrugs(array $filters = []): array
    {
        $drugs = $this->drugRepository->all($filters);
        $diseases = $this->drugRepository->getDistinctDiseases();
        return [
            'drugs' => $drugs,
            'diseases' => $diseases,
            'disease_selected' => $filters['disease'] ?? '0',
        ];
    }

    public function getDrugById(int $id): Drug
    {
        return $this->drugRepository->find($id);
    }

    public function createDrug(DrugDTO $dto): Drug
    {
        $this->validateDTO($dto);
        return $this->drugRepository->create($dto->toArray());
    }

    public function updateDrug(int $id, DrugDTO $dto): bool
    {
        $this->validateDTO($dto);
        return $this->drugRepository->update($id, $dto->toArray());
    }

    public function deleteDrug(int $id): bool
    {
        return $this->drugRepository->delete($id);
    }

    public function getDrugsByPharmacyId(int $pharmacyId): Collection
    {
        return Drug::where('pharmacy_id', $pharmacyId)->get();
    }

    private function validateDTO(DrugDTO $dto): void
    {
        if (empty($dto->name) || $dto->count < 0 || empty($dto->disease) || $dto->price < 0 || $dto->pharmacy_id <= 0) {
            throw new InvalidArgumentException('Invalid drug data provided.');
        }
    }
}