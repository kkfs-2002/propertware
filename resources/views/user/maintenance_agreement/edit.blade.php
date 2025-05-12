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

                <div class="card border-0 shadow-sm rounded-3 mt-3">
                    <div class="card-body p-4">
                   <form action="{{ url('user/maintenance_agreement/edit/'.$getrecord->id) }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Agreement Number</label>
                                <input type="text" name="agreement_number" class="form-control" value="{{ old('agreement_number', $getrecord->agreement_number) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Client Name</label>
                                <input type="text" name="client_name" class="form-control" value="{{ old('client_name', $getrecord->client_name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Service Type</label>
                                <input type="text" name="service_type" class="form-control" value="{{ old('service_type', $getrecord->service_type) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Start Date</label>
                                <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $getrecord->start_date) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Next Maintenance Date</label>
                                <input type="date" name="next_maintenance_date" class="form-control" value="{{ old('next_maintenance_date', $getrecord->next_maintenance_date) }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="0" {{ $getrecord->status == 0 ? 'selected' : '' }}>Active</option>
                                    <option value="1" {{ $getrecord->status == 1 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Paid Status</label>
                                <select name="paid_status" class="form-select" required>
                                    <option value="0" {{ $getrecord->paid_status == 0 ? 'selected' : '' }}>Paid</option>
                                    <option value="1" {{ $getrecord->paid_status == 1 ? 'selected' : '' }}>Unpaid</option>
                                </select>
                            </div>

                     
                                <button type="submit" class="btn btn-primary">Update Agreement</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
