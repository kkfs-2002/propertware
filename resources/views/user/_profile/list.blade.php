@extends('user.layouts.app')

@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1>Profile Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">User Profile</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                @include('_message')

                <div class="card modern-profile-card">
                    <div class="card-body p-0">
                        <!-- Profile Header -->
                        <div class="profile-cover">
                            <div class="cover-photo" style="background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);"></div>
                            <div class="profile-header-content">
                                <div class="profile-avatar-container">
                                    @if(!empty($getrecode[0]->profile))
                                        <img src="{{ $getrecode[0]->getImage() }}" class="profile-avatar" alt="Profile Image">
                                    @else
                                        <div class="profile-avatar-placeholder">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="profile-info">
                                    <h2 class="profile-name">{{ $getrecode[0]->name }} {{ $getrecode[0]->last_name }}</h2>
                                    <p class="profile-title">Member since {{ date('M Y', strtotime($getrecode[0]->created_at)) }}</p>
                                    
                                    <div class="profile-actions">
                                        <a href="{{ url('user/_profile/edit/'.$getrecode[0]->id) }}" class="btn btn-edit">
                                            <i class="bi bi-pencil"></i> Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Profile Content -->
                        <div class="profile-content-tabs">
                            <ul class="nav nav-tabs" id="profileTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab">
                                        <i class="bi bi-person-lines-fill me-2"></i>Overview
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab">
                                        <i class="bi bi-clock-history me-2"></i>Activity
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab">
                                        <i class="bi bi-gear me-2"></i>Settings
                                    </button>
                                </li>
                            </ul>
                            
                            <div class="tab-content p-4" id="profileTabsContent">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade show active" id="overview" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <!-- Personal Information -->
                                            <div class="card mb-4">
                                                <div class="card-header bg-white border-bottom-0">
                                                    <h5 class="card-title mb-0"><i class="bi bi-person-badge me-2"></i> Personal Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label text-muted small mb-1">First Name</label>
                                                            <p class="mb-0 fs-5">{{ $getrecode[0]->name }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label text-muted small mb-1">Last Name</label>
                                                            <p class="mb-0 fs-5">{{ $getrecode[0]->last_name }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- Contact Information -->
                                            <div class="card mb-4">
                                                <div class="card-header bg-white border-bottom-0">
                                                    <h5 class="card-title mb-0"><i class="bi bi-envelope me-2"></i> Contact Information</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label text-muted small mb-1">Email Address</label>
                                                            <p class="mb-0 fs-5">{{ $getrecode[0]->email }}</p>
                                                        </div>
                                                        <div class="col-md-6 mb-3">
                                                            <label class="form-label text-muted small mb-1">Phone Number</label>
                                                            <p class="mb-0 fs-5">{{ $getrecode[0]->mobile }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-4">
                                            <!-- AMC Information -->
                                            <div class="card mb-4">
                                                <div class="card-header bg-white border-bottom-0">
                                                    <h5 class="card-title mb-0"><i class="bi bi-shield-check me-2"></i> AMC Status</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="amc-status text-center">
                                                        <div class="amc-icon bg-primary-light text-primary mx-auto mb-3">
                                                            <i class="bi bi-shield-check fs-4"></i>
                                                        </div>
                                                        <h6 class="fw-semibold">Active Maintenance Contract</h6>
                                                        <p class="text-muted small mb-3">Your annual maintenance coverage includes all essential services for your apartment.</p>
                                                        
                                                        <div class="progress mb-2" style="height: 6px;">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%;"></div>
                                                        </div>
                                                        <p class="small text-muted mb-3">65% completed (Expires Dec 15, 2025)</p>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                          
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Activity Tab -->
                                <div class="tab-pane fade" id="activity" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header bg-white border-bottom-0">
                                            <h5 class="card-title mb-0">Recent Activity</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="activity-timeline">
                                                <div class="activity-item">
                                                    <div class="activity-icon bg-primary-light text-primary">
                                                        <i class="bi bi-file-earmark-text"></i>
                                                    </div>
                                                    <div class="activity-content">
                                                        <h6>Document Uploaded</h6>
                                                        <p class="text-muted small mb-1">Maintenance report for May 2025</p>
                                                        <span class="text-muted small">2 days ago</span>
                                                    </div>
                                                </div>
                                                <div class="activity-item">
                                                    <div class="activity-icon bg-success-light text-success">
                                                        <i class="bi bi-check-circle"></i>
                                                    </div>
                                                    <div class="activity-content">
                                                        <h6>Payment Processed</h6>
                                                        <p class="text-muted small mb-1">AMC renewal payment completed</p>
                                                        <span class="text-muted small">1 week ago</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Settings Tab -->
                                <div class="tab-pane fade" id="settings" role="tabpanel">
                                    <div class="card">
                                        <div class="card-header bg-white border-bottom-0">
                                            <h5 class="card-title mb-0">Account Settings</h5>
                                        </div>
                                        <div class="card-body">
                                            <h6 class="fw-semibold mb-3">Notification Preferences</h6>
                                            <div class="form-check form-switch mb-3">
                                                <input class="form-check-input" type="checkbox" id="emailNotif" checked>
                                                <label class="form-check-label" for="emailNotif">Receive email notifications</label>
                                            </div>
                                            <div class="form-check form-switch mb-4">
                                                <input class="form-check-input" type="checkbox" id="smsNotif">
                                                <label class="form-check-label" for="smsNotif">Receive SMS alerts</label>
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
    /* Modern Profile Card */
    .modern-profile-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
    }
    
    /* Profile Cover Section */
    .profile-cover {
        position: relative;
    }
    
    .cover-photo {
        height: 180px;
        width: 100%;
        background-size: cover;
    }
    
    .profile-header-content {
        position: relative;
        padding: 0 2rem;
        margin-top: -60px;
        margin-bottom: 1rem;
        text-align: center;
    }
    
    .profile-avatar-container {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid white;
        background: white;
        margin: 0 auto;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    
    .profile-avatar {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
    }
    
    .profile-avatar-placeholder {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d;
        font-size: 3rem;
        background: #f8f9fa;
    }
    
    .profile-info {
        padding: 1.5rem 0 1rem;
    }
    
    .profile-name {
        font-weight: 700;
        font-size: 1.75rem;
        margin-bottom: 0.25rem;
    }
    
    .profile-title {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 1.5rem;
    }
    
    .btn-edit {
        background: #4e73df;
        color: white;
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        border: none;
    }
    
    /* Profile Tabs */
    .profile-content-tabs {
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .nav-tabs {
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding: 0 2rem;
    }
    
    .nav-tabs .nav-link {
        border: none;
        color: #6c757d;
        font-weight: 500;
        padding: 1rem 1.5rem;
        border-bottom: 3px solid transparent;
    }
    
    .nav-tabs .nav-link.active {
        color: #4e73df;
        background: transparent;
        border-bottom: 3px solid #4e73df;
    }
    
    /* AMC Status */
    .amc-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .bg-primary-light {
        background-color: rgba(78, 115, 223, 0.1);
    }
    
    /* Quick Actions */
    .quick-actions .btn {
        transition: all 0.2s;
        text-align: left;
        padding: 0.75rem 1rem;
    }
    
    /* Activity Timeline */
    .activity-timeline {
        position: relative;
        padding-left: 40px;
    }
    
    .activity-item {
        position: relative;
        padding-bottom: 1.5rem;
    }
    
    .activity-item:not(:last-child)::before {
        content: '';
        position: absolute;
        left: -25px;
        top: 40px;
        height: calc(100% - 40px);
        width: 1px;
        background: #e9ecef;
    }
    
    .activity-icon {
        position: absolute;
        left: -40px;
        top: 0;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .profile-header-content {
            padding: 0 1rem;
        }
        
        .nav-tabs {
            padding: 0 1rem;
        }
        
        .nav-tabs .nav-link {
            padding: 0.75rem 0.5rem;
            font-size: 0.85rem;
        }
    }
</style>

@endsection