@extends('layouts.app')

@section('title', 'Material Management')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Materials</h1>
    
    <div class="card mb-4 mt-3">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Material List
            <div class="float-end">
                <a href="{{ route('material.export') }}" class="btn btn-success btn-sm me-2">
                    <i class="fas fa-file-csv"></i> Export CSV
                </a>
                <a href="{{ route('material.create') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add New Material
                </a>
            </div>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="materialsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($materials as $material)
                            <tr>
                                <td>{{ $material->id_material }}</td>
                                <td>{{ $material->name }}</td>
                                <td>{{ $material->quantity }}</td>
                                <td>{{ $material->price }}</td>
                                <td>
                                    <a href="{{ route('material.show', $material->id_material) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('material.edit', $material->id_material) }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('material.destroy', $material->id_material) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this material?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No materials found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-3">
                {{ $materials->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('#materialsTable').DataTable();
    });
</script>
@endsection