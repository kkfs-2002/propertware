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
                            <a href="{{ url('admin/profile/edit/'.$getrecode[0]->id) }}" class="btn btn-outline-dark rounded-pill px-4">
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
                                    <div class="amc-details-container">
                                        <div class="amc-detail-item">
                                            <i class="bi bi-building amc-icon"></i>
                                            <div class="amc-content">
                                                <h6 class="amc-title">Annual Maintenance Contract</h6>
                                                <p class="amc-description">
                                                    This section provides comprehensive details about your AMC agreement, 
                                                    including coverage period, services included, and maintenance schedules. 
                                                    Our AMC ensures your systems run smoothly with regular check-ups and 
                                                    priority support.
                                                </p>
                                                <div class="amc-meta">
                                                    <span class="amc-meta-item">
                                                        <i class="bi bi-calendar-check"></i> Valid until: Dec 2025
                                                    </span>
                                                    <span class="amc-meta-item">
                                                        <i class="bi bi-shield-check"></i> Premium Plan
                                                    </span>
                                                    <span class="amc-meta-item">
                                                        <i class="bi bi-gear"></i> Full System Coverage
                                                    </span>
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
    .elite-profile-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        overflow: hidden;
        background-color:rgb(182, 219, 243); /* Soft Galapena white-purple */
    }
    
    .profile-header {
        padding: 2rem 2rem 1.5rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        background-color:rgb(135, 172, 195); /* Galapena purple */
        color: white;
    }
    
    .profile-name {
        font-weight: 600;
        color: white;
        font-size: 1.75rem;
        letter-spacing: -0.5px;
    }
    
    .profile-title {
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        color: rgba(255, 255, 255, 0.9);
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
        border: 4px solid white;
    }
    
    .profile-avatar-placeholder {
        width: 100%;
        aspect-ratio: 1/1;
        border-radius: 12px;
        background: linear-gradient(135deg, #F0EEFF 0%, #E2DEFF 100%); /* Galapena gradient */
        display: flex;
        align-items: center;
        justify-content: center;
        color: #8A7CFF;
        font-size: 4rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        border: 4px solid white;
    }
    
    .profile-meta-card {
        background-color: #E2DEFF; /* Light Galapena purple */
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 2rem;
        border: 1px solid rgba(138, 124, 255, 0.2); /* Galapena border */
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
        color: #7A6BEE; /* Medium Galapena */
        margin-right: 1rem;
        width: 24px;
        text-align: center;
    }
    
    .meta-label {
        font-size: 0.75rem;
        color: #7A6BEE;
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .meta-value {
        font-weight: 500;
        color: #5A4BD6; /* Dark Galapena */
        margin-bottom: 0;
    }
    
    .profile-details-card {
        background-color: white;
        border-radius: 12px;
        height: 100%;
        padding-left: 1.5rem;
        border: 1px solid rgba(138, 124, 255, 0.2); /* Galapena border */
    }
    
    .details-title {
        font-weight: 600;
        color: #8A7CFF; /* Galapena primary */
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
        background-color: #8A7CFF; /* Galapena primary */
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
        color: #8A7CFF; /* Galapena primary */
        margin-bottom: 0.25rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .detail-value {
        font-weight: 500;
        color: #5A4BD6; /* Dark Galapena */
        display: block;
    }
    
    /* AMC Section Styles */
    .amc-details-container {
        background-color: #E2DEFF; /* Light Galapena purple */
        border-radius: 12px;
        padding: 1.5rem;
        margin-top: 1rem;
        border: 1px solid rgba(138, 124, 255, 0.2); /* Galapena border */
    }
    
    .amc-detail-item {
        display: flex;
        gap: 1.5rem;
    }
    
    .amc-icon {
        font-size: 1.75rem;
        color: #8A7CFF; /* Galapena primary */
        margin-top: 0.25rem;
    }
    
    .amc-content {
        flex: 1;
    }
    
    .amc-title {
        font-weight: 600;
        color: #8A7CFF; /* Galapena primary */
        margin-bottom: 0.75rem;
    }
    
    .amc-description {
        color: #5A4BD6; /* Dark Galapena */
        line-height: 1.6;
        margin-bottom: 1rem;
    }
    
    .amc-meta {
        display: flex;
        gap: 1.5rem;
        flex-wrap: wrap;
    }
    
    .amc-meta-item {
        font-size: 0.85rem;
        color: #8A7CFF; /* Galapena primary */
        background-color: rgba(138, 124, 255, 0.1); /* Very light Galapena */
        padding: 0.35rem 0.75rem;
        border-radius: 50px;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        border: 1px solid rgba(138, 124, 255, 0.2); /* Galapena border */
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
    
    @media (max-width: 768px) {
        .amc-detail-item {
            flex-direction: column;
            gap: 1rem;
        }
        
        .amc-meta {
            gap: 0.75rem;
        }
    }
</style>

@endsection