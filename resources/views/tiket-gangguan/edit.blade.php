@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Tiket Gangguan</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tiket-gangguan.update', $tiketGangguan->id_tiket) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id_tiket" class="form-label">No Tiket</label>
                    <input type="text" class="form-control" id="id_tiket" name="id_tiket" value="{{ $tiketGangguan->id_tiket }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="headline" class="form-label">Headline</label>
                    <input type="text" class="form-control" id="headline" name="headline" value="{{ old('headline', $tiketGangguan->headline) }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Gangguan</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $tiketGangguan->deskripsi) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="open" {{ $tiketGangguan->status == 'open' ? 'selected' : '' }}>OPEN</option>
                        <option value="in_progress" {{ $tiketGangguan->status == 'in_progress' ? 'selected' : '' }}>IN PROGRESS</option>
                        <option value="closed" {{ $tiketGangguan->status == 'closed' ? 'selected' : '' }}>CLOSED</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('tiket-gangguan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection