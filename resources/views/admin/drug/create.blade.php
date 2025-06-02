@extends('admin.layout')

@section('title', 'Create Drug')

@section('content')
    <h2>Create Drug</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.drugs.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>
        <br>

        <div>
            <label for="count">Quantity</label>
            <input type="number" name="count" id="count" value="{{ old('count') }}" required>
        </div>
        <br>

        <div>
            <label for="disease">Disease</label>
            <input type="text" name="disease" id="disease" value="{{ old('disease') }}" required>
        </div>
        <br>

        <div>
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        </div>
        <br>

        <div>
            <label for="pharmacy_id">Pharmacy</label>
            <select name="pharmacy_id" id="pharmacy_id" required>
                @foreach ($pharmacies as $pharmacy)
                    <option value="{{ $pharmacy->pharmacy_id }}">{{ $pharmacy->pharmacy_name }}</option>
                @endforeach
            </select>
        </div>
        <br>

        <button type="submit">Save</button>
    </form>
@endsection