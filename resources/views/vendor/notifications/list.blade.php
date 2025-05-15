@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">My Notifications & Reminders</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('vendor/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Notifications</li>
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
                            <a href="{{ url('vendor/notifications/create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Add New Reminder
                            </a>
                        </h5>

                        <div class="table-responsive">
                            <table class="table table-hover datatable">
                                <thead class="table-light">
                                    <tr>
                                        <th>Title</th>
                                        <th>Message</th>
                                        <th>Remind At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($notifications as $note)
                                        <tr>
                                            <td>{{ $note->title }}</td>
                                            <td>{{ $note->message }}</td>
                                            <td>{{ date('d M Y h:i A', strtotime($note->remind_at)) }}</td>
                                            <td>
                                               <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-note-{{ $note->id }}').submit();" 
                                               class="btn btn-danger">
                                               <i class="fa fa-trash"></i>
                                               </a>

                                             <form id="delete-note-{{ $note->id }}" action="{{ url('vendor/notifications/delete/' . $note->id) }}" method="POST" style="display: none;">
                                              @csrf
                                              @method('DELETE')
                                               </form>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-muted py-4">
                                                No notifications found. 
                                                <a href="{{ url('vendor/notifications/create') }}">Create your first reminder</a>
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