@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2">Create Booking Sync Configuration</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/booking_sync/list') }}">Booking Sync</a></li>
                <li class="breadcrumb-item active">Create Configuration</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Create Booking Sync Configuration</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('vendor/booking_sync/store') }}" method="POST">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Configuration Name *</label>
                                <div class="col-sm-10">
                                    <input type="text" id="name" name="name" class="form-control" 
                                           value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="source_type" class="col-sm-2 col-form-label">Source Type *</label>
                                <div class="col-sm-10">
                                    <select id="source_type" name="source_type" class="form-select" required>
                                        <option value="">Select Source</option>
                                        @foreach($sourceTypes as $key => $label)
                                            <option value="{{ $key }}" {{ old('source_type') == $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('source_type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" id="credentials-section">
                                <label class="col-sm-2 col-form-label">Credentials *</label>
                                <div class="col-sm-10">
                                    <div id="dynamic-credentials">
                                        @if(old('source_type'))
                                            @include('vendor.booking_sync.partials.credentials', [
                                                'sourceType' => old('source_type'),
                                                'credentials' => old('credentials', [])
                                            ])
                                        @else
                                            <div class="alert alert-info">
                                                Please select a source type first
                                            </div>
                                        @endif
                                    </div>
                                    @error('credentials')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="sync_frequency" class="col-sm-2 col-form-label">Sync Frequency *</label>
                                <div class="col-sm-10">
                                    <select id="sync_frequency" name="sync_frequency" class="form-select" required>
                                        @foreach(\App\Models\BookingSync::getFrequencyOptions() as $key => $label)
                                            <option value="{{ $key }}" {{ old('sync_frequency') == $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('sync_frequency')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" id="custom-frequency-container" style="{{ old('sync_frequency') != 'custom' ? 'display: none;' : '' }}">
                                <label for="custom_frequency" class="col-sm-2 col-form-label">Custom Frequency (minutes) *</label>
                                <div class="col-sm-10">
                                    <input type="number" id="custom_frequency" name="custom_frequency" class="form-control" 
                                           min="5" value="{{ old('custom_frequency', 30) }}">
                                    @error('custom_frequency')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="is_active" class="col-sm-2 col-form-label">Active Status</label>
                                <div class="col-sm-10">
                                    <div class="form-check form-switch">
                                        <input type="checkbox" id="is_active" name="is_active" class="form-check-input" 
                                               value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Active</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2 d-flex gap-2">
                                    <a href="{{ url('vendor/booking_sync/list') }}" class="btn btn-secondary">
                                        <i class="bi bi-x-circle"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Create Configuration
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sourceTypeSelect = document.getElementById('source_type');
    const syncFrequencySelect = document.getElementById('sync_frequency');
    const credentialsSection = document.getElementById('dynamic-credentials');
    const customFrequencyContainer = document.getElementById('custom-frequency-container');

    // Update credential fields when source type changes
    sourceTypeSelect.addEventListener('change', function() {
        const sourceType = this.value;
        
        if (!sourceType) {
            credentialsSection.innerHTML = '<div class="alert alert-info">Please select a source type first</div>';
            return;
        }
        
        fetch(`{{ url('vendor/booking_sync/credentials_form') }}?source_type=${sourceType}`)
            .then(response => response.text())
            .then(html => {
                credentialsSection.innerHTML = html;
            });
    });

    // Toggle custom frequency field
    syncFrequencySelect.addEventListener('change', function() {
        if (this.value === 'custom') {
            customFrequencyContainer.style.display = 'flex';
            document.getElementById('custom_frequency').setAttribute('required', 'required');
        } else {
            customFrequencyContainer.style.display = 'none';
            document.getElementById('custom_frequency').removeAttribute('required');
        }
    });

    // Initialize if there are old values
    if (sourceTypeSelect.value) {
        sourceTypeSelect.dispatchEvent(new Event('change'));
    }
    if (syncFrequencySelect.value === 'custom') {
        customFrequencyContainer.style.display = 'flex';
    }
});
</script>
@endpush

@endsection