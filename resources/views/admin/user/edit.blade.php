@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2"><i class="fas fa-user-plus"></i> Edit User</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">User Edit Form</h5>

                        <form action="{{ url('admin/user/edit/' .$getrecord->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @php
                                $inputClass = 'form-control shadow-sm';
                                $errorStyle = 'color:red;';
                            @endphp

                            <div class="row g-3">
                                {{-- First Name --}}
                                <div class="col-md-6">
                                    <label class="form-label">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="{{ $inputClass }}" value="{{ $getrecord->name}}" required>
                                    <span style="{{ $errorStyle }}">{{ $errors->first('name') }}</span>
                                </div>

                                {{-- Last Name --}}
                                <div class="col-md-6">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="{{ $inputClass }}" value="{{$getrecord->last_name}}">
                                    <span style="{{ $errorStyle }}">{{ $errors->first('last_name') }}</span>
                                </div>

                                {{-- Email --}}
                                <div class="col-md-6">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="{{ $inputClass }}" value="{{ $getrecord->email }}" required>
                                    <span style="{{ $errorStyle }}">{{ $errors->first('email') }}</span>
                                </div>

                                {{-- Mobile --}}
                                <div class="col-md-6">
                                    <label class="form-label">Mobile</label>
                                    <input type="text" name="mobile" class="{{ $inputClass }}" value="{{ $getrecord->mobile }}">
                                    <span style="{{ $errorStyle }}">{{ $errors->first('mobile') }}</span>
                                </div>

                                {{-- Profile Image --}}
                            <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile" class="form-control">

                                @if(!empty($getrecord->profile))
                                    <img src="{{ $getrecord->getImage() }}"  style="height: 50px; width: 50px;">
                                @endif

                                <span style="{{ $errorStyle ?? 'color: red;' }}">{{ $errors->first('profile') }}</span>
                            </div>

                            {{-- Address --}}
                                <div class="col-md-6">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" class="{{ $inputClass }}" value="{{ $getrecord->address }}">
                                    <span style="{{ $errorStyle }}">{{ $errors->first('address') }}</span>
                                </div>
                                
                                

                                {{-- AMC Name--}}
                                <div class="col-md-6">
                                    <label class="form-label"> AMC Name <span class="text-danger">*</span></label>
                                    <select name="amc_id" id="SelectAMCBusinessCategory" readonly>
                                        <option  value=""> Select AMC Name </option>
                                        @foreach($getAMC as $value2)
                                            <option {{ ($value2->id == $getrecord->amc_id) ? 'selected' : '' }} data-val="{{ $value2->business_category}}" value="{{ $value2->id }}">{{ $value2->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Address --}}
                                <div class="col-md-6" id="showDiv" style="
                                 @if( $getrecord->amc_business_category_name == '')
                                display: none;
                                @endif">
                                    <label class="form-label">Amc Business Category Name</label>
                                    <input readonly type="text" name="amc_business_category_name" class="{{ $inputClass }}" value="{{  $getrecord->amc_business_category_name }}">
                                    <span style="{{ $errorStyle }}">{{ $errors->first('amc_business_category_name') }}</span>
                                </div>


                            {{-- Submit Button --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-2"></i>Update
                                </button>

                                   <a href="{{ url('admin/user/list') }}" class="btn btn-outline-gray-700">
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
     $('#SelectAMCBusinessCategory').on('change',function (){
         var HideAndShow = $('option:selected', this).attr('data-val');

         if(HideAndShow == 0)
         {
            $('#showDiv').show().find(':input').attr('required', true);
         }else{
            $('#showDiv').hide().find(':input').attr('required', false);
         }
     });
        
    
  </script>
  @endsection

