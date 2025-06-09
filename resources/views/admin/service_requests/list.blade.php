@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3">Service Requests</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Service Requests</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Service Type</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($requests as $request)
                                    <tr class="
                                        @if($request->status == \App\Models\BookServiceModel::STATUS_APPROVED) table-success
                                        @elseif($request->status == \App\Models\BookServiceModel::STATUS_REJECTED) table-danger
                                        @endif
                                    ">
                                        <td>{{ $request->id }}</td>
                                        <td>{{ $request->user->name }}</td>
                                        <td>{{ $request->serviceType->name ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($request->description, 50) }}</td>
                                        <td>
                                            <span class="badge bg-{{ 
                                                $request->status == \App\Models\BookServiceModel::STATUS_APPROVED ? 'success' : 
                                                ($request->status == \App\Models\BookServiceModel::STATUS_REJECTED ? 'danger' : 'warning') 
                                            }}">
                                                {{ $request->status_label }}
                                            </span>
                                        </td>
                                        <td>{{ $request->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ url('admin/service_requests/view', $request->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                            @if($request->status == \App\Models\BookServiceModel::STATUS_APPROVED)
                                                <a href="{{ url('admin/vendor/select/'.$request->id) }}" class="btn btn-success btn-sm">
                                                    Assign Vendor
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            {{ $requests->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection