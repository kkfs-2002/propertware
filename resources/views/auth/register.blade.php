@extends('layouts.app')

@section('content')
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

  <div class="position-relative overflow-hidden bg-light min-vh-100 d-flex align-items-center justify-content-center">
    <div class="container">
      <div class="row justify-content-center align-items-center">

        <!-- Left Side Image -->
        <div class="col-md-6 d-none d-md-block ">
          <img src="{{ asset('images/signin/signup.jpg') }}" alt="Property Vector" class="img-fluid w-100 h-100 object-fit-cover">
        </div>

        <!-- Right Side Form -->
        <div class="col-md-6 col-lg-5 ms-5 ">
          <div class="card shadow-sm p-4 mt-4">
            <div class="text-center mb-3">
              <img src="{{ asset('images/logos/logo2.png') }}" alt="Logo" width="150">
            </div>
            <p class="text-center mb-4">Enter your personal details to create account</p>

            <form method="POST" action="{{ url('register') }}">
              @csrf

              <!-- First Name -->
              <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Last Name -->
              <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
              </div>

              <!-- Email -->
              <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                @error('email')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <!-- Address -->
                  <div class="mb-3">
                     <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
                @error('address')
                 <div class="text-danger">{{ $message }}</div>
                @enderror
                 </div>

 
   <!-- User Type -->
                  <div class="mb-3">
                      <label class="form-label">Select Type</label>
                      <select name="user_type" class="form-control @error('user_type') is-invalid @enderror" required>
                    <option value="" disabled selected>-- Select Type --</option>
                     <option value="user" {{ old('user_type') == 'user' ? 'selected' : '' }}>User</option>
    <option value="partner" {{ old('user_type') == 'partner' ? 'selected' : '' }}>Partner</option>
  </select>
  @error('user_type')
    <div class="text-danger">{{ $message }}</div>
  @enderror
</div>
              <!-- Password -->
              <div class="mb-4">
  <label class="form-label">Password</label>
  <div class="password-container" style="position: relative;">
    <input type="password" id="passwordInput" name="password" placeholder="" style="padding-right: 40px;">
    <span class="eye-icon" onclick="togglePassword()" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">
      <i id="eyeIcon" class="fa fa-eye"></i>
    </span>
  </div>
</div>

              <!-- Confirm Password -->
              <div class="mb-4">
  <label class="form-label">Confirm Password</label>
  <div class="password-container">
    <input type="password" id="confirmPasswordInput" name="confirm_password" placeholder="">
    <span class="eye-icon" onclick="togglePassword('confirmPasswordInput', 'eyeIcon2')">
      <i id="eyeIcon2" class="fa fa-eye"></i>
    </span>
  </div>
</div>

              <!-- Submit -->
              <div class="d-grid">
  <button type="submit" class="btn btn-primary" style="background-color: #21295C; border-color: #21295C;">Register</button>
</div>


              <p class="text-center mt-3">
                Already have an account?
                <a href="{{ url('/') }}" class="text-decoration-none">Sign In</a>
              </p>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>
@endsection
