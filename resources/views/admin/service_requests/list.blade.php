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

    {{-- ✅ Admin Notifications --}}
  @isset($adminNotifications)
    @foreach($adminNotifications as $notification)
        <div class="alert alert-{{ $notification->type }} alert-dismissible fade show mb-3" id="notification-{{ $notification->id }}">
            <strong>{{ $notification->title }}</strong>
            <p class="mb-2">{{ $notification->message }}</p>
            <button type="button" class="btn-close" onclick="markNotificationAsRead({{ $notification->id }})" data-bs-dismiss="alert"></button>
            @if(str_contains($notification->message, 'assign a vendor'))
                <div class="mt-2">
                   
                    <a href="{{ url('admin/vendor/list') }}" 
                       class="btn btn-sm btn-info ms-2">
                        <i class="bi bi-list-ul me-1"></i> View Vendors
                    </a>
                </div>
            @endif
        </div>
    @endforeach
@endisset

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
                                                ($request->status == \App\Models\BookServiceModel::STATUS_REJECTED ? 'danger' : 
                                                ($request->status == \App\Models\BookServiceModel::STATUS_USERAPPROVED ? 'info' : 'warning')) 
                                            }}">
                                                {{ $request->status_label }}
                                            </span>
                                            @if($request->status == \App\Models\BookServiceModel::STATUS_USERAPPROVED)
                                                <span class="badge bg-primary">Waiting for Admin</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/service_requests/view', $request->id) }}" class="btn btn-sm btn-primary">
                                                <i class="bi bi-eye"></i> View
                                            </a>
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

@push('scripts')
<script>
function markNotificationAsRead(notificationId) {
    fetch('{{ route("admin.notifications.mark_read") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ id: notificationId })
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            document.getElementById('notification-' + notificationId).remove();
        }
    });
}
</script>
@endpush
@endsection
