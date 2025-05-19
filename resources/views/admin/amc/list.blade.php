@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3">Annual Maintenance Contract</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">AMC</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card shadow-sm border-0 rounded-3 mt-3">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">AMC List</h5>

                         <div class="d-flex gap-1"> 
                        <a href="{{ url('admin/amc/report') }}" class="btn btn-sm btn-secondary me-2">
            <i class="bi bi-file-earmark-pdf"></i> Download PDF
        </a>
                          
                        <a href="{{ url('admin/amc/add') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Add New AMC
                        </a>
                    </div>
                    </div>
</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Business Category</th>
                                        <th>Series</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getrecord as $value)
                                        <tr class="text-center">
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>Rs. {{ number_format($value->amount, 2) }}</td>
                                            <td>{{ $value->business_category ? 'Common-Area' : 'Residential' }}</td>
                                            <td>{{ $value->series }}</td>
                                            <td>
                                                <div class="d-flex flex-wrap justify-content-center gap-1">
                                                    <a href="{{ url('admin/amc/add_ons/'.$value->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="bi bi-plus-square"></i> Add-ons
                                                    </a>
                                                    <a href="{{ url('admin/amc/free_service/'.$value->id) }}" class="btn btn-info btn-sm text-white">
                                                        <i class="bi bi-gift"></i> Free Service
                                                    </a>
                                                    <a href="{{ url('admin/amc/edit/'.$value->id) }}" class="btn btn-success btn-sm">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/amc/delete/'.$value->id) }}" class="btn btn-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted">No records found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $getrecord->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
