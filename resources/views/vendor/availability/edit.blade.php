@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Edit Appointment</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/appointments/list') }}">Appointments</a></li>
                <li class="breadcrumb-item active">Edit Appointment</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Appointment Details</h5>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ url('vendor/appointments/update/'.$getrecord->id) }}" method="post" class="mt-3">
                            @csrf
                            @method('PUT')

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Title <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" 
                                           value="{{ old('title', $getrecord->title) }}" required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Client Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" 
                                           value="{{ $getrecord->client->name ?? 'N/A' }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Appointment Date <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="appointment_date" 
                                           class="form-control @error('appointment_date') is-invalid @enderror" 
                                           value="{{ old('appointment_date', $getrecord->appointment_date) }}" 
                                           min="{{ date('Y-m-d') }}" required>
                                    @error('appointment_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Appointment Time <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="appointment_time" 
                                           class="form-control @error('appointment_time') is-invalid @enderror" 
                                           value="{{ old('appointment_time', $getrecord->appointment_time) }}" required>
                                    @error('appointment_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Duration (minutes)</label>
                                <div class="col-sm-10">
                                    <input type="number" name="duration" class="form-control" 
                                           value="{{ old('duration', $getrecord->duration ?? 30) }}" min="15" max="240">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Notes</label>
                                <div class="col-sm-10">
                                    <textarea name="notes" class="form-control" rows="3">{{ old('notes', $getrecord->notes) }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="status">
                                        <option value="1" {{ old('status', $getrecord->status) == 1 ? 'selected' : '' }}>Confirmed</option>
                                        <option value="2" {{ old('status', $getrecord->status) == 2 ? 'selected' : '' }}>Completed</option>
                                        <option value="0" {{ old('status', $getrecord->status) == 0 ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-1"></i> Update Appointment
                                    </button>
                                    <a href="{{ url('vendor/appointments/list') }}" class="btn btn-outline-secondary">
                                        <i class="bi bi-x-circle me-1"></i> Cancel
                                    </a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection