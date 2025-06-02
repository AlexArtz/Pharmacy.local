@extends('app.layouts.layout')

@section('page_title')
    List of Drugs
@endsection

@section('content')
    <div class="mb-6">
        <a href="{{ route('home') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">Back to Home</a>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @guest
        <a href="{{ route('login') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded transition mr-2">Login</a>
        <a href="{{ route('register') }}" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">Register</a>
    @else
        <span>Welcome, {{ Auth::user()->name }}</span>
        <form class="inline" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">Logout</button>
        </form>
    @endguest
    <br><br>

    <form method="GET" action="{{ route('drugs.index') }}">
        <!-- Search by Name -->
        <div class="mb-4">
            <label for="search" class="mr-2">Search by Name:</label>
            <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Enter drug name" class="border rounded px-2 py-1">
        </div>

        <!-- Filter by Disease -->
        <div class="mb-4">
            <label for="disease" class="mr-2">Filter by Disease:</label>
            <select name="disease" id="disease">
                <option value="0">All Diseases</option>
                @foreach ($diseases as $disease)
                    <option value="{{ $disease }}" {{ $disease == $disease_selected ? 'selected' : '' }}>
                        {{ $disease }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Sort by Price -->
        <div class="mb-4">
            <label for="sort" class="mr-2">Sort by Price:</label>
            <select name="sort" id="sort">
                <option value="">None</option>
                <option value="asc" {{ request('sort') == 'asc' ? 'selected' : '' }}>Low to High</option>
                <option value="desc" {{ request('sort') == 'desc' ? 'selected' : '' }}>High to Low</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white font-semibold py-2 px-4 rounded transition">Apply Filters</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Quantity</th>
                <th>Disease</th>
                <th>Price</th>
                <th>Pharmacy</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drugs as $drug)
                <tr>
                    <td>
                        <a href="{{ route('drugs.show', $drug->drug_id) }}">
                            {{ $drug->name }}
                        </a>
                    </td>
                    <td>{{ $drug->count }}</td>
                    <td>{{ $drug->disease }}</td>
                    <td>{{ $drug->price }}</td>
                    <td>
                        <a href="{{ route('pharmacy.show', $drug->pharmacy_id) }}">
                            {{ $drug->pharmacy->pharmacy_name }}
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border p-2 text-center">No drugs found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection