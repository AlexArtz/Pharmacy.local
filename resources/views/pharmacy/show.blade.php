@extends('app.layouts.layout')

@section('page_title')
    <b>Pharmacy Information: {{ $pharmacy->pharmacy_name }}</b>
@endsection

@section('content')
    <p><strong>Name:</strong> {{ $pharmacy->pharmacy_name }}</p>
    <p><strong>Street:</strong> {{ $pharmacy->street }}</p>

    <table>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Disease</th>
            <th>Price</th>
        </tr>
        @foreach ($drugs as $drug)
            <tr>
                <td>
                    <a href="{{ route('drugs.show', $drug->drug_id) }}">
                        {{ $drug->name }}
                    </a>
                </td>
                <td>{{ $drug->count }}</td>
                <td>{{ $drug->disease }}</td>
                <td>{{ $drug->price }}</td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="/drugs">View All Pharmacies</a>
@endsection