<?php

namespace App\Repositories;

use App\Models\Drug;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;

interface DrugRepositoryInterface
{
    public function all(array $filters = []): Collection;
    public function find(int $id): ?Drug;
    public function create(array $data): Drug;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function getDistinctDiseases(): SupportCollection;
}