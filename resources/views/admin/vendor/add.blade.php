@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2"><i class="fas fa-user-plus"></i> Add Vendor</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Vendor</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Vendor Registration Form</h5>

                        <form action="{{ url('admin/vendor/add') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @php
                                $inputClass = 'form-control shadow-sm';
                                $errorStyle = 'color:red;';
                            @endphp

                            <div class="row g-3">
                                {{-- First Name --}}
                                <div class="col-md-6">
                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="{{ $inputClass }}" value="{{ old('name') }}" required>
                                    <span style="{{ $errorStyle }}">{{ $errors->first('name') }}</span>
                                </div>

                                {{-- Last Name --}}
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="{{ $inputClass }}" value="{{ old('last_name') }}">
                                    <span style="{{ $errorStyle }}">{{ $errors->first('last_name') }}</span>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="{{ $inputClass }}" value="{{ old('email') }}" required>
                                    <span style="{{ $errorStyle }}">{{ $errors->first('email') }}</span>
                                </div>

                                {{-- Mobile --}}
                                <div class="col-md-6">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" name="mobile" class="{{ $inputClass }}" value="{{ old('mobile') }}">
                                    <span style="{{ $errorStyle }}">{{ $errors->first('mobile') }}</span>
                                </div>

                                {{-- Profile Image --}}
                            <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile" class="form-control">
                                <span style="{{ $errorStyle ?? 'color: red;' }}">{{ $errors->first('profile') }}</span>
                            </div>


                                {{-- Vendor Type --}}
                                <div class="col-md-6">
                                    <label class="form-label">Vendor Type <span class="text-danger">*</span></label>
                                    <select name="vendor_type_id" class="{{ $inputClass }}" required  id="SelectCompanyHideShow">
                                        <option value=""> Select Vendor Type </option>
                                        @foreach($getVendorType as $value1)
                                            <option value="{{ $value1->id }}">{{ $value1->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Company Name --}}
                                <div class="col-md-6" id="showDiv" style="display: none;">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="{{ $inputClass }}" value="{{ old('company_name') }}">
                                <span style="{{ $errorStyle }}">{{ $errors->first('company_name') }}</span>
                                   </div>
                                   
                                {{-- Employee ID --}}
                                <div class="col-md-6" id="showDivclothingvendors" style="display: none;">
                                    <label class="form-label">Employee ID</label>
                                    <input type="text" name="employee_id" class="{{ $inputClass }}" value="{{ old('employee_id') }}">
                                    <span style="{{ $errorStyle }}">{{ $errors->first('employee_id') }}</span>
                                </div>

                                {{-- Category --}}
                                <div class="col-md-6">
                                    <label class="form-label">Category <span class="text-danger"></span></label>
                                    <select name="category_id" class="{{ $inputClass }}" required>
                                        <option value=""> Select Category </option>
                                        @foreach($getCategory as $value2)
                                            <option value="{{ $value2->id }}">{{ $value2->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="{{ $inputClass }}" required>
                                        <option value=""> Select Status </option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Active</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                {{-- Always Assign --}}
                                <div class="col-md-6">
                                    <label class="form-label">Always Assign <span class="text-danger">*</span></label>
                                    <select name="always_assign" class="{{ $inputClass }}" required>
                                        <option value=""> Select Option </option>
                                        <option value="0" {{ old('always_assign') == '0' ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ old('always_assign') == '1' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-2"></i>Submit
                                </button>

                                  <a href="{{ url('admin/vendor/list') }}" class="btn btn-outline-gray-700">
                                   <i class="bi bi-arrow-left me-2"></i>Back to List
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
  $('#SelectCompanyHideShow').on('change', function(){
    if(this.value == 1){
       $('#showDiv').show().find(':input').attr('required', true);
       $('#showDivclothingvendors').hide().find(':input').attr('required', false);
    
    }else if(this.value == 3){
        $('#showDivclothingvendors').show().find(':input').attr('required', true);
        $('#showDiv').hide().find(':input').attr('required', false);
    
    }else{
        $('#showDiv').hide().find(':input').attr('required', false);
        $('#showDivclothingvendors').hide().find(':input').attr('required', false);
    }
  });
  </script>
  @endsection

