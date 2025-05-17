@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2"><i class="fas fa-user-edit me-2"></i>Profile Settings</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Update Profile</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card rounded-lg shadow-sm">
                    <div class="card-body pt-4">
                        <!-- Profile Edit Form -->
                        <form action="{{ url('vendor/vprofile/edit/' .$getrecord->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Profile Picture Section -->
                            <div class="text-center mb-4">
                                <div class="avatar-upload mx-auto">
                                    <div class="avatar-edit">
                                        <input type='file' id="profile-upload" name="profile" accept="image/*"/>
                                        <label for="profile-upload" class="btn btn-circle btn-primary">
                                            <i class="fas fa-pencil-alt"></i>
                                        </label>
                                    </div>
                                    <div class="avatar-preview">
                                        @if(!empty($getrecord->profile))
                                            <div id="profile-preview" style="background-image: url('{{ $getrecord->getImage() }}');"></div>
                                        @else
                                            <div id="profile-preview" style="background-image: url('{{ asset('admin-assets/img/profile-placeholder.jpg') }}');"></div>
                                        @endif
                                    </div>
                                </div>
                                <h4 class="mt-3 mb-1">{{ $getrecord->name }} {{ $getrecord->last_name }}</h4>
                                <p class="text-muted small mb-0">Vendor Account</p>
                                @error('profile')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Personal Information Card -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-header bg-light">
                                    <h5 class="card-title mb-0"><i class="fas fa-user-circle me-2"></i>Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                                <input type="text" name="name" class="form-control" value="{{ old('name', $getrecord->name) }}" required>
                                            </div>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Last Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                                <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $getrecord->last_name) }}">
                                            </div>
                                            @error('last_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-envelope"></i></span>
                                                <input type="email" name="email" class="form-control" value="{{ old('email', $getrecord->email) }}" required>
                                            </div>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Mobile -->
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                                                <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $getrecord->mobile) }}">
                                            </div>
                                            @error('mobile')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Address -->
                                        <div class="col-12">
                                            <label class="form-label">Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                                                <input type="text" name="address" class="form-control" value="{{ old('address', $getrecord->address) }}">
                                            </div>
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2">
                                    <i class="fas fa-save me-2"></i>Save Changes
                                </button>
                                <a href="{{ url('vendor/dashboard') }}" class="btn btn-outline-secondary px-4 py-2 ms-2">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        // Profile image preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile-preview').css('background-image', 'url('+e.target.result +')');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        
        $("#profile-upload").change(function() {
            readURL(this);
        });

        // Input validation styling
        $('input, select').on('change', function() {
            if ($(this).hasClass('is-invalid')) {
                $(this).removeClass('is-invalid');
            }
        });
    });
</script>

<style>
    /* Avatar Upload Styles */
    .avatar-upload {
        position: relative;
        max-width: 130px;
    }
    
    .avatar-upload .avatar-edit {
        position: absolute;
        right: 5px;
        bottom: 5px;
        z-index: 1;
    }
    
    .avatar-upload .avatar-edit input {
        display: none;
    }
    
    .avatar-upload .avatar-edit label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 50%;
        background: #3b7ddd;
        border: 2px solid #fff;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .avatar-upload .avatar-edit label:hover {
        background: #2e6fd1;
    }
    
    .avatar-upload .avatar-preview {
        width: 130px;
        height: 130px;
        position: relative;
        border-radius: 50%;
        border: 4px solid #f8f9fa;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    
    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    
    /* Card Styles */
    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
        padding: 1rem 1.25rem;
    }
    
    /* Form Control Styles */
    .form-control, .form-select {
        border-radius: 0.375rem;
        transition: all 0.2s ease;
        border: 1px solid #ced4da;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .input-group-text {
        border-radius: 0.375rem 0 0 0.375rem;
        min-width: 40px;
        justify-content: center;
        background-color: #f8f9fa;
        border-right: none;
    }
    
    /* Button Styles */
    .btn-circle {
        width: 34px;
        height: 34px;
        padding: 0;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-body {
            padding: 1rem;
        }
    }
</style>
@endsection