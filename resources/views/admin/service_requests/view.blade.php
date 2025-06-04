@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3">Service Request Details</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.service_requests') }}">Service Requests</a></li>
                <li class="breadcrumb-item active">Details</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title">Request Information</h5>
                                
                                <div class="mb-4">
                                    <h6>User Details</h6>
                                    <p><strong>Name:</strong> {{ $request->user->name }}</p>
                                    <p><strong>Email:</strong> {{ $request->user->email }}</p>
                                    <p><strong>Phone:</strong> {{ $request->user->mobile }}</p>
                                </div>
                                
                                <div class="mb-4">
                                    <h6>Service Details</h6>
                                    <p><strong>Service Type:</strong> {{ $request->serviceType->name ?? 'N/A' }}</p>
                                    <p><strong>Category:</strong> {{ $request->category->name ?? 'N/A' }}</p>
                                    <p><strong>Sub Category:</strong> {{ $request->subCategory->name ?? 'N/A' }}</p>
                                    <p><strong>Description:</strong> {{ $request->description }}</p>
                                    <p><strong>Special Instructions:</strong> {{ $request->special_instructions }}</p>
                                    <p><strong>Pet in Home:</strong> {{ $request->pet ? 'Yes' : 'No' }}</p>
                                    <p><strong>Preferred Date:</strong> {{ $request->available_date }}</p>
                                </div>
                                
                                @if(($request->images ?? collect())->count() > 0)
                                <div class="mb-4">
                                    <h6>Attachments</h6>
                                    <div class="row">
                                        @foreach($request->images as $image)
                                        <div class="col-md-3 mb-3">
                                            <a href="{{ asset('upload/service/'.$image->attachment_image) }}" target="_blank">
                                                <img src="{{ asset('upload/service/'.$image->attachment_image) }}" class="img-thumbnail" style="max-height: 100px;">
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5 class="card-title mb-0">Request Status</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('admin/service_requests/update_status', $request->id) }}" method="POST">
                                            @csrf
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Current Status</label>
                                                <div>
                                                    <span class="badge bg-{{ 
                                                        $request->status == \App\Models\BookServiceModel::STATUS_APPROVED ? 'success' : 
                                                        ($request->status == \App\Models\BookServiceModel::STATUS_REJECTED ? 'danger' : 'warning') 
                                                    }}">
                                                        {{ $request->status_label }}
                                                    </span>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Update Status</label>
                                                <select name="status" class="form-select" required>
                                                    <option value="{{ \App\Models\BookServiceModel::STATUS_PENDING }}" {{ $request->status == \App\Models\BookServiceModel::STATUS_PENDING ? 'selected' : '' }}>Pending</option>
                                                    <option value="{{ \App\Models\BookServiceModel::STATUS_APPROVED }}" {{ $request->status == \App\Models\BookServiceModel::STATUS_APPROVED ? 'selected' : '' }}>Approve</option>
                                                    <option value="{{ \App\Models\BookServiceModel::STATUS_REJECTED }}" {{ $request->status == \App\Models\BookServiceModel::STATUS_REJECTED ? 'selected' : '' }}>Reject</option>
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Estimated Response Time (if approved)</label>
                                                <input type="text" name="estimated_response_time" class="form-control" value="{{ $request->estimated_response_time }}" placeholder="e.g., 2-3 business days">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Admin Notes</label>
                                                <textarea name="admin_notes" class="form-control" rows="4">{{ $request->admin_notes }}</textarea>
                                            </div>
                                            
                                            <div class="text-end">
                                                <button type="submit" class="btn btn-primary">Update Status</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection