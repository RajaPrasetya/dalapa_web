{{-- filepath: d:\Project\laravel\dalapa_web\resources\views\workorder\create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Work Order Baru</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.workorder.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" disabled>
                        <option value="open" selected>Open</option>
                        <option value="in_progress">In Progress</option>
                        <option value="closed">Closed</option>
                    </select>
                    <input type="hidden" name="status" value="open">
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="segmen" class="form-label">Segmen</label>
                    <select class="form-select" id="segmen" name="segmen">
                        <option value="">-- Pilih Segmen --</option>
                        <option value="feeder" {{ old('segmen') == 'feeder' ? 'selected' : '' }}>Feeder</option>
                        <option value="distribusi" {{ old('segmen') == 'distribusi' ? 'selected' : '' }}>Distribusi</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="created_by" class="form-label">Dibuat Oleh (User ID)</label>
                    <input type="text" class="form-control" id="created_by" value="{{ auth()->user()->name }}" disabled>
                    <input type="hidden" name="created_by" value="{{ auth()->id() }}">
                </div>

                <div class="mb-3">
                    <label for="assigned_to" class="form-label">Ditugaskan Kepada (User ID)</label>
                    <input type="number" class="form-control" id="assigned_to" name="assigned_to" value="{{ old('assigned_to') }}">
                </div>

                <div class="mb-3">
                    <label for="id_tiket" class="form-label">ID Tiket Gangguan (Opsional)</label>
                    <input type="text" class="form-control" id="id_tiket" name="id_tiket" value="{{ old('id_tiket') }}" maxlength="16">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.workorder.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection