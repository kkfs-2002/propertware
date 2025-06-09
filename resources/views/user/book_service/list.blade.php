@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="fas fa-tools me-2"></i>Service Requests</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Service Requests</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

@isset($notifications)
    @foreach($notifications as $notification)
        <div class="custom-modal-overlay" id="noti-modal-{{ $notification->id }}" style="display:flex;">
            <div class="custom-modal">
                <div class="custom-modal-header">
                    <span class="custom-modal-title">{{ $notification->title }}</span>
                    <button class="custom-modal-close" onclick="closeNotificationModal({{ $notification->id }})">&times;</button>
                </div>
                <div class="custom-modal-body text-center">
                    <p>{{ $notification->message }}</p>
                    <div class="custom-modal-actions mt-2">
                        <button class="btn btn-success btn-lg me-4 px-5"
                                onclick="notificationStatus({{ $notification->id }}, 'approve', {{ $notification->service_request_id }})">
                            Approve
                        </button>
                        <button class="btn btn-danger btn-lg px-5"
                                onclick="notificationStatus({{ $notification->id }}, 'reject', {{ $notification->service_request_id }})">
                            Reject
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endisset

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function closeNotificationModal(notiId) {
    document.getElementById('noti-modal-' + notiId).style.display = 'none';
}

function notificationStatus(notificationId, action, serviceRequestId) {
    closeNotificationModal(notificationId);

    $.ajax({
        url: '{{ route("user.book_service.update_status") }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: serviceRequestId,
            action: action
        },
        success: function(response) {
            if (response.success) {
                // Update UI
                let badge = $('#status-badge-' + serviceRequestId);
                badge.removeClass('bg-warning bg-danger bg-success');
                
                if(action === 'approve') {
                    badge.addClass('bg-success').text('APPROVED');
                    $('#pay-btn-' + serviceRequestId).show();
                } else {
                    badge.addClass('bg-danger').text('REJECTED');
                    $('#pay-btn-' + serviceRequestId).hide();
                }
                
                // Mark notification as read
                $.post('{{ route("user.notifications.mark_read") }}', {
                    _token: '{{ csrf_token() }}',
                    id: notificationId
                });
                
            } else {
                alert('Error: ' + response.message);
            }
        },
        error: function() {
            alert('An error occurred. Please try again.');
        }
    });
}
</script>

<style>
.custom-modal-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(44, 62, 80, 0.3);
    z-index: 2000;
    display: flex;
    align-items: center;
    justify-content: center;
}
.custom-modal {
    background: #fff;
    border-radius: 30px;
    box-shadow: 0 6px 24px rgba(44,62,80,0.16);
    width: 430px;
    max-width: 95vw;
    padding: 2.5rem 2rem 2.5rem 2rem;
    position: relative;
}
.custom-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}
.custom-modal-title {
    font-size: 1.4rem;
    font-weight: 600;
}
.custom-modal-close {
    background: none;
    border: none;
    font-size: 2rem;
    line-height: 1;
    color: #666;
    cursor: pointer;
}
.custom-modal-close:hover {
    color: #e74c3c;
}
.custom-modal-actions {
    display: flex;
    justify-content: center;
    gap: 2rem;
}
.btn-lg {
    font-size: 1.15rem;
    padding-top: 0.7rem;
    padding-bottom: 0.7rem;
}
</style>

@include('_message')
<div class="card border-0 shadow-sm rounded-3 mt-3">
    <div class="card-header d-flex justify-content-between align-items-center bg-light">
        <h5 class="mb-0">Your Service Requests</h5>
        <a href="{{ url('user/book_service/add') }}" class="btn btn-sm btn-primary">
            <i class="bi bi-plus-circle me-1"></i> New Request
        </a>
    </div>
    <div class="card-body p-3">
        <div class="table-responsive">
            <table id="serviceRequestsTable" class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Service Type</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($getrecord as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->serviceType->name ?? 'N/A' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($request->description, 50) }}</td>
                        <td>
                            <span class="badge
                                {{ $request->status == \App\Models\BookServiceModel::STATUS_APPROVED ? 'bg-success' :
                                    ($request->status == \App\Models\BookServiceModel::STATUS_REJECTED ? 'bg-danger' : 'bg-warning') }}"
                                id="status-badge-{{ $request->id }}">
                                {{ $request->status_label }}
                            </span>
                        </td>
                        <td>{{ $request->created_at?->format('d M Y') }}</td>
                        <td class="text-center">
                            <a href="{{ url('user/book_service/edit/'.$request->id) }}" 
                               class="btn btn-outline-primary btn-sm me-1" title="View">
                              <i class="fas fa-edit"></i>
                            </a>
                            <a onclick="return confirm('Are you sure you want to delete this request?')" 
                               href="{{ url('user/book_service/delete/'.$request->id) }}" 
                               class="btn btn-outline-danger btn-sm" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a href="{{ url('user/payments/create?service_request_id='.$request->id) }}"
                               class="btn btn-outline-success btn-sm mt-1 pay-btn"
                               id="pay-btn-{{ $request->id }}"
                               style="{{ $request->status == \App\Models\BookServiceModel::STATUS_APPROVED ? '' : 'display:none;' }}">
                                <i class="bi bi-credit-card"></i> Pay
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="py-4">
                                <i class="bi bi-calendar-x display-5 text-muted"></i>
                                <h5 class="mt-3">No service requests found</h5>
                                <p class="text-muted">You haven't created any service requests yet</p>
                                <a href="{{ url('user/book_service/add') }}" class="btn btn-primary btn-sm mt-2">
                                    <i class="bi bi-plus-circle me-2"></i>Create Your First Request
                                </a>
                            </div>
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