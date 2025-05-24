@extends('layouts.app')

@section('content')
 <!-- Main Content -->
        <main >
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Dashboard</h1>
            </div>

            <!-- Dashboard Cards -->
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-bg-primary">
                        <div class="card-body">
                            <h5 class="card-title">Teknisi</h5>
                            <p class="card-text">{{ $teknisi }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Tiket Gangguan</h5>
                            <p class="card-text">{{ $tiketGangguan }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Work Order</h5>
                            <p class="card-text">{{ $workOrder }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Example Table -->
            <div class="card mt-4">
                <div class="card-header">
                    Recent Activity
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($activities as $index => $activity)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $activity->user ? $activity->user->name : 'System' }}</td>
                                        <td>{{ $activity->action }}</td>
                                        <td>{{ $activity->description }}</td>
                                        <td>{{ $activity->created_at->format('Y-m-d H:i') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No recent activity found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
@endsection