@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1>Edit Availability Slot</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/availability/list') }}">Availability</a></li>
                <li class="breadcrumb-item active">Edit Slot</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title mb-0">Update Availability Slot</h5>
                            <a href="{{ url('vendor/availability/list') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                        </div>

                        <form action="{{ url('vendor/availability/update/'.$getrecord->id) }}" method="post" class="mt-3">
                            @csrf

                            <!-- Date Field -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Available Date <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" name="available_date" class="form-control form-control-lg" required 
                                               value="{{ old('available_date', $getrecord->available_date) }}">
                                    </div>
                                    @error('available_date')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Day Field (Auto-filled) -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Day</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-week"></i></span>
                                        <input type="text" name="day" class="form-control form-control-lg" readonly 
                                               value="{{ old('day', $getrecord->day) }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Time Slot Fields -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Time Slot <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-clock"></i></span>
                                                <input type="time" name="start_time" class="form-control form-control-lg" required 
                                                       value="{{ old('start_time', $getrecord->start_time) }}">
                                            </div>
                                            @error('start_time')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-clock"></i></span>
                                                <input type="time" name="end_time" class="form-control form-control-lg" required 
                                                       value="{{ old('end_time', $getrecord->end_time) }}">
                                            </div>
                                            @error('end_time')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted">End time must be after start time</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Field -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Slot Status</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-toggle-on"></i></span>
                                        <select name="status" class="form-select form-select-lg">
                                            <option value="1" {{ $getrecord->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $getrecord->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Booking Status Field -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Booking Status</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-bookmark-check"></i></span>
                                        <input type="text" class="form-control form-control-lg" 
                                               value="{{ $getrecord->is_booked ? 'Booked' : 'Available' }}" disabled>
                                        <input type="hidden" name="is_booked" value="{{ $getrecord->is_booked }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="row mt-5">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="d-flex justify-content-start gap-3">
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-check-circle"></i> Update Slot
                                        </button>
                                        <button type="reset" class="btn btn-outline-secondary px-4">
                                            <i class="bi bi-arrow-counterclockwise"></i> Reset
                                        </button>
                                        <a href="{{ url('vendor/availability/list') }}" class="btn btn-outline-danger px-4">
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

<!-- Auto-update Day based on Date -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const dateInput = document.querySelector('input[name="available_date"]');
    const dayInput = document.querySelector('input[name="day"]');
    
    dateInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const weekdays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        
        if (!isNaN(selectedDate.getTime())) {
            dayInput.value = weekdays[selectedDate.getDay()];
        } else {
            dayInput.value = '';
        }
    });

    // Client-side validation for time slots
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const startTime = document.querySelector('input[name="start_time"]').value;
        const endTime = document.querySelector('input[name="end_time"]').value;
        
        if (startTime >= endTime) {
            e.preventDefault();
            alert('End time must be after start time!');
            return false;
        }
    });
});
</script>

@endsection