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
            <td>{{ $workorder->assignee->name ?? '-' }}</td>
        </tr>
        <tr>
            <th>ID Tiket</th>
            <td>{{ $workorder->id_tiket ?? '-' }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $workorder->created_at }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $workorder->updated_at }}</td>
        </tr>
    </table>
    <a href="{{ route('workorder.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection