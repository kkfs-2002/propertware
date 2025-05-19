@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3">Vendor Type List</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Vendor Type List</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('_message')

                <div class="card border-0 shadow-sm rounded-3 mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">Vendor Type Management</h5>
                        <a href="{{ url('admin/Vendor_type/add') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Add New Vendor Type
                        </a>
                    </div>

                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Vendor Type Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @forelse($getrecord as $value)
                                <tr>
                                    <td>{{ $value->id }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('admin/Vendor_type/edit/'.$value->id) }}" class="btn btn-success btn-sm">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>

                                        <a onclick="return confirm('Are you sure you want to delete this vendor type?')" 
                                           href="{{ url('admin/Vendor_type/delete/'.$value->id) }}" 
                                           class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash" aria-hidden="true" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No Record Found</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        @if($getrecord->hasPages())
                        <div class="mt-3">
                            {{ $getrecord->links() }}
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection