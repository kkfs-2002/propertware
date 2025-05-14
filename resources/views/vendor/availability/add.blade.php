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
                        <h5 class="card-title">Create New Availability Slot</h5>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('vendor/availability/add') }}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Date <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="available_date" class="form-control" 
                                           value="{{ old('available_date') }}" 
                                           min="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Day <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select name="day" class="form-select" required>
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

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Start Time <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="start_time" class="form-control" 
                                           value="{{ old('start_time', '') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">End Time <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="end_time" class="form-control" 
                                           value="{{ old('end_time', '') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
    <label class="col-sm-2 col-form-label">Booking Status</label>
    <div class="col-sm-10">
        <select name="is_booked" class="form-select" required>
            <option value="0" {{ old('is_booked') == '0' ? 'selected' : '' }}>Not Booked</option>
            <option value="1" {{ old('is_booked') == '1' ? 'selected' : '' }}>Booked</option>
        </select>
    </div>
</div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Active Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="status" 
                                               id="statusSwitch" value="1" {{ old('status', 1) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="statusSwitch">
                                            Active
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Save Slot
                                    </button>
                                    <a href="{{ url('vendor/availability/list') }}" class="btn btn-secondary">
                                        <i class="bi bi-x-circle"></i> Cancel
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