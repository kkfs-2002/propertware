@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Appointments</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Edit Appointment</h5>
                            <a href="{{ url('vendor/appointments/list') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                        </div>
                        
                        <form action="{{ url('vendor/appointments/update/'.$getrecord->id) }}" method="post" class="mt-4">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold">Title <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control border-primary" required 
                                           value="{{ old('title', $getrecord->title) }}">
                                    @error('title')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold">Appointment Date <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="appointment_date" class="form-control border-primary" required 
                                           value="{{ old('appointment_date', $getrecord->appointment_date) }}">
                                    @error('appointment_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold">Appointment Time <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="appointment_time" class="form-control border-primary" required 
                                           value="{{ old('appointment_time', $getrecord->appointment_time) }}">
                                    @error('appointment_time')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label fw-bold">Status</label>
                                <div class="col-sm-10">
                                    <select class="form-select border-primary" name="status">
                                        <option value="1" {{ $getrecord->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $getrecord->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-check-circle"></i> Update
                                        </button>
                                        <a href="{{ url('vendor/appointments/list') }}" class="btn btn-light">
                                            <i class="bi bi-x-circle"></i> Cancel
                                        </a>
                                    </div>
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