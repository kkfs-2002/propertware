@extends('user.layouts.app')

@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2"><i class="bi bi-person-gear me-2"></i>Edit Profile</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Update Profile</li>
            </ol>
        </nav>
    </div>

    <section class="section profile">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">
                <div class="card rounded-3 shadow-sm border-0">
                    <div class="card-body pt-4">
                        <!-- Profile Edit Form -->
                        <form action="{{ url('user/_profile/edit/' .$getrecord->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Profile Picture Section -->
                            <div class="row mb-4">
                                <div class="col-12 text-center">
                                    <div class="avatar-upload mx-auto">
                                        <div class="avatar-edit">
                                            <input type='file' id="profile-upload" name="profile" accept="image/*"/>
                                            <label for="profile-upload" class="btn btn-sm btn-primary rounded-circle">
                                                <i class="bi bi-camera-fill"></i>
                                            </label>
                                        </div>
                                        <div class="avatar-preview">
                                            @if(!empty($getrecord->profile))
                                                <div id="profile-preview" style="background-image: url('{{ $getrecord->getImage() }}');"></div>
                                            @else
                                                <div id="profile-preview" style="background-image: url('{{ asset('user-assets/img/profile-placeholder.jpg') }}');"></div>
                                            @endif
                                        </div>
                                    </div>
                                    <h5 class="mt-3 mb-1">{{ $getrecord->name }} {{ $getrecord->last_name }}</h5>
                                    <p class="text-muted small mb-2">Allowed JPG, JPEG or PNG. Max 2MB</p>
                                    @error('profile')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Personal Information Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-header bg-light border-0">
                                    <h5 class="mb-0"><i class="bi bi-person-vcard me-2"></i>Personal Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- First Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">First Name <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" name="name" class="form-control shadow-none" value="{{ old('name', $getrecord->name) }}" required>
                                            </div>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Last Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">Last Name</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-person-fill"></i></span>
                                                <input type="text" name="last_name" class="form-control shadow-none" value="{{ old('last_name', $getrecord->last_name) }}">
                                            </div>
                                            @error('last_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-envelope-fill"></i></span>
                                                <input type="email" name="email" class="form-control shadow-none" value="{{ old('email', $getrecord->email) }}" required>
                                            </div>
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Mobile -->
                                        <div class="col-md-6">
                                            <label class="form-label">Mobile</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-phone-fill"></i></span>
                                                <input type="text" name="mobile" class="form-control shadow-none" value="{{ old('mobile', $getrecord->mobile) }}">
                                            </div>
                                            @error('mobile')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <!-- Address -->
                                        <div class="col-12">
                                            <label class="form-label">Address</label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-geo-alt-fill"></i></span>
                                                <input type="text" name="address" class="form-control shadow-none" value="{{ old('address', $getrecord->address) }}">
                                            </div>
                                            @error('address')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- AMC Information Section -->
                            <div class="card mb-4 border-0 shadow-sm">
                                <div class="card-header bg-light border-0">
                                    <h5 class="mb-0"><i class="bi bi-building me-2"></i>AMC Information</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <!-- AMC Name -->
                                        <div class="col-md-6">
                                            <label class="form-label">AMC Name <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-text bg-light"><i class="bi bi-buildings-fill"></i></span>
                                                <select name="amc_id" id="SelectAMCBusinessCategory" class="form-select shadow-none" readonly>
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
                                                <span class="input-group-text bg-light"><i class="bi bi-tags-fill"></i></span>
                                                <input readonly type="text" name="amc_business_category_name" class="form-control shadow-none" 
                                                    value="{{ old('amc_business_category_name', $getrecord->amc_business_category_name) }}">
                                            </div>
                                            @error('amc_business_category_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                    <i class="bi bi-save-fill me-2"></i>Save Changes
                                </button>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile-preview').css('background-image', 'url('+e.target.result+')');
                    $('#profile-preview').hide();
                    $('#profile-preview').fadeIn(650);
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
    .avatar-upload {
        position: relative;
        max-width: 120px;
        margin-bottom: 1rem;
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
        border-radius: 100%;
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
        width: 120px;
        height: 120px;
        position: relative;
        border-radius: 100%;
        border: 4px solid #f8f9fa;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    
    .avatar-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    
    .form-control, .form-select {
        border-radius: 0.375rem;
        transition: all 0.2s ease;
        border: 1px solid #dee2e6;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
    }
    
    .input-group-text {
        background-color: #f8f9fa;
        border-color: #dee2e6;
    }
    
    .card {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    
    .card-header {
        padding: 1rem 1.25rem;
    }
    
    .btn-primary {
        background-color: #3b7ddd;
        border-color: #3b7ddd;
    }
    
    .btn-primary:hover {
        background-color: #2e6fd1;
        border-color: #2b68c4;
    }
</style>
@endsection