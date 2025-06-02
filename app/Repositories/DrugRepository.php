<?php

namespace App\Repositories;

use App\Models\Drug;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;

class DrugRepository implements DrugRepositoryInterface
{
    public function all(array $filters = []): Collection
    {
        $query = Drug::query();

        if (!empty($filters['search'])) {
            $query->where('name', 'like', '%' . $filters['search'] . '%');
        }

        if (!empty($filters['disease']) && $filters['disease'] !== '0') {
            $query->where('disease', $filters['disease']);
        }

        if (!empty($filters['sort']) && in_array($filters['sort'], ['asc', 'desc'])) {
            $query->orderBy('price', $filters['sort']);
        }

        return $query->get();
    }

    public function find(int $id): ?Drug
    {
        return Drug::with('pharmacy')->findOrFail($id);
    }

    public function create(array $data): Drug
    {
        return Drug::create($data);
    }

    public function update(int $id, array $data): bool
    {
        return Drug::findOrFail($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Drug::destroy($id) > 0;
    }

    public function getDistinctDiseases(): SupportCollection
    {
        return cache()->remember('distinct_diseases', now()->addHour(), fn () => Drug::distinct()->pluck('disease')->sort());
    }
}