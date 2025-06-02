@extends('app.layouts.layout')

@section('page_title')
    <b>Information about the drug {{ $drug->name }}</b>
@endsection

@section('content')
    <p><strong>Name:</strong> {{ $drug->name }}</p>
    <p><strong>Count:</strong> {{ $drug->count }}</p>
    <p><strong>Disease:</strong> {{ $drug->disease }}</p>
    <p><strong>Price:</strong> {{ $drug->price }}</p>
    <p><strong>Pharmacy:</strong> 
        <a href="/drugs/pharmacy/{{ $drug->pharmacy_id }}">
            {{ $drug->pharmacy->pharmacy_name ?? 'Unknown pharmacy' }}
        </a>
    </p>
    <a href="/drugs">Return to the list of drugs</a>
@endsection