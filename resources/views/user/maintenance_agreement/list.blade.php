@extends('user.layouts.app')

@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-3"><i class="fas fa-file-contract me-2"></i> Maintenance Agreements</h1>
        <nav>
            <ol class="breadcrumb ms-4">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Maintenance Agreements</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')

                <div class="card border-0 shadow-sm rounded-3 mt-3">
                    <div class="card-header d-flex justify-content-between align-items-center bg-light">
                        <h5 class="mb-0">Maintenance Agreements List</h5>
                        <a href="{{ url('user/maintenance_agreement/add') }}" class="btn btn-sm btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Add New Agreement
                        </a>
                    </div>

                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table id="maintenanceTable" class="table table-striped table-bordered align-middle mb-0">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>#</th>
                                        <th>Agreement Number</th>
                                        <th>Client Name</th>
                                        <th>Service Type</th>
                                        <th>Start Date</th>
                                        <th>Status</th>
                                        <th>Paid Status</th>
                                        <th>Next Maintenance</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getrecord as $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->agreement_number }}</td>
                                        <td>{{ $value->client_name }}</td>
                                        <td>{{ $value->service_type }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->start_date)) }}</td>
                                        <td>
                                            @if($value->status == 0)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->paid_status == 0)
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-danger">Unpaid</span>
                                            @endif
                                        </td>
                                        <td>{{ date('d-m-Y', strtotime($value->next_maintenance_date)) }}</td>
                                        <td>{{ date('d-m-Y H:i', strtotime($value->created_at)) }}</td>
                                        <td class="text-center">
                                          
    <a href="{{ url('user/maintenance_agreement/edit/'.$value->id) }}" class="btn btn-outline-success btn-sm me-1" title="Edit">
        <i class="fas fa-edit"></i>
    </a>
    <a href="{{ url('user/maintenance_agreement/delete/'.$value->id) }}" onclick="return confirm('Are you sure you want to delete?')" class="btn btn-outline-danger btn-sm" title="Delete">
    <i class="fas fa-trash-alt"></i>
</a>
</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Remove the pagination links if using DataTable -->
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
        $('#maintenanceTable').DataTable({
            responsive: true,
            dom: '<"top"f>rt<"bottom"lip><"clear">',
            pageLength: 10,
            // Disable server-side processing since we're using client-side DataTable
            processing: false,
            serverSide: false
        });
    });
</script>
@endsection