@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Edit Booking Sync</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('vendor/booking-sync') }}">Booking Sync</a></li>
                <li class="breadcrumb-item active">Edit Booking Sync</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Booking Sync</h5>

                        <form action="{{ url('vendor/booking-sync/update/' . $sync->id) }}" method="POST">
                            @csrf
                            @method('Post')

                            {{-- Name --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required 
                                           value="{{ old('name', $sync->name) }}">
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Source --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Source <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="source" class="form-control" required 
                                           value="{{ old('source', $sync->source) }}">
                                    @error('source') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Frequency --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Frequency <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="frequency" class="form-control" required 
                                           value="{{ old('frequency', $sync->frequency) }}">
                                    @error('frequency') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Last Sync --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Last Sync <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input type="datetime-local" name="last_sync" class="form-control" required 
                                           value="{{ old('last_sync', \Carbon\Carbon::parse($sync->last_sync)->format('Y-m-d\TH:i')) }}">
                                    @error('last_sync') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Status --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control">
                                        <option value="1" {{ old('status', $sync->status) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status', $sync->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="row mb-3">
                                <div class="col-sm-10 offset-sm-2 d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-save"></i> Update Sync
                                    </button>
                                    <a href="{{ url('vendor/booking-sync') }}" class="btn btn-secondary">
                                        <i class="bi bi-x-circle"></i> Cancel
                                    </a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
