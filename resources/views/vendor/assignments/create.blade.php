@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1>Create Assignment</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/assignments/list') }}">Assignments</a></li>
                <li class="breadcrumb-item active">Create Assignment</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title mb-0">Add New Assignment</h5>
                            <a href="{{ url('vendor/assignments/list') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show mt-3">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                <strong>Please fix these issues:</strong>
                                <ul class="mt-2 mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('vendor/assignments/store') }}" method="post" class="mt-4">
                            @csrf

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-card-heading"></i></span>
                                        <input type="text" name="title" class="form-control form-control-lg" 
                                               value="{{ old('title') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Description <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-text-paragraph"></i></span>
                                        <textarea name="description" class="form-control form-control-lg" rows="3" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Start Date <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" name="start_date" class="form-control form-control-lg" 
                                               value="{{ old('start_date') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">End Date <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" name="end_date" class="form-control form-control-lg" 
                                               value="{{ old('end_date') }}" required>
                                    </div>
                                    <small class="text-muted">End date must be after start date</small>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Status</label>
                                <div class="col-sm-9">
                                    <div class="form-check form-switch form-switch-lg">
                                        <input class="form-check-input" type="checkbox" role="switch" 
                                               name="status" id="statusSwitch" value="1" checked>
                                        <label class="form-check-label ms-2" for="statusSwitch">
                                            Active (Visible to students)
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="d-flex justify-content-start gap-3">
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-save"></i> Create Assignment
                                        </button>
                                        <button type="reset" class="btn btn-outline-secondary px-4">
                                            <i class="bi bi-arrow-counterclockwise"></i> Reset
                                        </button>
                                        <a href="{{ url('vendor/assignments/list') }}" class="btn btn-outline-danger px-4">
                                            <i class="bi bi-x-circle"></i> Cancel
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    
    form.addEventListener('submit', function(e) {
        const startDate = new Date(document.querySelector('input[name="start_date"]').value);
        const endDate = new Date(document.querySelector('input[name="end_date"]').value);
        
        if (startDate >= endDate) {
            e.preventDefault();
            alert('End date must be after start date!');
            return false;
        }
        return true;
    });
});
</script>

@endsection