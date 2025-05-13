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
                    <div class="card-body">
                        <div class="profile-header">
                            <div class="profile-avatar-container">
                                @if(!empty($getrecode[0]->profile))
                                    <img src="{{ $getrecode[0]->getImage() }}" class="profile-avatar" alt="Profile Image">
                                @else
                                    <div class="profile-avatar-placeholder">
                                        <i class="bi bi-person"></i>
                                    </div>
                                @endif
                                <div class="profile-badge">User</div>
                            </div>
                            
                            <div class="profile-info">
                                <h2 class="profile-name">{{ $getrecode[0]->name }} {{ $getrecode[0]->last_name }}</h2>
                                
                                
                                <div class="profile-actions">
                                    <a href="{{ url('user/_profile/edit/'.$getrecode[0]->id) }}" class="btn btn-edit">
                                        <i class="bi bi-pencil"></i> Edit Profile
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="profile-content">
                            <div class="profile-section">
                                <h3 class="section-title"><i class="bi bi-person-circle"></i> Personal Information</h3>
                                <div class="section-content">
                                    <div class="info-row">
                                        <div class="info-item">
                                            <span class="info-label">First Name</span>
                                            <span class="info-value">{{ $getrecode[0]->name }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Last Name</span>
                                            <span class="info-value">{{ $getrecode[0]->last_name }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="profile-section">
                                <h3 class="section-title"><i class="bi bi-envelope"></i> Contact Information</h3>
                                <div class="section-content">
                                    <div class="info-row">
                                        <div class="info-item">
                                            <span class="info-label">Email Address</span>
                                            <span class="info-value">{{ $getrecode[0]->email }}</span>
                                        </div>
                                        <div class="info-item">
                                            <span class="info-label">Phone Number</span>
                                            <span class="info-value">{{ $getrecode[0]->mobile }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="profile-section">
                                <h3 class="section-title"><i class="bi bi-building"></i> AMC Information</h3>
                                <div class="section-content">
                                    <div class="amc-card">
                                        <div class="amc-icon">
                                            <i class="bi bi-shield-check"></i>
                                        </div>
                                        <div class="amc-info">
                                            <h4>AMC Details</h4>
                                            <p>Information about AMC contract and services</p>
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
    .modern-profile-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        background: #ffffff;
    }
    
    .profile-header {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2.5rem 2rem 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        position: relative;
        text-align: center;
    }
    
    .profile-avatar-container {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid rgba(255, 255, 255, 0.3);
        position: relative;
        margin-bottom: 1.5rem;
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
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 3rem;
    }
    
    .profile-badge {
        position: absolute;
        bottom: -10px;
        right: -10px;
        background: #4fd1c5;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .profile-info {
        width: 100%;
    }
    
    .profile-name {
        font-weight: 700;
        font-size: 1.75rem;
        margin-bottom: 0.25rem;
        color: white;
    }
    
    .profile-title {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 1.5rem;
        color: rgba(255, 255, 255, 0.9);
    }
    
    .profile-actions {
        display: flex;
        justify-content: center;
    }
    
    .btn-edit {
        background: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(255, 255, 255, 0.3);
        color: white;
        border-radius: 50px;
        padding: 0.5rem 1.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .btn-edit:hover {
        background: rgba(255, 255, 255, 0.25);
        color: white;
        transform: translateY(-2px);
    }
    
    .profile-content {
        padding: 2rem;
    }
    
    .profile-section {
        margin-bottom: 2rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        padding-bottom: 1.5rem;
    }
    
    .profile-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }
    
    .section-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #4a5568;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .section-title i {
        font-size: 1.2rem;
        color: #667eea;
    }
    
    .section-content {
        padding: 0 0.5rem;
    }
    
    .info-row {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }
    
    .info-item {
        flex: 1;
        min-width: 200px;
        margin-bottom: 1rem;
    }
    
    .info-label {
        display: block;
        font-size: 0.8rem;
        color: #718096;
        margin-bottom: 0.25rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .info-value {
        display: block;
        font-size: 1rem;
        color: #2d3748;
        font-weight: 500;
        padding: 0.5rem 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .amc-card {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        background: #f8fafc;
        padding: 1.25rem;
        border-radius: 10px;
        border-left: 4px solid #667eea;
    }
    
    .amc-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(102, 126, 234, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #667eea;
        font-size: 1.5rem;
    }
    
    .amc-info h4 {
        font-size: 1rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.25rem;
    }
    
    .amc-info p {
        font-size: 0.9rem;
        color: #718096;
        margin-bottom: 0;
    }
    
    @media (max-width: 768px) {
        .profile-header {
            padding: 2rem 1.5rem 1rem;
        }
        
        .profile-content {
            padding: 1.5rem;
        }
        
        .info-item {
            min-width: 100%;
        }
    }
</style>

@endsection