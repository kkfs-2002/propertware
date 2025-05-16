@extends('vendor.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">My Time Slots</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Time Slots</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message') {{-- Include message partial for flash messages --}}

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-between align-items-center">
                            <span>Available Time Slots</span>
                            <a href="{{ url('vendor/time_slots/create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Add New Slot
                            </a>
                        </h5>

                        <div class="table-responsive">
                            <table class="table table-hover datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Service</th>
                                        <th>Day</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($timeSlots as $slot)
                                        <tr>
                                            <td>{{ $slot->service->name }}</td>
                                            <td>{{ $slot->day_of_week }}</td>
                                            <td>{{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }}</td>
                                            <td>
                                                <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure to delete this time slot?')) document.getElementById('delete-slot-{{ $slot->id }}').submit();" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                                <form id="delete-slot-{{ $slot->id }}" action="{{ url('vendor/time_slots/delete/' . $slot->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">
                                                No time slots available. <a href="{{ url('vendor/time_slots/create') }}">Add your first slot</a>
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
