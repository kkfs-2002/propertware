@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <!-- Page Header with Breadcrumbs -->
    <div class="pagetitle">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="mb-2">Create New Reminder</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('vendor/notifications') }}">Reminders</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ url('vendor/notifications/list') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <!-- Card with Status Indicator -->
                <div class="card">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Reminder Information</h5>
                        <span class="badge bg-primary">New Reminder</span>
                    </div>
                    <div class="card-body">
                        <!-- System Messages -->
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Validation Errors:</strong>
                            <ul class="mb-0 ps-3">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif

                        <!-- Form Structure -->
                        <form action="{{ url('vendor/notifications/store') }}" method="POST" class="needs-validation" novalidate>
                            @csrf
                            
                            <!-- Title Field -->
                            <div class="mb-4">
                                <label for="title" class="form-label">
                                    <i class="bi bi-card-heading me-1"></i> Reminder Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control form-control-lg @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title') }}" placeholder="Enter reminder title" required>
                                <div class="form-text">Keep it short and descriptive (max 100 characters)</div>
                                @error('title')
                                <div class="invalid-feedback d-block">
                                    <i class="bi bi-info-circle me-1"></i> {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <!-- Message Field -->
                            <div class="mb-4">
                                <label for="message" class="form-label">
                                    <i class="bi bi-chat-left-text me-1"></i> Detailed Message
                                </label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="4" placeholder="Enter detailed message (optional)">{{ old('message') }}</textarea>
                                @error('message')
                                <div class="invalid-feedback d-block">
                                    <i class="bi bi-info-circle me-1"></i> {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <!-- Date/Time Field -->
                            <div class="mb-4">
                                <label for="remind_at" class="form-label">
                                    <i class="bi bi-alarm me-1"></i> Reminder Date & Time <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="datetime-local" class="form-control @error('remind_at') is-invalid @enderror" 
                                           id="remind_at" name="remind_at" value="{{ old('remind_at') }}" required>
                                    <button class="btn btn-outline-secondary" type="button" id="setNowButton">
                                        <i class="bi bi-clock"></i> Set to Now
                                    </button>
                                </div>
                                <div class="form-text">Select future date and time for reminder</div>
                                @error('remind_at')
                                <div class="invalid-feedback d-block">
                                    <i class="bi bi-info-circle me-1"></i> {{ $message }}
                                </div>
                                @enderror
                            </div>
                            
                            <!-- Form Actions -->
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4 pt-3 border-top">
                                <button type="reset" class="btn btn-outline-danger me-md-2">
                                    <i class="bi bi-eraser me-1"></i> Reset Form
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save me-1"></i> Save Reminder
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Help Section -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-info-circle me-1"></i> Reminder Tips
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <h6 class="alert-heading">
                                <i class="bi bi-lightbulb me-1"></i> Best Practices
                            </h6>
                            <ul class="mb-0 ps-3">
                                <li>Set reminders for important deadlines</li>
                                <li>Use clear, action-oriented titles</li>
                                <li>Add details in the message field</li>
                                <li>You'll receive notifications at the specified time</li>
                            </ul>
                        </div>
                        
                        <div class="alert alert-warning">
                            <h6 class="alert-heading">
                                <i class="bi bi-exclamation-triangle me-1"></i> Important Notes
                            </h6>
                            <ul class="mb-0 ps-3">
                                <li>Reminders cannot be edited after creation</li>
                                <li>You can delete reminders if needed</li>
                                <li>Notifications appear in your dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('scripts')
<script>
    // Set current datetime button functionality
    document.getElementById('setNowButton').addEventListener('click', function() {
        const now = new Date();
        const timezoneOffset = now.getTimezoneOffset() * 60000;
        const localISOTime = (new Date(now - timezoneOffset)).toISOString().slice(0, 16);
        document.getElementById('remind_at').value = localISOTime;
    });
    
    // Form validation
    (function () {
        'use strict'
        const forms = document.querySelectorAll('.needs-validation')
        
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                
                form.classList.add('was-validated')
            }, false)
        })
    })()
</script>
@endsection

@endsection