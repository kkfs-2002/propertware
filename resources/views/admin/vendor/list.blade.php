@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3">Vendor List</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Vendor List</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">Vendor Management</h5>
                        <a href="{{ url('admin/vendor/add') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Add New Vendor
                        </a>
                    </div>

                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Profile</th>
                                        <th>Vendor Type</th>
                                        <th>Company</th>
                                        <th>Employee ID</th>
                                        <th>Category</th>
                                        <th>Always Assign</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getrecord as $value)
                                        <tr class="text-center">
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->last_name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->mobile }}</td>
                                            <td>
                                                @if($value->Profile)
                                                    <img src="{{ url('upload/profile/'.$value->Profile) }}" class="rounded-circle border" style="height: 50px; width: 50px;" alt="Profile">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                        
                                            <td>{{ $value->vendor_type_name ?? '-' }}</td>
                                            <td>{{ $value->company_name }}</td>
                                            <td>{{ $value->employee_id }}</td>
                                            <td>{{ $value->category_name ?? '-' }}</td>
                                            <td>
                                                <span class="badge bg-{{ $value->always_assign == 1 ? 'success' : 'secondary' }}">
                                                    {{ $value->always_assign == 1 ? 'Yes' : 'No' }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge bg-{{ $value->status == 1 ? 'danger' : 'success' }}">
                                                    {{ $value->status == 1 ? 'InActive' : 'Active' }}
                                                </span>
                                            </td>
                                            <td>
                                            <a href="{{ url('admin/vendor/edit/'.$value->id ) }}" class="btn btn-success">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>

                                            <a onclick=" return confirm('Are you sure you want to delete?')" href="{{ url('admin/vendor/delete/'.$value->id) }}" class="btn btn-danger">
                                        <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                                        </a>
                                        </a>

                                             </td>
                                    
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
