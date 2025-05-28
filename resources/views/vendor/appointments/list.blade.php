@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <!-- Enhanced Page Header -->
    <div class="pagetitle mb-4">
        <h1 class="text-dark fw-semibold ms-3 mb-3">Appointments</h1>
        <nav>
            <ol class="breadcrumb bg-light p-2 rounded">
                <li class="breadcrumb-item"><a href="{{ url('') }}" class="text-primary">Dashboard</a></li>
                <li class="breadcrumb-item active text-secondary">Appointments</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                
                <!-- Enhanced Card -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <!-- Card Header with Button -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5 class="card-title fw-semibold text-dark mb-0">Appointment List</h5>
                            <a href="{{ url('vendor/appointments/add') }}" class="btn btn-primary">
                                <i class="fas fa-plus me-2"></i> New Appointment
                            </a>
                        </div>
                        
                        <!-- Enhanced Table -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th class="py-3 px-3">ID</th>
                                        <th class="py-3 px-3">Title</th>
                                        <th class="py-3 px-3">Date</th>
                                        <th class="py-3 px-3">Time</th>
                                        <th class="py-3 px-3">Status</th>
                                        <th class="py-3 px-3 text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getrecord as $value)
                                        <tr>
                                            <td class="py-3 px-3">{{ $value->id }}</td>
                                            <td class="py-3 px-3 fw-medium">{{ $value->title }}</td>
                                            <td class="py-3 px-3">{{ $value->appointment_date }}</td>
                                            <td class="py-3 px-3">{{ $value->appointment_time }}</td>
                                            <td class="py-3 px-3">
                                                @if($value->status == 1)
                                                    <span class="badge bg-success bg-opacity-10 text-success py-2 px-3 rounded-pill">
                                                        Active
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger bg-opacity-10 text-danger py-2 px-3 rounded-pill">
                                                        Inactive
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-3 text-end">
                                                <div class="d-flex justify-content-end gap-2">
                                                    <a href="{{ url('vendor/appointments/edit/' . $value->id) }}" class="btn btn-sm btn-outline-primary rounded-3">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="{{ url('vendor/appointments/delete/' . $value->id) }}" 
                                                       onclick="return confirm('Are you sure?')" 
                                                       class="btn btn-sm btn-outline-danger rounded-3">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="py-5 text-center text-muted">
                                                <i class="far fa-calendar-alt fa-2x mb-3"></i>
                                                <p class="mb-0">No appointments found</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection