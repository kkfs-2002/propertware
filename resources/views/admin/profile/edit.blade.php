@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2"><i class="fas fa-user-cog me-2"></i>Update Profile</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Profile Settings</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Profile Edit Form -->
                        <form action="{{ url('admin/profile/edit/' .$getrecord->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <div class="profile-img-container">
                                            @if(!empty($getrecord->profile))
                                                <img src="{{ $getrecord->getImage() }}" id="profile-preview" class="rounded-circle shadow" alt="Profile">
                                            @else
                                                <img src="{{ asset('admin-assets/img/profile-placeholder.jpg') }}" id="profile-preview" class="rounded-circle shadow" alt="Profile">
                                            @endif
                                            <div class="profile-img-overlay">
                                                <label for="profile-upload" class="btn btn-sm btn-primary rounded-pill">
                                                    <i class="fas fa-camera"></i>
                                                </label>
                                                <input type="file" id="profile-upload" name="profile" accept="image/*" style="display: none;">
                                            </div>
                                        </div>
                                        <h5 class="mt-3">{{ $getrecord->name }} {{ $getrecord->last_name }}</h5>
                                        @error('profile')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                        <div class="text-muted small">Allowed JPG, JPEG or PNG. Max 2MB</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <!-- Personal Information Section -->
                                <div class="col-12">
                                    <h5 class="card-title border-bottom pb-2 mb-3">Personal Information</h5>
                                </div>

                                <!-- First Name -->
                                <div class="col-md-6">
                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-user"></i></span>
                                        <input type="text" name="name" class="form-control shadow-sm" value="{{ old('name', $getrecord->name) }}" required>
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
                                        <input type="text" name="last_name" class="form-control shadow-sm" value="{{ old('last_name', $getrecord->last_name) }}">
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
                                        <input type="email" name="email" class="form-control shadow-sm" value="{{ old('email', $getrecord->email) }}" required>
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
                                        <input type="text" name="mobile" class="form-control shadow-sm" value="{{ old('mobile', $getrecord->mobile) }}">
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
                                        <input type="text" name="address" class="form-control shadow-sm" value="{{ old('address', $getrecord->address) }}">
                                    </div>
                                    @error('address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- AMC Information Section -->
                                <div class="col-12 mt-4">
                                    <h5 class="card-title border-bottom pb-2 mb-3">AMC Information</h5>
                                </div>

                                <!-- AMC Name -->
                                <div class="col-md-6">
                                    <label class="form-label">AMC Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-building"></i></span>
                                        <select name="amc_id" id="SelectAMCBusinessCategory" class="form-select shadow-sm" readonly>
                                            <option value="">Select AMC Name</option>
                                            @foreach($getAMC as $value2)
                                                <option {{ ($value2->id == old('amc_id', $getrecord->amc_id)) ? 'selected' : '' }} 
                                                        data-val="{{ $value2->business_category}}" 
                                                        value="{{ $value2->id }}">
                                                    {{ $value2->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('amc_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- AMC Business Category -->
                                <div class="col-md-6" id="showDiv" style="display: {{ $getrecord->amc_business_category_name ? 'block' : 'none' }};">
                                    <label class="form-label">AMC Business Category</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="fas fa-tag"></i></span>
                                        <input readonly type="text" name="amc_business_category_name" class="form-control shadow-sm" 
                                               value="{{ old('amc_business_category_name', $getrecord->amc_business_category_name) }}">
                                    </div>
                                    @error('amc_business_category_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <!-- Form Actions -->
                                <div class="col-12 mt-5">
                                    <div class="d-flex justify-content-between">
                                   
                                        <button type="submit" class="btn btn-primary px-4">
                                            <i class="fas fa-save me-2"></i>Update Profile
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- End Profile Edit Form -->
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
        // AMC Business Category toggle
        $('#SelectAMCBusinessCategory').on('change', function() {
            var businessCategory = $('option:selected', this).attr('data-val');
            var showDiv = $('#showDiv');
            
            if(businessCategory == '0') {
                showDiv.show().find(':input').attr('required', true);
            } else {
                showDiv.hide().find(':input').attr('required', false);
            }
        });

        // Profile image preview
        $('#profile-upload').change(function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    $('#profile-preview').attr('src', event.target.result);
                }
                reader.readAsDataURL(file);
            }
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
    .profile-img-container {
        position: relative;
        width: 120px;
        height: 120px;
        margin: 0 auto;
    }
    
    .profile-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
    }
    
    .profile-img-overlay {
        position: absolute;
        bottom: 0;
        right: 0;
        transform: translate(10%, 10%);
    }
    
    .card {
        border-radius: 0.5rem;
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    }
    
    .card-title {
        color: #3b7ddd;
        font-weight: 600;
    }
    
    .form-control, .form-select {
        border-radius: 0.375rem;
        transition: all 0.2s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .input-group-text {
        border-radius: 0.375rem 0 0 0.375rem;
    }
</style>
@endsection