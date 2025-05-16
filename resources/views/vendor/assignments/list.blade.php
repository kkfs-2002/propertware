@extends('vendor.layouts.app')

@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Assignments</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Assignments</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ url('vendor/assignments/create') }}" class="btn btn-primary">Create New Assignment</a>
                        </h5>
                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($assignments as $assignment)
                                    <tr>
                                        <td>{{ $assignment->title }}</td>
                                        <td>
                                            @if($assignment->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $assignment->start_date }}</td>
                                        <td>{{ $assignment->end_date }}</td>
                                        <td>
                                            <a href="{{ url('vendor/assignments/show', $assignment->id) }}" class="btn btn-info">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ url('vendor/assignments/edit', $assignment->id) }}" class="btn btn-success">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                           <form action="{{ route('vendor.assignments.delete', $assignment->id) }}" method="POST" style="display: inline;">
                                           @csrf
                                           @method('delete')
                                              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this assignment?')">
                                                Delete
                                          </button>
                                           </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No assignments found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection