<?php

namespace App\Http\Controllers;

use App\Repositories\PharmacyRepositoryInterface;
use Illuminate\View\View;

class PharmacyController extends Controller
{
    protected PharmacyRepositoryInterface $pharmacyRepository;

    public function __construct(PharmacyRepositoryInterface $pharmacyRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
    }

    public function show(int $pharmacy_id): View
    {
        $pharmacy = $this->pharmacyRepository->find($pharmacy_id);
        return view('pharmacy.show', [
            'pharmacy' => $pharmacy,
            'drugs' => $pharmacy->drugs,
        ]);
    }
}