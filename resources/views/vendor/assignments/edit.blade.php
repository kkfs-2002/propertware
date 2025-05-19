@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2">Edit Assignment</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/assignments/list') }}">Assignments</a></li>
                <li class="breadcrumb-item active">Edit Assignment</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title mb-0">Update Assignment</h5>
                            <a href="{{ url('vendor/assignments/list') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                        </div>

                        <form action="{{ url('vendor/assignments/update', $getrecord->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('put')

                            <!-- Title Field -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Title <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-card-heading"></i></span>
                                        <input type="text" name="title" class="form-control form-control-lg" required 
                                               value="{{ old('title', $getrecord->title) }}">
                                    </div>
                                    @error('title')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description Field -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Description <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-card-text"></i></span>
                                        <textarea name="description" class="form-control form-control-lg" rows="5" required>{{ old('description', $getrecord->description) }}</textarea>
                                    </div>
                                    @error('description')
                                        <div class="text-danger small Mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Start Date Field -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Start Date <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" name="start_date" class="form-control form-control-lg" required 
                                               value="{{ old('start_date', $getrecord->start_date) }}">
                                    </div>
                                    @error('start_date')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- End Date Field -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">End Date <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-calendar-date"></i></span>
                                        <input type="date" name="end_date" class="form-control form-control-lg" required 
                                               value="{{ old('end_date', $getrecord->end_date) }}">
                                    </div>
                                    @error('end_date')
                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status Field -->
                            <div class="row mb-4">
                                <label class="col-sm-3 col-form-label fw-bold">Status</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-toggle-on"></i></span>
                                        <select name="status" class="form-select form-select-lg">
                                            <option value="1" {{ $getrecord->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $getrecord->status == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="row mt-5">
                                <div class="col-sm-9 offset-sm-3">
                                    <div class="d-flex justify-content-start gap-3">
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="bi bi-check-circle"></i> Update Assignment
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

<!-- Client-side validation for date range -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const startDate = new Date(document.querySelector('input[name="start_date"]').value);
        const endDate = new Date(document.querySelector('input[name="end_date"]').value);
        
        if (startDate > endDate) {
            e.preventDefault();
            alert('End date must be after start date!');
            return false;
        }
    });
});
</script>

@endsection