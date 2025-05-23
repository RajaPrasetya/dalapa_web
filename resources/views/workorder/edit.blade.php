@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Work Order</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('workorder.update', $workorder->id_workorder) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-3">
                            <label for="id_workorder" class="col-md-4 col-form-label text-md-right">ID Workorder</label>
                            <div class="col-md-6">
                                <input id="id_workorder" type="text" class="form-control @error('id_workorder') is-invalid @enderror" 
                                       name="id_workorder" value="{{ $workorder->id_workorder }}" required readonly>
                                @error('id_workorder')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-right">Status</label>
                            <div class="col-md-6">
                                <select id="status" class="form-control @error('status') is-invalid @enderror" 
                                        name="status" required>
                                    <option value="open" {{ $workorder->status == 'open' ? 'selected' : '' }}>Open</option>
                                    <option value="in_progress" {{ $workorder->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="closed" {{ $workorder->status == 'closed' ? 'selected' : '' }}>Closed</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-right">Deskripsi</label>
                            <div class="col-md-6">
                                <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" 
                                          name="deskripsi" rows="4">{{ $workorder->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="segmen" class="col-md-4 col-form-label text-md-right">Segmen</label>
                            <div class="col-md-6">
                                <select id="segmen" class="form-control @error('segmen') is-invalid @enderror" 
                                        name="segmen">
                                    <option value="">-- Select Segmen --</option>
                                    <option value="feeder" {{ $workorder->segmen == 'feeder' ? 'selected' : '' }}>Feeder</option>
                                    <option value="distribusi" {{ $workorder->segmen == 'distribusi' ? 'selected' : '' }}>Distribusi</option>
                                </select>
                                @error('segmen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="assigned_to" class="col-md-4 col-form-label text-md-right">Assigned To</label>
                            <div class="col-md-6">
                                <select id="assigned_to" class="form-control @error('assigned_to') is-invalid @enderror" 
                                    name="assigned_to">
                                    <option value="">-- Select Teknisi --</option>
                                    @foreach($teknisis as $teknisi)
                                    <option value="{{ $teknisi->id }}" {{ $workorder->assigned_to == $teknisi->id ? 'selected' : '' }}>
                                        {{ $teknisi->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('assigned_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="id_tiket" class="col-md-4 col-form-label text-md-right">ID Tiket</label>
                            <div class="col-md-6">
                                <select id="id_tiket" class="form-control @error('id_tiket') is-invalid @enderror" 
                                        name="id_tiket">
                                    <option value="">-- Select Tiket --</option>
                                    @foreach($tiketGangguans as $ticket)
                                        <option value="{{ $ticket->id_tiket }}" {{ $workorder->id_tiket == $ticket->id_tiket ? 'selected' : '' }}>
                                            {{ $ticket->id_tiket }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_tiket')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                                <a href="{{ route('workorder.index') }}" class="btn btn-secondary">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection