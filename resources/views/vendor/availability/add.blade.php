@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Availability</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Availability Slot</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Availability Slot</h5>
                        
                        <form action="{{ url('vendor/availability/store') }}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Day <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <select name="day" class="form-control" required>
                                        <option value="">Select Day</option>
                                        <option value="Monday" {{ old('day') == 'Monday' ? 'selected' : '' }}>Monday</option>
                                        <option value="Tuesday" {{ old('day') == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                        <option value="Wednesday" {{ old('day') == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                        <option value="Thursday" {{ old('day') == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                        <option value="Friday" {{ old('day') == 'Friday' ? 'selected' : '' }}>Friday</option>
                                        <option value="Saturday" {{ old('day') == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                        <option value="Sunday" {{ old('day') == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                    </select>
                                    <span style="color:red">{{ $errors->first('day') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Start Time <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="start_time" class="form-control" required value="{{ old('start_time') }}">
                                    <span style="color:red">{{ $errors->first('start_time') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">End Time <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="end_time" class="form-control" required value="{{ old('end_time') }}">
                                    <span style="color:red">{{ $errors->first('end_time') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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

@endsection