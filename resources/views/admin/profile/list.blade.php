@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="m-0">Profile Management</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="card profile-card">
                    <div class="card-body p-4">
                        <div class="d-flex flex-column align-items-center">
                            <div class="profile-avatar-wrapper mb-3">
                                @if(!empty($getrecode[0]->profile))
                                    <img src="{{ $getrecode[0]->getImage() }}" class="profile-avatar" alt="Profile Image">
                                @else
                                    <div class="avatar-placeholder bg-gradient-primary">
                                        {{ substr($getrecode[0]->name, 0, 1) }}{{ substr($getrecode[0]->last_name, 0, 1) }}
                                    </div>
                                @endif
                                <div class="edit-overlay">
                                    <a href="{{ url('admin/profile/edit/'.$getrecode[0]->id) }}" class="btn btn-sm btn-light rounded-circle">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </div>
                            
                            <h4 class="mb-1">{{ $getrecode[0]->name }} {{ $getrecode[0]->last_name }}</h4>
                            <span class="text-muted mb-3">System Administrator</span>
                            
                            <div class="d-flex gap-2 mb-4">
                                <a href="mailto:{{ $getrecode[0]->email }}" class="btn btn-outline-primary btn-sm rounded-pill">
                                    <i class="bi bi-envelope me-1"></i> Email
                                </a>
                                <a href="{{ url('admin/profile/edit/'.$getrecode[0]->id) }}" class="btn btn-primary btn-sm rounded-pill">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </a>
                            </div>
                        </div>
                        
                        <div class="profile-details">
                            <div class="detail-item">
                                <div class="detail-content">
                                    <small class="text-muted">Email</small>
                                    <p class="mb-0">{{ $getrecode[0]->email }}</p>
                                </div>
                            </div>
                            
                            <div class="detail-item">
                                <div class="detail-content">
                                    <small class="text-muted">Phone</small>
                                    <p class="mb-0">{{ $getrecode[0]->mobile }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="mb-0">Personal Information</h5>
                            <a href="{{ url('admin/profile/edit/'.$getrecode[0]->id) }}" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-pencil me-1"></i> Edit
                            </a>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-card mb-4">
                                    <label class="info-label">First Name</label>
                                    <p class="info-value">{{ $getrecode[0]->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card mb-4">
                                    <label class="info-label">Last Name</label>
                                    <p class="info-value">{{ $getrecode[0]->last_name }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card mb-4">
                                    <label class="info-label">Email Address</label>
                                    <p class="info-value">{{ $getrecode[0]->email }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-card mb-4">
                                    <label class="info-label">Phone Number</label>
                                    <p class="info-value">{{ $getrecode[0]->mobile }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Custom Text Section -->
                        <div class="custom-text-section mt-4 p-3 bg-light rounded">
                            <h6 class="mb-3">Account Security</h6>
                            <p class="mb-2">Two-Factor Authentication: <strong>Enabled</strong></p>
                            <p class="mb-0">Password last changed: <strong>3 months ago</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary-color: #6366f1;
        --primary-light: #e0e7ff;
        --secondary-color: #64748b;
        --light-color: #f8fafc;
        --dark-color: #1e293b;
        --border-color: #e2e8f0;
    }
    
    .profile-card {
        border-radius: 12px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border: none;
    }
    
    .profile-avatar-wrapper {
        position: relative;
        width: 120px;
        height: 120px;
        border-radius: 50%;
    }
    
    .profile-avatar {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .avatar-placeholder {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.5rem;
        font-weight: bold;
        border: 4px solid white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    
    .edit-overlay {
        position: absolute;
        bottom: 0;
        right: 0;
        background: white;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }
    
    .profile-details {
        margin-top: 1.5rem;
    }
    
    .detail-item {
        padding: 12px 0;
        border-bottom: 1px solid var(--border-color);
    }
    
    .detail-item:last-child {
        border-bottom: none;
    }
    
    .info-card {
        background-color: var(--light-color);
        padding: 12px 16px;
        border-radius: 8px;
    }
    
    .info-label {
        font-size: 0.75rem;
        color: var(--secondary-color);
        margin-bottom: 4px;
    }
    
    .info-value {
        font-weight: 500;
        margin-bottom: 0;
    }
    
    .custom-text-section {
        background-color: #f9fafb;
        border-left: 3px solid var(--primary-color);
    }
    
    .bg-gradient-primary {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    }
    
    @media (max-width: 768px) {
        .profile-avatar-wrapper {
            width: 100px;
            height: 100px;
        }
        
        .avatar-placeholder {
            font-size: 2rem;
        }
    }
</style>

@endsection