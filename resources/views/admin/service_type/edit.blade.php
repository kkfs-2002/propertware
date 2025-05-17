@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <!-- Enhanced Page Header -->
    <div class="page-header d-flex align-items-center justify-content-between">
        <div class="header-title">
            <h1 class="page-title text-dark fw-bold">
                <i class="bi bi-tags me-2 ms-4 mt-3"></i>Edit Service Type
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb ms-4">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="bi bi-house-door me-1"></i> Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/service_type') }}">Service Types</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                </ol>
            </nav>
        </div>
        <div class="header-actions">
            <a href="{{ url('admin/service_type/list') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="body-wrapper-inner">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-light border-bottom p-4">
                            <h5 class="card-title mb-0 text-dark fw-semibold">
                                <i class="bi bi-pencil-square me-2"></i>Edit Service Type Details
                            </h5>
                            <p class="text-muted mb-0 mt-1">Update the service type information below</p>
                        </div>
                        
                        <div class="card-body p-4">
                           <form action="{{ url('admin/service_type/edit_update/'.$getrecord->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
   

                                <!-- Service Type Name Field -->
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label fw-medium">Service Type Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <span class="input-group-text bg-light"><i class="bi bi-tag"></i></span>
                                            <input type="text" 
                                                   name="name" 
                                                   class="form-control @error('name') is-invalid @enderror" 
                                                   required 
                                                   value="{{ old('name', $getrecord->name) }}"
                                                   placeholder="Enter service type name">
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                      
                                <!-- Form Actions -->
                                <div class="row mt-5">
                                    <div class="col-sm-9 offset-sm-3">
                                        <div class="d-flex gap-3">
                                            <button type="reset" class="btn btn-light px-4">
                                                <i class="bi bi-arrow-counterclockwise me-2"></i>Reset
                                            </button>
                                            <button type="submit" class="btn btn-primary px-4">
                                                <i class="bi bi-check-circle me-2"></i>Update Service Type
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .current-image-container {
        border: 1px dashed #dee2e6;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
        background-color: #f8f9fa;
    }
    .form-switch-lg .form-check-input {
        width: 3rem;
        height: 1.5rem;
    }
</style>

@endsection