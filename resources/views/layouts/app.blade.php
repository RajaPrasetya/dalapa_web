<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'DALAPA')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    @yield('body-start')
    @include('layouts.partials.header')

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="d-none d-md-block bg-light sidebar min-vh-100" style="width:240px;">
            @include('layouts.partials.left-sidebar')
        </div>
        <!-- Main Content -->
        <div class="flex-grow-1 px-4 py-4">
            <div class="page-content-tab">
                @yield('content')
            </div>
        </div>
    </div>
    @yield('body-end')
    @stack('scripts')
</body>
</html>