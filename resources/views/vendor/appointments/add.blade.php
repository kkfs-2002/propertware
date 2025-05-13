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
                        <h5 class="card-title">Add New Appointment</h5>
                        
                        <form action="{{ url('vendor/appointments/store') }}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Title <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                                    <span style="color:red">{{ $errors->first('title') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Appointment Date <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="date" name="appointment_date" class="form-control" required value="{{ old('appointment_date') }}">
                                    <span style="color:red">{{ $errors->first('appointment_date') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Appointment Time <span style="color: red;">*</span></label>
                                <div class="col-sm-10">
                                    <input type="time" name="appointment_time" class="form-control" required value="{{ old('appointment_time') }}">
                                    <span style="color:red">{{ $errors->first('appointment_time') }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{ url('vendor/appointments/list') }}" class="btn btn-secondary">Cancel</a>
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