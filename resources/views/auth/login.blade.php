@extends('layouts.app')
@section('content')
              
          
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
      <div class="row w-100">
        
        <!-- Left Side: Image -->
        <!-- Left Side: Image (Online Property Vector) -->
<div class="col-md-6 d-none d-md-block">
  <img src="{{ asset('images/signin/signin.png') }}"
       alt="Property Vector Illustration" 
       class="img-fluid w-100 h-100 object-fit-cover">
</div>


        <!-- Right Side: Form -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
          <div class="card w-75 shadow p-5">
            <div class="card-body">
              <a href="" class="text-nowrap logo-img text-center d-block  w-100">
                <img src="{{ asset('images/logos/logo2.png') }}" alt="Company Logo" width="180">
              </a>
              <p class="text-center ">Innovative Solutions for Smart Property Management.</p>
                @include('_message')
              </div>

              <form method="POST" action="{{ url('login') }}" >
              {{ csrf_field() }}

             <!--------emil----------->
                <div class="mb-3 mt-2">
                  <label class="form-label">Email</label>
                  <div class="input-group has-validation">
                    <input type="email" class="form-control" name="email" required>
                </div>
                </div>
  
                <!----------password------->
                <div class="mb-4">
                  <label class="form-label">Password</label>
                  <div class="password-container">
                  <input type="password"  name="password" placeholder="">
                  <span class="eye-icon" onclick="togglePassword()">
                    <i id="eyeIcon" class="fa fa-eye"></i>
                   </span>
                 </div>
                </div>

                <!----------remeber--------->
                <div class="d-flex align-items-center justify-content-between mb-4">
                  <div class="form-check">
                    <input class="form-check-input " type="checkbox" name="remeber" value="true" >
                    <label class="form-check-label text-dark" >
                      Remember this Device
                    </label>
                  </div>
                  <a class="text-primary fw-bold" href="">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 py-3 fs-4 mb-4 mt-4 rounded-2">Sign In</button>
                <div class="d-flex align-items-center justify-content-center">
                  <p class="fs-4 mb-0 fw-bold">New to Propertyware ?</p>
                  <a class="text-primary fw-bold ms-2" href="register">Create an account</a>
                 
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
 

  @endsection