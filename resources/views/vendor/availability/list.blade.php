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

                        <div class="table-responsive">
                            <table class="table table-hover datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Date</th>
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Status</th>
                                        <th>Booked</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getrecord as $value)
                                        <tr>
                                            <td>{{ date('d M Y', strtotime($value->available_date)) }}</td>
                                            <td>{{ $value->day }}</td>
                                            <td>{{ date('h:i A', strtotime($value->start_time)) }}</td>
                                            <td>{{ date('h:i A', strtotime($value->end_time)) }}</td>
                                            <td>
                                                @if($value->status == 1)
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($value->is_booked == 1)
                                                    <span class="badge bg-warning">Booked</span>
                                                @else
                                                    <span class="badge bg-secondary">Available</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ url('vendor/availability/edit/' . $value->id) }}" 
                                                       class="btn btn-outline-success btn-sm me-2">
                                                       <i class="bi bi-pencil"></i> Edit
                                                    </a>
                                                  
                                                    <a href="{{ url('vendor/availability/delete/' . $value->id) }}" 
                                                       onclick="return confirm('Are you sure?')" 
                                                       class="btn btn-outline-danger btn-sm">
                                                       <i class="bi bi-trash"></i> Delete
                                                    </a>
                                                   
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                No availability slots found. 
                                                <a href="{{ url('vendor/availability/add') }}">Add your first slot</a>
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