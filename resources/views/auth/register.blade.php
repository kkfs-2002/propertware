@extends('layouts.app')
@section('content')
              
           
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div 
    class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center  w-100">
        <div class="row justify-content-center  w-100">

        <!-- Left Side: Image -->
        <!-- Left Side: Image (Online Property Vector) -->
<div class=" col-md-6 d-none d-md-block">
  <img src="{{ asset('images/signin/img.png') }}"
       alt="Property Vector Illustration" 
       class="img-fluid w-100 h-100 mt-5 mb-3 object-fit-cover ">
</div>

        <!-- Right Side: Form -->
          <div class="col-md-8 col-lg-6 col-xxl-3 w-50 ">
            <div class="  card mt-5 mb-3 ">
              <div class="card-body">
                <a href="./index.html" class="text-nowrap logo-img text-center d-block w-180">
                <img src="{{ asset('images/logos/logo2.png') }}" alt="company logo" with="150">
                </a>
                <p class="text-center">Enter your personal details to create account</p>
              

                <!-----designg Register------>
                <form method="POST" action="{{ url('register') }}">

                {{ csrf_field() }}

                  <!-- First Name -->
                  <div class="mb-3">
                    <label class="form-label"> First Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                      <span style="color:red">{{ $errors->first('name') }}</span>
                    <div class="invalid-feedback">Please,enter your first name!</div>
                  </div>

                    <!-- Last Name -->
                  <div class="mb-3">
                    <label class="form-label"> Last Name</label>
                    <input type="text" class="form-control"  name="last_name"  value="{{ old('last_name') }}" >
                    
                  </div>


                      <!-- Email -->
                  <div class="mb-3">
                    <label class="form-label">Email </label>
                    <input type="email" class="form-control" name="email"  value="{{ old('email') }}"  required>
                    <span style="color:red">{{ $errors->first('email') }}</span>
                  </div>
  
                  <!-- Mobile Number -->
                  <div class="mb-3">
                    <label  class="form-label"> Mobile Number</label>
                    <input type="text" class="form-control" name="mobile"  oninput="javascript: this.value = this.value.replace(/[^0-9]/g, ''); if(this.value.length > this.maxLength)
                    this.value= this.value.slice(0, this.maxLenght);"maxlenght="10" value="{{ old('mobile') }}">
                    
                  </div>
                  
                    <!-- Address -->
                  <div class="mb-3">
                    <label  class="form-label"> Address</label>
                    <input type="text" class="form-control"  name="address" value="{{ old('address') }}">
                    
                  </div>

                    <!-- Password -->
                  <div class="mb-4">
                  <label  class="form-label">Password</label>
                    <div class="password-container">
                      <input type="password" id="password" name="password" placeholder="">
                      <span class="eye-icon" onclick="togglePassword()">
                     <i id="eyeIcon" class="fa fa-eye"></i>
                    </span>
                      </div>
                  
                   
                  </div>

                     <!-- Confirm Password -->
                  <div class="mb-4">
                    <label  class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" required>
                    <span style="color:red">{{ $errors->first('confirm_password') }}</span> 
                  </div>

                  <!-- Terms and Conditions -->
                  <div class="d-flex align-items-center justify-content-between ">
                  <div class="form-check mb-2">
                    <input class="form-check-input" name="remeber" type="checkbox"  value="" required>
                    <label class="mb-3 form-check-label text-dark">
                    I agree and accept the <a href="#">tearms and conditions</a>
                    </label>
                    <div class="invalid-feedback">You must agree before submitting.</div>
                     <div class="col-12">
                    <button type="submit" class="btn btn-primary w-100 py-3 fs-4 mb-4 mt-4 rounded-2">create an account</button>
                    </div>
                  <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">Already have an Account?</p>
                    <a class="text-primary fw-bold ms-2" href="/">Login in</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @endsection
  