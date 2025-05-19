@extends('user.layouts.app')

@section('content')
<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="fas fa-tools me-2"></i>Service Requests</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
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
                            <table id="serviceRequestsTable" class="table table-striped table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Request ID</th>
                                        <th>Request Date</th>
                                        <th>Scheduled Date</th>
                                        <th>Service Type</th>
                                        <th>Category</th>
                                        <th>Subcategory</th>
                                        <th>Service Plan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getrecord as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>SR-{{ str_pad($value->id, 5, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ date('d M Y', strtotime($value->created_at)) }}</td>
                                        <td>{{ date('d M Y', strtotime($value->available_date)) }}</td>
                                        <td>{{ $value->get_service_type_name->name ?? 'N/A' }}</td>
                                        <td>{{ $value->get_category_name->name ?? 'N/A' }}</td>
                                        <td>{{ $value->get_sub_category_name->name ?? 'N/A' }}</td>
                                        <td>{{ $value->get_amc_free_service->name ?? 'Standard' }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('user/book_service/edit/'.$value->id) }}" 
                                               class="btn btn-outline-success btn-sm me-1" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this request?')" 
                                               href="{{ url('user/book_service/delete/'.$value->id) }}" 
                                               class="btn btn-outline-danger btn-sm" title="Delete">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-5">
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
                { orderable: true, targets: [1, 2, 3] },
                { orderable: false, targets: [0, 4, 5, 6, 7, 8] }
            ],
            order: [[1, 'desc']]
        });
    });
</script>
@endsection