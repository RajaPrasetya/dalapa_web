{{-- filepath: d:\Project\laravel\dalapa_web\resources\views\material\show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Material</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">ID Material: {{ $material->id_material }}</h5>
            <p class="card-text"><strong>Nama:</strong> {{ $material->name }}</p>
            <p class="card-text"><strong>Jumlah:</strong> {{ $material->quantity }}</p>
            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($material->price, 2, ',', '.') }}</p>
            <p class="card-text"><strong>Tanggal Dibuat:</strong> {{ $material->created_at->format('d-m-Y H:i') }}</p>
            <p class="card-text"><strong>Terakhir Diperbarui:</strong> {{ $material->updated_at->format('d-m-Y H:i') }}</p>
            <a href="{{ route('material.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection