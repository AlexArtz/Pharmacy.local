@extends('admin.layout')

@section('title', 'Drug List')


@section('content')
    <h2>Drug List</h2>

    <div class="mb-4">
        <a href="{{ route('admin.drugs.create') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">Add Drug</a>
    </div>

    <table class="border w-full text-center">
        <thead>
            <tr>
                <th class="border p-2">Drug Name</th>
                <th class="border p-2">Quantity</th>
                <th class="border p-2">Disease</th>
                <th class="border p-2">Price</th>
                <th class="border p-2">Pharmacy Name</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drugs as $drug)
                <tr>
                    <td class="border p-2">
                        <a href="{{ route('drugs.show', $drug->drug_id) }}">{{ $drug->name }}</a>
                    </td>
                    <td class="border p-2">{{ $drug->count }}</td>
                    <td class="border p-2">{{ $drug->disease }}</td>
                    <td class="border p-2">{{ $drug->price }}</td>
                    <td class="border p-2">
                        <a href="{{ route('pharmacy.show', $drug->pharmacy_id) }}">
                            {{ $drug->pharmacy->pharmacy_name ?? 'Unknown Pharmacy' }}
                        </a>
                    </td>
                    <td class="border p-2">
                        <a href="{{ route('admin.drugs.edit', $drug->drug_id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.drugs.destroy', $drug->drug_id) }}" method="POST" class="inline-block ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="border p-2 text-center">No drugs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection