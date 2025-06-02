<?php

namespace App\Providers;

use App\Repositories\DrugRepository;
use App\Repositories\DrugRepositoryInterface;
use App\Repositories\PharmacyRepository;
use App\Repositories\PharmacyRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(DrugRepositoryInterface::class, DrugRepository::class);
        $this->app->bind(PharmacyRepositoryInterface::class, PharmacyRepository::class);
    }
}