@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="fas fa-edit me-2"></i> Edit Maintenance Agreement</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('user/maintenance_agreement/list') }}">Maintenance Agreements</a></li>
                <li class="breadcrumb-item active">Edit Agreement</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @include('_message')

                <div class="card">
                    <div class="card-header bg-white border-bottom-0 py-3">
                        <h5 class="mb-0">Agreement Details</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('user/maintenance_agreement/edit/'.$getrecord->id) }}" method="post">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="agreement_number" class="form-label">Agreement Number</label>
                                    <input type="text" id="agreement_number" name="agreement_number" class="form-control" 
                                           value="{{ old('agreement_number', $getrecord->agreement_number) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="client_name" class="form-label">Client Name</label>
                                    <input type="text" id="client_name" name="client_name" class="form-control" 
                                           value="{{ old('client_name', $getrecord->client_name) }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="service_type" class="form-label">Service Type</label>
                                    <input type="text" id="service_type" name="service_type" class="form-control" 
                                           value="{{ old('service_type', $getrecord->service_type) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-select" required>
                                        <option value="0" {{ $getrecord->status == 0 ? 'selected' : '' }}>Active</option>
                                        <option value="1" {{ $getrecord->status == 1 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control" 
                                           value="{{ old('start_date', $getrecord->start_date) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="next_maintenance_date" class="form-label">Next Maintenance Date</label>
                                    <input type="date" id="next_maintenance_date" name="next_maintenance_date" class="form-control" 
                                           value="{{ old('next_maintenance_date', $getrecord->next_maintenance_date) }}" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="paid_status" class="form-label">Payment Status</label>
                                <select id="paid_status" name="paid_status" class="form-select" required>
                                    <option value="0" {{ $getrecord->paid_status == 0 ? 'selected' : '' }}>Paid</option>
                                    <option value="1" {{ $getrecord->paid_status == 1 ? 'selected' : '' }}>Unpaid</option>
                                </select>
                            </div>

                            <div class="col-12 text-end mt-4">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-check-circle me-1"></i> Update Request
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