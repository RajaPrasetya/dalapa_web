@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Tiket Gangguan</h2>
    <form action="{{ route('admin.tiket-gangguan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="headline" class="form-label">Headline</label>
            <input type="text" class="form-control" id="headline" name="headline" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status" required disabled>
                <option value="open" selected>Open</option>
                <option value="in_progress">Dalam Proses</option>
                <option value="selesai">Selesai</option>
            </select>
            <input type="hidden" name="status" value="open">
        </div>
        <button type="submit" class="btn btn-primary">Kirim Tiket</button>
    </form>
</div>
@endsection