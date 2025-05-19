@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <!-- Page Header with Breadcrumbs -->
    <div class="page-header d-md-flex justify-content-between align-items-center">
        <div>
            <h1 class="page-title text-dark fw-600 ms-4 mt-3">Service Type Management</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-4">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="bi bi-house-door me-1"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/service_type') }}">Service Types</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add New</li>
                </ol>
            </nav>
        </div>
        <div class="mt-3 mt-md-0">
            <a href="{{ url('admin/service_type/list') }}" class="btn btn-outline-gray-700">
                <i class="bi bi-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-lg-10">
                    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                        <div class="card-header bg-primary-soft bg-gradient p-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-tags fs-4 text-primary me-3"></i>
                                <h5 class="card-title mb-0 text-dark fw-600">Create New Service Type</h5>
                            </div>
                            <p class="text-muted mb-0 mt-1">Fill in the details below to add a new service type</p>
                        </div>
                        
                        <div class="card-body p-5 p-lg-5">
                            <form action="{{ url('admin/service_type/add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                
                                <!-- Service Type Name Field -->
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-500">
                                        Service Type Name <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light"><i class="bi bi-textarea-t"></i></span>
                                        <input type="text" 
                                               name="name" 
                                               id="name"
                                               class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                               required 
                                               value="{{ old('name') }}"
                                               placeholder="e.g. Consultation, Repair, Maintenance">
                                    </div>
                                    @error('name')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">Enter a descriptive name for the service type</div>
                                </div>
                                
                                <!-- Form Actions -->
                                <div class="d-flex justify-content-end gap-3 pt-3">
                                    <button type="reset" class="btn btn-light-gray rounded-2 px-4 py-2">
                                        <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
                                    </button>
                                    <button type="submit" class="btn btn-primary rounded-2 px-4 py-2">
                                        <i class="bi bi-save me-2"></i>Save Service Type
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection