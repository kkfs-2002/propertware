@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">My Availability</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Availability</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('vendor/availability/add') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Add New Availability Slot
                            </a>
                        </h5>
                        
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="post" action="{{ url('vendor/availability/save') }}" id="availabilityForm">
                            @csrf
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Day</th>
                                            <th>Start Time</th>
                                            <th>End Time</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($getrecord as $index => $value)
                                            <tr>
                                                <td>
                                                    <select name="availability[{{$index}}][day]" class="form-control" required>
                                                        <option value="">Select Day</option>
                                                        @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                           <option value="{{ $day }}" {{ $value->day == $day ? 'selected' : '' }}>

                                                                {{ $day }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="availability[{{$index}}][id]" value="{{ $value->id }}">
                                                </td>
                                                <td>
                                                    <input type="time" name="availability[{{$index}}][start_time]" 
                                                           class="form-control @error('availability.'.$index.'.start_time') is-invalid @enderror" 
                                                           value="{{ old('availability.'.$index.'.start_time', $value->start_time) }}" 
                                                           required>
                                                    @error('availability.'.$index.'.start_time')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <input type="time" name="availability[{{$index}}][end_time]" 
                                                           class="form-control @error('availability.'.$index.'.end_time') is-invalid @enderror" 
                                                           value="{{ old('availability.'.$index.'.end_time', $value->end_time) }}" 
                                                           required>
                                                    @error('availability.'.$index.'.end_time')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                                <td>
                                                    <select name="availability[{{$index}}][status]" class="form-control">
                                                        <option value="1" {{ old('availability.'.$index.'.status', $value->status) == 1 ? 'selected' : '' }}>Active</option>
                                                        <option value="0" {{ old('availability.'.$index.'.status', $value->status) == 0 ? 'selected' : '' }}>Inactive</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="{{ url('vendor/availability/delete/' . $value->id) }}" 
                                                       onclick="return confirm('Are you sure you want to delete this availability slot?')" 
                                                       class="btn btn-sm btn-danger" title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted py-4">
                                                    No availability slots found. 
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            
                            @if(count($getrecord) > 0)
                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-save"></i> Save Changes
                                </button>
                                <a href="{{ url('vendor/availability') }}" class="btn btn-secondary">
                                    <i class="bi bi-x-circle"></i> Cancel
                                </a>
                            </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection