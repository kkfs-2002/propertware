@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1>Book A Service </h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Book A Service </li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title">Your Book A Service </h5>
                            <a href="{{ url('user/book_service/add') }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-plus-circle me-1"></i> New Book A Service 
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Service ID</th>
                                        <th>Request Date</th>
                                        <th>Available Date</th>
                                        <th>Service Type</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>AMC Service</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getrecord as $value)
                                    <tr>
                                        <td>#{{ $value->id }}</td>
                                        <td>{{ date('d M Y', strtotime($value->created_at)) }}</td>
                                        <td>{{ date('d M Y', strtotime($value->available_date)) }}</td>
                                        <td>{{ $value->get_service_type_name->name ?? 'N/A' }}</td>
                                        <td>{{ $value->get_category_name->name ?? 'N/A' }}</td>
                                        <td>{{ $value->get_sub_category_name->name ?? 'N/A' }}</td>
                                        <td>{{ $value->get_amc_free_service->name ?? 'N/A' }}</td>
                                       <td class="text-end">
    <div class="d-flex justify-content-end gap-2">
        <a href="{{ url('user/book_service/edit/'.$value->id) }}" 
           class="btn btn-sm btn-primary d-flex align-items-center gap-1">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
        <a onclick="return confirm('Are you sure you want to delete this request?')" 
           href="{{ url('user/book_service/delete/'.$value->id) }}" 
           class="btn btn-sm btn-danger d-flex align-items-center gap-1">
            <i class="bi bi-trash3"></i> Delete
        </a>
    </div>
</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4">No service requests found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $getrecord->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
