@extends('layouts.app')

@section('content')
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
     data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
  <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100">

      <!-- Left Side: Image -->
      <div class="col-md-8 d-none d-md-block">
        <img src="{{ asset('images/signin/login.jpg') }}"
             alt="Property Vector Illustration"
             class="img-fluid w-100 h-100 object-fit-cover">
      </div>

      <!-- Right Side: Form -->
      <div class="col-md-4 d-flex align-items-center justify-content-center">
        <div class="card w-100 p-4 bg-white rounded shadow">
          <div class="card-body">

            <div class="text-center mb-3">
              <img src="{{ asset('images/logos/logo2.png') }}" alt="Company Logo" width="180">
            </div>

            <h5 class="text-center mb-2">Update Your Password</h5>
            <p class="text-center text-muted mb-4">
              Ensure secure access to smart property management with easy password entry and confirmation.
            </p>

            @include('_message')

            <form method="POST" action="{{ route('password.update') }}">
              @csrf

              <!-- Password Reset Token -->
              <input type="hidden" name="token" value="{{ request()->route('token') }}">

              <!-- Email (typically needed) -->
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                       name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <!-- New Password -->
              <div class="mb-3">
                <label class="form-label">New Password</label>
                <div class="position-relative">
                  <input type="password" class="form-control @error('password') is-invalid @enderror" 
                         name="password" id="newPasswordInput" required autocomplete="new-password">
                  <span class="position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;" onclick="toggleNewPassword()">
                    <i id="newEyeIcon" class="fa fa-eye"></i>
                  </span>
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <!-- Confirm Password -->
              <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <div class="position-relative">
                  <input type="password" class="form-control" id="passwordInput" 
                         name="password_confirmation" required autocomplete="new-password">
                  <span class="position-absolute top-50 end-0 translate-middle-y pe-3" style="cursor: pointer;" onclick="togglePassword()">
                    <i id="eyeIcon" class="fa fa-eye"></i>
                  </span>
                </div>
              </div>

              <!-- Submit Button -->
              <button type="submit" class="btn btn-primary w-100 py-3 fs-5 mt-3" style="background-color: #21295C; border-color: #21295C;">
                Reset Password
              </button>

              <!-- Redirect to Register -->
              <div class="text-center mt-4">
                <p class="mb-1">New to Propertyware?</p>
                <a href="{{ url('register') }}" class="fw-bold text-primary">Create an account</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleNewPassword() {
    const input = document.getElementById("newPasswordInput");
    const icon = document.getElementById("newEyeIcon");

    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }

  function togglePassword() {
    const input = document.getElementById("passwordInput");
    const icon = document.getElementById("eyeIcon");

    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  }
</script>
@endsection