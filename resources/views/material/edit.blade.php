{{-- filepath: d:\Project\laravel\dalapa_web\resources\views\material\edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Material</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('material.update', $material->id_material) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id_material" class="form-label">ID Material</label>
                    <input type="text" class="form-control" id="id_material" name="id_material" value="{{ $material->id_material }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Material</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $material->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Jumlah</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $material->quantity) }}" min="0" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $material->price) }}" min="0" step="0.01" required>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('material.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection