@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2"><i class="fas fa-tools"></i> Annual Maintenance Contract</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">AMC</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Add AMC</h5>

                        <form action="{{ url('admin/amc/add') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @php
                                $inputClass = 'form-control shadow-sm';
                                $errorStyle = 'color:red;';
                            @endphp

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">AMC Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="{{ $inputClass }}" value="{{ old('name') }}" required placeholder="Enter AMC name">
                                <span style="{{ $errorStyle }}">{{ $errors->first('name') }}</span>
                            </div>

                            {{-- Amount --}}
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount <span class="text-danger">*</span></label>
                                <input type="text" name="amount" id="amount" class="{{ $inputClass }}"
                                    value="{{ old('amount') }}" required
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10);" maxlength="10"
                                    placeholder="Enter amount">
                                <span style="{{ $errorStyle }}">{{ $errors->first('amount') }}</span>
                            </div>

                            {{-- Business Category --}}
                            <div class="mb-3">
                                <label for="business_category" class="form-label">Business Category</label>
                                <select class="{{ $inputClass }}" name="business_category" id="business_category">
                                    <option value="0" {{ old('business_category') == '0' ? 'selected' : '' }}>Residential</option>
                                    <option value="1" {{ old('business_category') == '1' ? 'selected' : '' }}>Common-Area</option>
                                </select>
                                <span style="{{ $errorStyle }}">{{ $errors->first('business_category') }}</span>
                            </div>

                            {{-- Series --}}
                            <div class="mb-3">
                                <label for="series" class="form-label">Series <span class="text-danger">*</span></label>
                                <input type="text" name="series" id="series" class="{{ $inputClass }}" value="{{ old('series') }}" required placeholder="Enter series">
                                <span style="{{ $errorStyle }}">{{ $errors->first('series') }}</span>
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-end mt-4">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="fas fa-save me-2"></i>Submit
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
