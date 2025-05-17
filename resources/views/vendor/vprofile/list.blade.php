@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3">Vendor Profile</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile Management</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                @include('_message')

                <div class="card professional-profile-card">
                    <div class="card-body">
                        <!-- Profile Header -->
                        <div class="profile-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-5 pb-3 border-bottom">
                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                <div class="profile-avatar-container me-4">
                                    @if(!empty($getrecode[0]->profile))
                                        <img src="{{ $getrecode[0]->getImage() }}" class="profile-avatar" alt="Profile Image">
                                    @else
                                        <div class="profile-avatar-placeholder">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <h2 class="profile-name mb-1">{{ $getrecode[0]->name }} {{ $getrecode[0]->last_name }}</h2>
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-primary-light text-primary">Verified Vendor</span>
                                        <span class="profile-status ms-2"><i class="bi bi-check-circle-fill text-success"></i> Active</span>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ url('vendor/vprofile/edit/'.$getrecode[0]->id) }}" class="btn btn-primary">
                                <i class="bi bi-pencil me-2"></i>Edit Profile
                            </a>
                        </div>

                        <div class="row">
                            <!-- Left Column - Personal Info -->
                            <div class="col-lg-5">
                                <div class="profile-section mb-5">
                                    <h5 class="section-title mb-4">Personal Information</h5>
                                    <div class="info-item mb-3">
                                        <label class="info-label">Full Name</label>
                                        <p class="info-value">{{ $getrecode[0]->name }} {{ $getrecode[0]->last_name }}</p>
                                    </div>
                                </div>

                                <div class="profile-section">
                                    <h5 class="section-title mb-4">Contact Information</h5>
                                    <div class="info-item mb-3">
                                        <label class="info-label">Email Address</label>
                                        <p class="info-value">{{ $getrecode[0]->email }}</p>
                                    </div>
                                    <div class="info-item">
                                        <label class="info-label">Phone Number</label>
                                        <p class="info-value">{{ $getrecode[0]->mobile }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Vendor Details -->
                            <div class="col-lg-7">
                                <div class="profile-section mb-5">
                                    <h5 class="section-title mb-4">Vendor Details</h5>
                                    <div class="vendor-details-card">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <label class="detail-label">Vendor ID</label>
                                                    <p class="detail-value">VD-{{ str_pad($getrecode[0]->id, 5, '0', STR_PAD_LEFT) }}</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="detail-item">
                                                    <label class="detail-label">Account Created</label>
                                                    <p class="detail-value">{{ date('M d, Y', strtotime($getrecode[0]->created_at)) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="vendor-description">
                                            <label class="detail-label">Business Overview</label>
                                            <p class="detail-value">
                                                As a registered vendor in our system, you have access to comprehensive tools for managing your products, orders, and customer interactions. 
                                                Your account demonstrates a strong track record of reliability and service excellence. 
                                                For any business inquiries or partnership opportunities, please contact our vendor support team.
                                            </p>
                                        </div>
                                        <div class="vendor-performance mt-3">
                                            <label class="detail-label">Performance Metrics</label>
                                            <div class="performance-stats d-flex">
                                                <div class="stat-item me-4">
                                                    <div class="stat-value">98%</div>
                                                    <div class="stat-label">Order Completion</div>
                                                </div>
                                                <div class="stat-item">
                                                    <div class="stat-value">4.8</div>
                                                    <div class="stat-label">Avg. Rating</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-section">
                                    <h5 class="section-title mb-4">Account Security</h5>
                                    <div class="security-status-card">
                                        <div class="security-item mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="security-icon-container bg-success-light me-3">
                                                    <i class="bi bi-shield-check text-success"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Account Protection</h6>
                                                    <p class="security-description text-muted mb-0">
                                                        Your vendor account is protected by enterprise-grade security measures, 
                                                        including encrypted data transmission and regular system monitoring. 
                                                        We recommend enabling two-factor authentication for enhanced protection.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="security-item">
                                            <div class="d-flex align-items-center">
                                                <div class="security-icon-container bg-primary-light me-3">
                                                    <i class="bi bi-lock text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">Password Security</h6>
                                                    <p class="security-description text-muted mb-0">
                                                        Your password was last updated {{ \Carbon\Carbon::parse($getrecode[0]->updated_at)->diffForHumans() }}. 
                                                        For optimal security, we recommend changing your password every 90 days 
                                                        and using a unique combination of letters, numbers, and special characters.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
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

<style>
    .professional-profile-card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.03);
        overflow: hidden;
    }
    
    .profile-header {
        padding-bottom: 1.5rem;
    }
    
    .profile-avatar-container {
        width: 80px;
        height: 80px;
        border-radius: 10px;
        overflow: hidden;
    }
    
    .profile-avatar {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .profile-avatar-placeholder {
        width: 100%;
        height: 100%;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #adb5bd;
        font-size: 2rem;
    }
    
    .profile-name {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }
    
    .profile-status {
        font-size: 0.75rem;
        color: #6c757d;
    }
    
    .profile-section {
        margin-bottom: 2rem;
    }
    
    .section-title {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1.1rem;
        position: relative;
        padding-bottom: 0.75rem;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background-color: #4e73df;
        border-radius: 3px;
    }
    
    .info-item {
        margin-bottom: 1.5rem;
    }
    
    .info-label {
        font-size: 0.75rem;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 0.25rem;
        display: block;
    }
    
    .info-value {
        font-weight: 500;
        color: #2c3e50;
        font-size: 1rem;
        margin-bottom: 0;
    }
    
    .vendor-details-card {
        background-color: #f8fafc;
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
    }
    
    .detail-item {
        margin-bottom: 1rem;
    }
    
    .detail-label {
        font-size: 0.75rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
        display: block;
    }
    
    .detail-value {
        font-weight: 500;
        color: #2c3e50;
        line-height: 1.6;
    }
    
    .vendor-description {
        margin: 1.5rem 0;
        padding-top: 1rem;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .performance-stats {
        padding: 1rem 0;
    }
    
    .stat-item {
        text-align: center;
    }
    
    .stat-value {
        font-size: 1.5rem;
        font-weight: 600;
        color: #4e73df;
    }
    
    .stat-label {
        font-size: 0.75rem;
        color: #6c757d;
        text-transform: uppercase;
    }
    
    .security-status-card {
        background-color: #fff;
        border-radius: 8px;
        border: 1px solid rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
    }
    
    .security-item {
        padding: 1rem 0;
    }
    
    .security-item:not(:last-child) {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .security-icon-container {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .security-description {
        font-size: 0.875rem;
        line-height: 1.6;
    }
    
    .bg-primary-light {
        background-color: rgba(78, 115, 223, 0.1);
    }
    
    .bg-success-light {
        background-color: rgba(40, 167, 69, 0.1);
    }
    
    @media (max-width: 768px) {
        .profile-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .profile-avatar-container {
            margin-bottom: 1rem;
        }
        
        .performance-stats {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .stat-item {
            margin-bottom: 1rem;
            text-align: left;
        }
    }
</style>

@endsection