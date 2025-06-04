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
                                      <span class="badge bg-{{ 
                                       $request->status == \App\Models\BookServiceModel::STATUS_APPROVED ? 'success' : 
                                    ($request->status == \App\Models\BookServiceModel::STATUS_REJECTED ? 'danger' : 'warning') 
                                 }}">
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
                                               class="btn btn-outline-success btn-sm mt-1" title="Make Payment">
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
                            {{-- If you want pagination links, uncomment below --}}
                            {{-- <div class="mt-3">{{ $getrecord->links() }}</div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#serviceRequestsTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            pageLength: 10,
            processing: false,
            serverSide: false,
            columnDefs: [
                { orderable: true, targets: [0, 1, 2, 3, 4] },
                { orderable: false, targets: [5] }
            ],
            order: [[0, 'desc']]
        });
    });
</script>
@endsection