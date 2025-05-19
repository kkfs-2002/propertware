@extends('user.layouts.app')

@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2"><i class="fas fa-file-contract"></i> Add Maintenance Agreement</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Add Maintenance Agreement</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Maintenance Agreement Registration Form</h5>

                        <form action="{{ url('user/maintenance_agreement/store') }}" method="POST">
                            @csrf

                            <div class="row g-3">
                                <!-- Agreement Number -->
                                <div class="col-md-6">
                                    <label class="form-label">Agreement Number <span class="text-danger">*</span></label>
                                    <input type="text" name="agreement_number" class="form-control shadow-sm" 
                                           value="{{ old('agreement_number') }}" required>
                                    @error('agreement_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Client Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Client Name <span class="text-danger">*</span></label>
                                    <input type="text" name="client_name" class="form-control shadow-sm" 
                                           value="{{ old('client_name') }}" required>
                                    @error('client_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Service Type -->
                                <div class="col-md-6">
                                    <label class="form-label">Service Type <span class="text-danger">*</span></label>
                                    <input type="text" name="service_type" class="form-control shadow-sm" 
                                           value="{{ old('service_type') }}" required>
                                    @error('service_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Start Date -->
                                <div class="col-md-6">
                                    <label class="form-label">Start Date <span class="text-danger">*</span></label>
                                    <input type="date" name="start_date" class="form-control shadow-sm" 
                                           value="{{ old('start_date') }}" required>
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control shadow-sm" required>
                                        <option value="">Select Status</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Active</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Paid Status -->
                                <div class="col-md-6">
                                    <label class="form-label">Paid Status <span class="text-danger">*</span></label>
                                    <select name="paid_status" class="form-control shadow-sm" required>
                                        <option value="0" {{ old('paid_status') == '0' ? 'selected' : '' }}>Paid</option>
                                        <option value="1" {{ old('paid_status') == '1' ? 'selected' : '' }}>Unpaid</option>
                                    </select>
                                    @error('paid_status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Next Maintenance Date -->
                                <div class="col-md-6">
                                    <label class="form-label">Next Maintenance Date <span class="text-danger">*</span></label>
                                    <input type="date" name="next_maintenance_date" class="form-control shadow-sm" 
                                           value="{{ old('next_maintenance_date') }}" required>
                                    @error('next_maintenance_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-save me-2"></i> Submit
                                    </button>
                                    <a href="{{ url('user/maintenance_agreement/list') }}" class="btn btn-outline-secondary px-4 py-2 ms-3">
                                        <i class="bi bi-arrow-left me-2"></i> Back to List
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

@endsection