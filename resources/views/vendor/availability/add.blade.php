@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1>Add Availability Slot</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/availability/list') }}">Availability</a></li>
                <li class="breadcrumb-item active">Add Slot</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Create New Availability Slot</h5>
                            <a href="{{ url('vendor/availability/list') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mt-3">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Please fix these issues:</strong>
                                <ul class="mt-2 mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('vendor/availability/add') }}" method="post" class="mt-4">
                            @csrf

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Date <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" name="available_date" class="form-control form-control-lg" 
                                               value="{{ old('available_date') }}" 
                                               min="{{ date('Y-m-d') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Day <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-week"></i></span>
                                        <select name="day" class="form-select form-select-lg" required>
                                            <option value="">Select Day</option>
                                            <option value="Monday" {{ old('day') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                            <option value="Tuesday" {{ old('day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                            <option value="Wednesday" {{ old('day') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                            <option value="Thursday" {{ old('day') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                            <option value="Friday" {{ old('day') == 'Friday' ? 'selected' : '' }}>Friday</option>
                                            <option value="Saturday" {{ old('day') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                            <option value="Sunday" {{ old('day') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Time Slot <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-clock"></i></span>
                                                <input type="time" name="start_time" class="form-control form-control-lg" 
                                                       value="{{ old('start_time', '') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-clock"></i></span>
                                                <input type="time" name="end_time" class="form-control form-control-lg" 
                                                       value="{{ old('end_time', '') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted">End time must be after start time</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Booking Status</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-bookmark-check"></i></span>
                                        <select name="is_booked" class="form-select form-select-lg" required>
                                            <option value="0" {{ old('is_booked') == '0' ? 'selected' : '' }}>Available</option>
                                            <option value="1" {{ old('is_booked') == '1' ? 'selected' : '' }}>Booked</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Slot Status</label>
                                <div class="col-sm-9">
                                    <div class="form-check form-switch form-switch-lg">
                                        <input class="form-check-input" type="checkbox" role="switch" 
                                               name="status" id="statusSwitch" value="1" 
                                               {{ old('status', 1) ? 'checked' : '' }}>
                                        <label class="form-check-label ms-2" for="statusSwitch">
                                            Active (Visible to clients)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="d-flex justify-content-start gap-3">
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-save"></i> Save Slot
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        const startTime = document.querySelector('input[name="start_time"]').value;
        const endTime = document.querySelector('input[name="end_time"]').value;
        
        if (startTime >= endTime) {
            e.preventDefault();
            alert('End time must be after start time!');
            return false;
        }
        
        const dateInput = document.querySelector('input[name="available_date"]');
        const selectedDate = new Date(dateInput.value);
        const selectedDay = document.querySelector('select[name="day"]').value;
        
        // Check if the selected day matches the date's actual day
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const actualDay = days[selectedDate.getDay()];
        
        if (selectedDay !== actualDay) {
            e.preventDefault();
            alert(`The selected date (${actualDay}) doesn't match the chosen day (${selectedDay})!`);
            return false;
        }
        
        return true;
    });
    
    // Automatically set day when date is selected
    const dateInput = document.querySelector('input[name="available_date"]');
    const daySelect = document.querySelector('select[name="day"]');
    
    dateInput.addEventListener('change', function() {
        const selectedDate = new Date(this.value);
        const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const actualDay = days[selectedDate.getDay()];
        
        daySelect.value = actualDay;
    });
});
</script>

@endsection