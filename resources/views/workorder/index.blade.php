@extends('layouts.app')

@section('title', 'Work Order Management')

@section('content')
<main>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Work Order</h1>
    </div>

    <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card text-bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Work Order Open</h5>
                    <p class="card-text">{{ $totalWorkorderOpen ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Work Order Dalam Proses</h5>
                    <p class="card-text">{{ $totalWorkorderInProgress ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-bg-success">
                <div class="card-body">
                    <h5 class="card-title">Work Order Tutup</h5>
                    <p class="card-text">{{ $totalWorkorderClosed ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div class="card mt-4">
        <div class="card-header">
            Daftar Work Order
            <a href="{{ route('admin.workorder.create') }}" class="btn btn-primary btn-sm float-end">
                <i class="fas fa-plus"></i> Tambah Work Order
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">ID Work Order</th>
                            <th scope="col">Status</th>
                            <th scope="col">Segmen</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tanggal Dibuat</th>
                            <th scope="col">Ditugaskan Kepada</th>
                            <th scope="col">ID Tiket</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($workorders as $workorder)
                        <tr>
                            <th scope="row">{{ $workorder->id_workorder }}</th>
                            <td>{{ strtoupper($workorder->status) }}</td>
                            <td>{{ ucfirst($workorder->segmen) ?? '-' }}</td>
                            <td>{{ Str::limit($workorder->deskripsi, 40) }}</td>
                            <td>{{ $workorder->created_at->format('d-m-Y') }}</td>
                            <td>{{ $workorder->assignedUser->name ?? 'N/A' }}</td>
                            <td>{{ $workorder->id_tiket ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.workorder.show', $workorder->id_workorder) }}" class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('admin.workorder.edit', $workorder->id_workorder) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.workorder.destroy', $workorder->id_workorder) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No work orders found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Pagination -->
    <div class="mt-3">
        {{ $workorders->links('pagination::bootstrap-5') }}
    </div>
</main>
@endsection