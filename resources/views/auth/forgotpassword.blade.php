@extends('layouts.app')
@section('content')

<body>
  <div class="page-wrapper" id="main-wrapper">
    <div class="container-fluid min-vh-100">
      <div class="row w-100 g-0"> <!-- Added g-0 to remove gutters -->
        
        <!-- Left Side Image - 70% width -->
        <div class="col-lg-8 d-none d-lg-block p-0">
          <img src="{{ asset('images/signin/pic.jpg') }}" alt="Property Vector" class="img-fluid w-100 vh-100 object-fit-cover">
        </div>

        <!-- Right Side Form - 30% width -->
        <div class="col-lg-4 d-flex align-items-center justify-content-center p-0">
          <div class="card w-100 p-4" style="border-radius: 0; max-width: 500px;">
            <div class="card-body">
              <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block w-100 mb-4">
                <img src="{{ asset('images/logos/logo2-.png') }}" alt="Company Logo" width="180">
              </a>
              <p class="text-center text-muted">Reset your password below.</p>

              <p class="text-center text-muted mb-5"> Enter the email address associated with your account and we'll send you a link to reset your password.</p>

              @if(session('status'))
                  <div class="alert alert-success">{{ session('status') }}</div>
              @endif

              @if($errors->any())
                  <div class="alert alert-danger">
                      {{ $errors->first() }}
                  </div>
              @endif

              <form method="POST" action="{{ url('forgotpassword') }}">
                @csrf

                <div class="mb-3 mt-2">
                  <label class="form-label">Enter your email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 mt-3 rounded-2" style="background-color: #21295C; border-color: #21295C;">
                  Send Password Reset Link
                </button>
              </form>

              <div class="text-center mt-4">
                <a href="{{ url('/') }}" class="text-primary fw-bold">Back to Login</a>
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection