<?php

namespace App\Http\Controllers;

use App\DTOs\DrugDTO;
use App\Services\DrugService;
use App\Services\PharmacyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class DrugController extends Controller
{
    public function __construct(
        private readonly DrugService $drugService,
        private readonly PharmacyService $pharmacyService
    ) {}

    public function index(Request $request): View
    {
        $filters = $request->only(['search', 'disease', 'sort']);
        $data = $this->drugService->getAllDrugs($filters);
        return view('drugs.index', $data);
    }

    public function adminIndex(Request $request): View
    {
        $filters = $request->only(['search', 'disease', 'sort']);
        $data = $this->drugService->getAllDrugs($filters);
        return view('admin.drug.list', $data);
    }

    public function create(): View
    {
        $pharmacies = $this->pharmacyService->getAllPharmacies();
        return view('admin.drug.create', ['pharmacies' => $pharmacies]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'disease' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'pharmacy_id' => 'required|integer|exists:pharmacies,pharmacy_id',
        ]);

        $dto = new DrugDTO($validated);
        $this->drugService->createDrug($dto);

        return Redirect::route('admin.drugs.index')->with('success', 'Drug created successfully.');
    }

    public function show(int $id): View
    {
        $drug = $this->drugService->getDrugById($id);
        return view('drugs.show', ['drug' => $drug]);
    }

    public function edit(int $id): View
    {
        $drug = $this->drugService->getDrugById($id);
        $pharmacies = $this->pharmacyService->getAllPharmacies();
        return view('admin.drug.edit', [
            'drug' => $drug,
            'pharmacies' => $pharmacies,
        ]);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'count' => 'required|integer|min:0',
            'disease' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'pharmacy_id' => 'required|integer|exists:pharmacies,pharmacy_id',
        ]);

        $dto = new DrugDTO($validated);
        $this->drugService->updateDrug($id, $dto);

        return Redirect::route('admin.drugs.index')->with('success', 'Drug updated successfully.');
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->drugService->deleteDrug($id);
        return Redirect::route('admin.drugs.index')->with('success', 'Drug deleted successfully.');
    }
}