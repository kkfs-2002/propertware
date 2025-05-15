@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <!-- Page Title and Breadcrumb -->
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="mb-2">Add Time Slot</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('vendor/time_slots') }}">Time Slots</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ url('vendor/time_slots/list') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Time Slot Information</h5>
                        <span class="badge bg-success">New Slot</span>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Validation Errors:</strong>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <form method="POST" action="{{ url('vendor/time_slots/store') }}" class="needs-validation" novalidate>
                            @csrf

                            <!-- Service Dropdown -->
                  <div class="mb-4">
                                <label for="service_id" class="form-label">Service <span class="text-danger">*</span></label>
                                <select name="service_id" id="service_id" class="form-select @error('service_id') is-invalid @enderror" required>
                                    <option value="">-- Select Service --</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Day of Week -->
                            <div class="mb-4">
                                <label for="day_of_week" class="form-label">Day of the Week <span class="text-danger">*</span></label>
                                <select name="day_of_week" id="day_of_week" class="form-select @error('day_of_week') is-invalid @enderror" required>
                                    <option value="">-- Select Day --</option>
                                    @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                        <option value="{{ $day }}">{{ $day }}</option>
                                    @endforeach
                                </select>
                                @error('day_of_week')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Start Time -->
                            <div class="mb-4">
                                <label for="start_time" class="form-label">Start Time <span class="text-danger">*</span></label>
                                <input type="time" name="start_time" id="start_time" class="form-control @error('start_time') is-invalid @enderror" required>
                                @error('start_time')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- End Time -->
                            <div class="mb-4">
                                <label for="end_time" class="form-label">End Time <span class="text-danger">*</span></label>
                                <input type="time" name="end_time" id="end_time" class="form-control @error('end_time') is-invalid @enderror" required>
                                @error('end_time')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Form Buttons -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end border-top pt-3">
                                <button type="reset" class="btn btn-outline-danger me-md-2">
                                    <i class="bi bi-x-circle me-1"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Save Slot
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Side Help Panel -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-1"></i> Slot Tips</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <ul class="mb-0 ps-3">
                                <li>Define availability for each service.</li>
                                <li>Use realistic start & end time.</li>
                                <li>Make sure end time is after start time.</li>
                                <li>Can create multiple slots per day.</li>
                            </ul>
                        </div>
                        <div class="alert alert-warning">
                            <ul class="mb-0 ps-3">
                                <li>Slots can't overlap with existing ones.</li>
                                <li>Slot conflicts will throw validation errors.</li>
                                <li>You can always delete slots later.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

@endsection
