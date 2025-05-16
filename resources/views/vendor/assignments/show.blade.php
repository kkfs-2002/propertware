@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Assignment Details</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/assignments/list') }}">Assignments</a></li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title mb-0">Assignment Information</h5>
                            <a href="{{ url('vendor/assignments/list') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h6 class="fw-bold text-primary">Title</h6>
                                    <p class="fs-5">{{ $assignment->title }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <h6 class="fw-bold text-primary">Status</h6>
                                    <p>
                                        @if($assignment->status == 1)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h6 class="fw-bold text-primary">Start Date</h6>
                                    <p class="fs-5">{{ $assignment->start_date }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <h6 class="fw-bold text-primary">End Date</h6>
                                    <p class="fs-5">{{ $assignment->end_date }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h6 class="fw-bold text-primary">Description</h6>
                            <div class="border p-3 rounded bg-light">
                                {!! nl2br(e($assignment->description)) !!}
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ url('vendor/assignments/edit', $assignment->id) }}" class="btn btn-primary px-4">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('vendor.assignments.delete', $assignment->id) }}" method="POST" style="display: inline;">
                                           @csrf
                                           @method('delete')
                                              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this assignment?')">
                                                Delete
                                          </button>
                                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection