@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Annual Maintenance Contract</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">AMC</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title mb-4 d-flex justify-content-between align-items-center">
                            <span>AMC List</span>
                            <a href="{{ url('admin/amc/add') }}" class="btn btn-primary">Add New AMC</a>
                        </h5>

                        <table class="table table-bordered table-striped">
                            <thead class="table-light">
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
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ number_format($value->amount, 2) }}</td>
                                        <td>{{ !empty($value->business_category) ? 'Common-Area' : 'Residential' }}</td>
                                        <td>{{ $value->series }}</td>
                                        <td>
                                            <a href="{{ url('admin/amc/add_ons/'.$value->id) }}" class="btn btn-warning btn-sm">Add-ons</a>
                                            <a href="{{ url('admin/amc/free_service/'.$value->id) }}" class="btn btn-info btn-sm">Free Service</a>
                                            <a href="{{ url('admin/amc/edit/'.$value->id) }}" class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/amc/delete/'.$value->id) }}" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash" aria-hidden="true" title="Delete"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        
                        {{ $getrecord->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection