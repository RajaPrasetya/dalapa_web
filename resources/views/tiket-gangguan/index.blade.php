@extends('layouts.app')

@section('title', 'Material Management')

@section('content')
<!-- Main Content -->
<main>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tiket Gangguan</h1>
    </div>

    <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Tiket Open</h5>
                    <p class="card-text">{{ $totalTiketOpen }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Tiket Dalam Proses</h5>
                    <p class="card-text">{{ $totalTiketInProgress }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5 class="card-title">Tiket Selesai</h5>
                    <p class="card-text">{{ $totalTiketClosed }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Example Table -->
    <div class="card mt-4">
        <div class="card-header">
            Daftar Tiket Gangguan
            <a href="{{ route('tiket-gangguan.create') }}" class="btn btn-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Tambah Tiket Gangguan
            </a>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID Tiket</th>
                            <th scope="col">Headline</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Status</th>
                            <th scope="col">Tanggal Dibuat</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tiketGangguans as $tiket)
                        <tr>
                            <th scope="row">#{{ $tiket->id_tiket }}</th>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $tiket->headline }}</td>
                            <td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $tiket->deskripsi }}</td>
                            <td>{{ strtoupper($tiket->status) }}</td>
                            <td>{{ $tiket->created_at->format('d-m-Y') }}</td>
                            <td>
                                <a href="{{ route('tiket-gangguan.show', $tiket->id_tiket) }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('tiket-gangguan.edit', $tiket->id_tiket) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tiket-gangguan.destroy', $tiket->id_tiket) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Laravel pagination links --}}
    <div class="mt-3">
        {{ $tiketGangguans->links('pagination::bootstrap-5') }}
    </div>
</main>
@endsection