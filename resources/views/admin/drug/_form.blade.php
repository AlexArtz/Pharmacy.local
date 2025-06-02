<form action="{{ $action }}" method="POST">
    @csrf
    @if($method ?? false)
        @method($method)
    @endif

    <div class="mb-4">
        <label class="inline-block min-w-[150px]" for="name">Drug Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $drug->name ?? '') }}" required class="border rounded px-2 py-1">
        @error('name')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="inline-block min-w-[150px]" for="count">Quantity</label>
        <input type="number" name="count" id="count" value="{{ old('count', $drug->count ?? '') }}" required min="0" class="border rounded px-2 py-1">
        @error('count')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="inline-block min-w-[150px]" for="disease">Disease</label>
        <select name="disease" id="disease" required class="border rounded px-2 py-1">
            <option value="">Select Disease</option>
            @foreach($diseases as $disease)
                <option value="{{ $disease }}" {{ old('disease', $drug->disease ?? '') == $disease ? 'selected' : '' }}>
                    {{ $disease }}
                </option>
            @endforeach
        </select>
        @error('disease')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="inline-block min-w-[150px]" for="price">Price</label>
        <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $drug->price ?? '') }}" required min="0.01" class="border rounded px-2 py-1">
        @error('price')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label class="inline-block min-w-[150px]" for="pharmacy_id">Pharmacy</label>
        <select name="pharmacy_id" id="pharmacy_id" required class="border rounded px-2 py-1">
            <option value="">Select Pharmacy</option>
            @foreach($pharmacies as $pharmacy)
                <option value="{{ $pharmacy->pharmacy_id }}" {{ old('pharmacy_id', $drug->pharmacy_id ?? '') == $pharmacy->pharmacy_id ? 'selected' : '' }}>
                    {{ $pharmacy->pharmacy_name }}
                </option>
            @endforeach
        </select>
        @error('pharmacy_id')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <input type="submit" value="Save" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded hover:bg-blue-700 transition">
</form>