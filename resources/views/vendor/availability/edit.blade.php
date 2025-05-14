@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Edit Availability</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/availability/list') }}">Availability</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Availability</h5>

                        <form action="{{ url('vendor/availability/update/'.$getrecord->id) }}" method="post">
                            @csrf

                            {{-- Available Date --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Available Date <span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="available_date" class="form-control" required 
                                           value="{{ old('available_date', $getrecord->available_date) }}">
                                    <span style="color:red">{{ $errors->first('available_date') }}</span>
                                </div>
                            </div>

                            {{-- Day (Auto filled based on date) --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Day</label>
                                <div class="col-sm-10">
                                    <input type="text" name="day" class="form-control" readonly 
                                           value="{{ old('day', $getrecord->day) }}">
                                </div>
                            </div>

                            {{-- Start Time --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Start Time <span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="start_time" class="form-control" required 
                                           value="{{ old('start_time', $getrecord->start_time) }}">
                                    <span style="color:red">{{ $errors->first('start_time') }}</span>
                                </div>
                            </div>

                            {{-- End Time --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">End Time <span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="end_time" class="form-control" required 
                                           value="{{ old('end_time', $getrecord->end_time) }}">
                                    <span style="color:red">{{ $errors->first('end_time') }}</span>
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ $getrecord->status == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ $getrecord->status == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Booked --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Booked</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{ $getrecord->is_booked ? 'Yes' : 'No' }}" disabled>
                                    <input type="hidden" name="is_booked" value="{{ $getrecord->is_booked }}">
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ url('vendor/availability/list') }}" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Auto-update Day based on Date --}}
<script>
    document.querySelector('input[name="available_date"]').addEventListener('change', function () {
        let dayInput = document.querySelector('input[name="day"]');
        let selectedDate = new Date(this.value);
        const weekdays = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
        if (!isNaN(selectedDate.getTime())) {
            dayInput.value = weekdays[selectedDate.getDay()];
        } else {
            dayInput.value = '';
        }
    });
</script>

@endsection
