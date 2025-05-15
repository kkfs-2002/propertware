@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Appointments</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Appointment</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Schedule New Appointment</h5>
                            <a href="{{ url('vendor/appointments/list') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                        </div>
                        
                        <form action="{{ url('vendor/appointments/store') }}" method="post" class="mt-4">
                            @csrf

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Appointment Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control form-control-lg rounded-3" required value="{{ old('title') }}" placeholder="Enter appointment title">
                                    @error('title')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Date <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" name="appointment_date" class="form-control form-control-lg rounded-end" required value="{{ old('appointment_date') }}">
                                    </div>
                                    @error('appointment_date')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Time <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-clock"></i></span>
                                        <input type="time" name="appointment_time" class="form-control form-control-lg rounded-end" required value="{{ old('appointment_time') }}">
                                    </div>
                                    @error('appointment_time')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="d-flex justify-content-end gap-2">
                                        <button type="reset" class="btn btn-outline-secondary px-4">
                                            <i class="bi bi-eraser"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-check-circle"></i> Schedule Appointment
                                        </button>
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