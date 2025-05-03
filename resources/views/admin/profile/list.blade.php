@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3">Admin Profile</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile Management</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                @include('_message')

                <div class="card elite-profile-card">
                    <div class="card-body p-5">
                        <div class="profile-header d-flex justify-content-between align-items-end mb-5">
                            <div>
                                <h2 class="profile-name mb-1">{{ $getrecode[0]->name }} {{ $getrecode[0]->last_name }}</h2>
                                <p class="profile-title text-muted">System Administrator</p>
                            </div>
                            <a href="{{ url('admin/profile/edit/'.$getrecode[0]->id) }}" class="btn btn-outline-primary rounded-pill px-4">
                                <i class="bi bi-pencil-fill me-2"></i>Edit Profile
                            </a>
                        </div>

                        <div class="row">
                            <div class="col-lg-5">
                                <div class="profile-avatar-container mb-4">
                                    @if(!empty($getrecode[0]->profile))
                                        <img src="{{ $getrecode[0]->getImage() }}" class="profile-avatar" alt="Profile Image">
                                    @else
                                        <div class="profile-avatar-placeholder">
                                            <i class="bi bi-person-fill"></i>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="profile-meta-card">
                                    <div class="meta-item">
                                        <i class="bi bi-envelope-fill meta-icon"></i>
                                        <div>
                                            <p class="meta-label">Email</p>
                                            <p class="meta-value">{{ $getrecode[0]->email }}</p>
                                        </div>
                                    </div>
                                    <div class="meta-item">
                                        <i class="bi bi-phone-fill meta-icon"></i>
                                        <div>
                                            <p class="meta-label">Phone</p>
                                            <p class="meta-value">{{ $getrecode[0]->mobile }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-7">
                                <div class="profile-details-card">
                                    <h5 class="details-title">Personal Information</h5>
                                    <div class="details-grid">
                                        <div class="detail-col">
                                            <span class="detail-label">First Name</span>
                                            <span class="detail-value">{{ $getrecode[0]->name }}</span>
                                        </div>
                                        <div class="detail-col">
                                            <span class="detail-label">Last Name</span>
                                            <span class="detail-value">{{ $getrecode[0]->last_name }}</span>
                                        </div>
                                    </div>
                                    
                                    <h5 class="details-title mt-4">AMC Information</h5>
                                    <div class="security-status">
                                        <div class="security-item">
                                            <i class="bi bi-building security-icon"></i>
                                            <div>
                                                <p class="security-label">AMC Details</p>
                                                <p class="security-value">Information about AMC</p>
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
    .elite-profile-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        background-color: #fff;
    }
    
    .profile-header {
        padding-bottom: 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .profile-name {
        font-weight: 600;
        color: #2c3e50;
        font-size: 1.75rem;
        letter-spacing: -0.5px;
    }
    
    .profile-title {
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }
    
    .profile-avatar-container {
        position: relative;
        width: 100%;
        max-width: 220px;
        margin: 0 auto;
    }
    
    .profile-avatar {
        width: 100%;
        height: auto;
        border-radius: 12px;
        aspect-ratio: 1/1;
        object-fit: cover;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    
    .profile-avatar-placeholder {
        width: 100%;
        aspect-ratio: 1/1;
        border-radius: 12px;
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #6c757d;
        font-size: 4rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    
    .profile-meta-card {
        background-color: #f8fafc;
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 2rem;
    }
    
    .meta-item {
        display: flex;
        align-items: center;
        margin-bottom: 1.25rem;
    }
    
    .meta-item:last-child {
        margin-bottom: 0;
    }
    
    .meta-icon {
        font-size: 1.25rem;
        color: #4e73df;
        margin-right: 1rem;
        width: 24px;
        text-align: center;
    }
    
    .meta-label {
        font-size: 0.75rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .meta-value {
        font-weight: 500;
        color: #2c3e50;
        margin-bottom: 0;
    }
    
    .profile-details-card {
        background-color: #fff;
        border-radius: 12px;
        height: 100%;
        padding-left: 1.5rem;
    }
    
    .details-title {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.75rem;
    }
    
    .details-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 3px;
        background-color: #4e73df;
        border-radius: 3px;
    }
    
    .details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
    }
    
    .detail-col {
        margin-bottom: 0.5rem;
    }
    
    .detail-label {
        display: block;
        font-size: 0.75rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .detail-value {
        font-weight: 500;
        color: #2c3e50;
        display: block;
    }
    
    .security-status {
        margin-top: 1.5rem;
    }
    
    .security-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        background-color: #f8fafc;
        border-radius: 8px;
        margin-bottom: 1rem;
    }
    
    .security-icon {
        font-size: 1.25rem;
        margin-right: 1rem;
        color: #4e73df;
    }
    
    .security-label {
        font-size: 0.75rem;
        color: #6c757d;
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .security-value {
        font-weight: 500;
        color: #2c3e50;
        margin-bottom: 0;
        font-size: 0.9rem;
    }
    
    @media (max-width: 992px) {
        .profile-details-card {
            padding-left: 0;
            padding-top: 2rem;
        }
        
        .details-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

@endsection