@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2"><i class="fas fa-concierge-bell me-2"></i>Service Types</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Service Type</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card border-0 shadow-lg rounded-3">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Service Type List</h5>
                            <a href="{{ url('admin/service_type/add') }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-plus-circle me-1"></i> Add New
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover align-middle text-center">
                                <thead class="table-light">
                                    <tr>
                                        <th>#ID</th>
                                        <th>Service Type Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getrecord as $value)
                                    <tr>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>
                                            <a href="{{ url('admin/service_type/edit/'.$value->id) }}" class="btn btn-outline-success btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url('admin/service_type/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger btn-sm" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-muted text-center">No service types found.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        {{-- Pagination --}}
                        <div class="d-flex justify-content-center mt-4">
                            {{ $getrecord->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
