{{-- filepath: d:\Project\laravel\dalapa_web\resources\views\workorder\show.blade.php --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Work Order Detail</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID Workorder</th>
            <td>{{ $workorder->id_workorder }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ ucfirst(str_replace('_', ' ', $workorder->status)) }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $workorder->deskripsi }}</td>
        </tr>
        <tr>
            <th>Segmen</th>
            <td>{{ ucfirst($workorder->segmen) }}</td>
        </tr>
        <tr>
            <th>Created By</th>
            <td>{{ $workorder->user['name'] }}</td>
        </tr>
        <tr>
            <th>Assigned To</th>
            <td>{{ $workorder->assignedUser->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>ID Tiket</th>
            <td>{{ $workorder->id_tiket ?? '-' }}</td>
        </tr>
        <tr>
            <th>Material</th>
            <td>
                {{ $workorder->materials->map(function($material) {
                    return $material->name . ' (Qty: ' . $material->pivot->qty_used . ')';
                })->implode(', ') }}
            </td>
        </tr>
        <tr>
            <th>Photo</th>
            <td>
                @if($workorder->photos->isNotEmpty())
                    @foreach($workorder->photos as $photo)
                        <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Photo" class="img-thumbnail" style="width: 100px; height: 100px;">
                    @endforeach
                @else
                    No photos available.
                @endif
            </td>
        <tr>
            <th>Created At</th>
            <td>{{ $workorder->created_at }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $workorder->updated_at }}</td>
        </tr>
    </table>
    <a href="{{ route('admin.workorder.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection