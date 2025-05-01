@extends('layouts.app')

@section('content')
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

  <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center">
    <div class="container-fluid p-0">
      <div class="row g-0">

        <!-- Left Side Image (70%) -->
        <div class="col-lg-7 d-none d-lg-flex">
          <div class="w-100 h-100">
            <img src="{{ asset('images/signin/signup.jpg') }}" alt="Property Vector" class="img-fluid w-100 h-100" style="object-fit: cover; min-height: 100vh;">
          </div>
        </div>

        <!-- Right Side Form (30%) -->
        <div class="col-lg-5 d-flex align-items-center justify-content-center bg-light">
          <div class="w-100 p-4 ">
            <div class="card p-4">
              <div class="text-center mb-4">
                <img src="{{ asset('images/logos/logo2.png') }}" alt="Logo" width="150">
                <h4 class="mt-3 mb-2">Create Your Account</h4>
                <p class="text-muted">Enter your personal details to get started</p>
              </div>

              <form method="POST" action="{{ url('register') }}">
                @csrf

                <!-- First Name -->
                <div class="row mb-3">
                 <!-- First Name -->
                   <div class="col-md-6">
                    <label class="form-label">First Name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                 @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
               @enderror
              </div>

               <!-- Last Name -->
               <div class="col-md-6">
              <label class="form-label">Last Name</label>
               <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control">
              </div>
             </div>
                <!-- Email -->
                <div class="mb-3">
                  <label class="form-label">Email address</label>
                  <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                  @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <!-- Address -->
                <div class="row mb-3">
                     <!-- Address -->
                <div class="col-md-6 mb-3 mb-md-0">
              <label class="form-label">Address</label>
              <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" required>
               @error('address')
               <div class="invalid-feedback">{{ $message }}</div>
              @enderror
              </div>

  <!-- User Type -->
  <div class="col-md-6">
    <label class="form-label">Select Type</label>
    <select name="user_type" class="form-control @error('user_type') is-invalid @enderror" required>
      <option value="" disabled selected>Select Type</option>
      <option value="user" {{ old('user_type') == 'user' ? 'selected' : '' }}>User</option>
      <option value="partner" {{ old('user_type') == 'partner' ? 'selected' : '' }}>Partner</option>
    </select>
    @error('user_type')
      <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
</div>

                <!-- Password -->
                <div class="row mb-3">
  <!-- Password -->
  <div class="col-md-6 mb-3 mb-md-0">
    <label class="form-label">Password</label>
    <div class="input-group">
      <input type="password" id="passwordInput" name="password" class="form-control" required>
      <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('passwordInput', 'eyeIcon')">
        <i id="eyeIcon" class="fa fa-eye"></i>
      </button>
    </div>
  </div>

  <!-- Confirm Password -->
  <div class="col-md-6 mb-3">
    <label class="form-label">Confirm Password</label>
    <div class="input-group">
      <input type="password" id="confirmPasswordInput" name="confirm_password" class="form-control" required>
      <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPasswordInput', 'eyeIcon2')">
        <i id="eyeIcon2" class="fa fa-eye"></i>
      </button>
    </div>
  </div>
</div>

                <!-- Submit -->
                <div class="d-grid mb-3">
                  <button type="submit" class="btn btn-primary" style="background-color: #21295C; border-color: #21295C;">Register</button>
                </div>

                <p class="text-center text-muted">
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

</div>

<script>
function togglePassword(inputId, eyeIconId) {
  const input = document.getElementById(inputId);
  const eyeIcon = document.getElementById(eyeIconId);
  
  if (input.type === "password") {
    input.type = "text";
    eyeIcon.classList.remove("fa-eye");
    eyeIcon.classList.add("fa-eye-slash");
  } else {
    input.type = "password";
    eyeIcon.classList.remove("fa-eye-slash");
    eyeIcon.classList.add("fa-eye");
  }
}
</script>
@endsection