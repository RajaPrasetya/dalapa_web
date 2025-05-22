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
                            <p class="card-text">1,234</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-bg-success">
                        <div class="card-body">
                            <h5 class="card-title">Tiket Gangguan</h5>
                            <p class="card-text">$12,345</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card text-bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">Work Order</h5>
                            <p class="card-text">56</p>
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
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>John Doe</td>
                                    <td>Logged in</td>
                                    <td>2024-06-01</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jane Smith</td>
                                    <td>Updated profile</td>
                                    <td>2024-06-01</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
@endsection