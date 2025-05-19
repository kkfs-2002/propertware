@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="mb-2 ms-4 mt-2">Add Time Slot</h1>
                <nav>
                    <ol class="breadcrumb ms-4">
                        <li class="breadcrumb-item"><a href="{{ url('vendor.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('vendor/time_slots/list') }}">Time Slots</a></li>
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
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Time Slot Information</h5>
                    </div>
                    <div class="card-body">
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

                        <form method="POST" action="{{ url('vendor/time_slots/store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="service_id" class="form-label">Service Type <span class="text-danger">*</span></label>
                                <select name="service_id" id="service_id" class="form-select" required>
                                    <option value="">-- Select Service Type --</option>
                                    @foreach($serviceTypes as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="day_of_week" class="form-label">Day of Week <span class="text-danger">*</span></label>
                                <select name="day_of_week" id="day_of_week" class="form-select" required>
                                    <option value="">-- Select Day --</option>
                                    <option value="Monday" {{ old('day_of_week') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                    <option value="Tuesday" {{ old('day_of_week') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                    <option value="Wednesday" {{ old('day_of_week') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                    <option value="Thursday" {{ old('day_of_week') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                    <option value="Friday" {{ old('day_of_week') == 'Friday' ? 'selected' : '' }}>Friday</option>
                                    <option value="Saturday" {{ old('day_of_week') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                    <option value="Sunday" {{ old('day_of_week') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="start_time" class="form-label">Start Time <span class="text-danger">*</span></label>
                                    <input type="time" name="start_time" id="start_time" class="form-control" 
                                           value="{{ old('start_time') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="end_time" class="form-label">End Time <span class="text-danger">*</span></label>
                                    <input type="time" name="end_time" id="end_time" class="form-control" 
                                           value="{{ old('end_time') }}" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="reset" class="btn btn-outline-secondary me-2">
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

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-1"></i> Slot Guidelines</h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h6><i class="bi bi-lightbulb me-1"></i> Best Practices</h6>
                            <ul class="mb-0 ps-3">
                                <li>Set realistic time slots based on service duration</li>
                                <li>Leave buffer time between appointments</li>
                                <li>Consider your working hours and breaks</li>
                            </ul>
                        </div>
                        <div class="alert alert-warning">
                            <h6><i class="bi bi-exclamation-triangle me-1"></i> Important Notes</h6>
                            <ul class="mb-0 ps-3">
                                <li>Slots cannot overlap for the same service</li>
                                <li>Changes may affect existing appointments</li>
                                <li>Double-check times before saving</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection