@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Tiket Gangguan</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">No Tiket: {{ $tiketGangguan->id_tiket }}</h5>
            <p class="card-text"><strong>Headline:</strong> {{ $tiketGangguan->headline }}</p>
            <p class="card-text"><strong>Deskripsi Gangguan:</strong> {{ $tiketGangguan->deskripsi }}</p>
            <p class="card-text"><strong>Status:</strong> {{ strtoupper(ucfirst(str_replace('_', ' ', $tiketGangguan->status))) }}</p>
            <p class="card-text"><strong>Tanggal Dibuat:</strong> {{ $tiketGangguan->created_at->format('d-m-Y H:i') }}</p>
            <p class="card-text"><strong>Terakhir Diperbarui:</strong> {{ $tiketGangguan->updated_at->format('d-m-Y H:i') }}</p>
            <a href="{{ route('tiket-gangguan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection