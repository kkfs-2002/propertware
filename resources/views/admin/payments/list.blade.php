@extends('admin.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="mb-2 text-dark fw-semibold ms-4 mt-3">Payment Management</h1>
        <nav>
            <ol class="breadcrumb ms-4 ">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Dashboard</a></li>
                <li class="breadcrumb-item active text-primary">Payment Transactions</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                            <span class="fw-medium">{{ session('success') }}</span>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0 fw-semibold text-dark">Payment Transactions</h5>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown">
                                    <i class="bi bi-funnel me-1"></i> Filter
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow">
                                    <li><h6 class="dropdown-header">Payment Status</h6></li>
                                    <li><a class="dropdown-item" href="#">All Payments</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="#">Pending</a></li>
                                    <li><a class="dropdown-item" href="#">Verified</a></li>
                                    <li><a class="dropdown-item" href="#">Rejected</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4 py-3 text-uppercase text-dark fw-medium" style="width: 20%">User</th>
                                        <th class="py-3 text-uppercase text-dark fw-medium" style="width: 15%">Method</th>
                                        <th class="py-3 text-uppercase text-dark fw-medium" style="width: 15%">Amount</th>
                                        <th class="py-3 text-uppercase text-dark fw-medium" style="width: 15%">Status</th>
                                        <th class="py-3 text-uppercase text-dark fw-medium" style="width: 20%">Admin Note</th>
                                        <th class="pe-4 py-3 text-uppercase text-dark fw-medium" style="width: 15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    <tr class="border-top">
                                        <td class="ps-4 py-3">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar me-3">
                                                    <span class="avatar-initial rounded-circle bg-primary bg-opacity-10 text-primary fw-semibold">
                                                        {{ substr($payment->user->name, 0, 1) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0 fw-semibold">{{ $payment->user->name }}</h6>
                                                    <small class="text-muted">ID: {{ $payment->user->id }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-3">
                                            <span class="badge bg-info bg-opacity-10 text-info fw-normal">
                                                <i class="bi bi-credit-card me-1"></i> {{ ucfirst($payment->payment_method) }}
                                            </span>
                                        </td>
                                        <td class="py-3 fw-semibold text-dark">Rs.{{ number_format($payment->amount, 2) }}</td>
                                        <td class="py-3">
                                            @if($payment->status == 'verified')
                                                <span class="badge bg-success bg-opacity-10 text-success">
                                                    <i class="bi bi-check-circle me-1"></i> Verified
                                                </span>
                                            @elseif($payment->status == 'rejected')
                                                <span class="badge bg-danger bg-opacity-10 text-danger">
                                                    <i class="bi bi-x-circle me-1"></i> Rejected
                                                </span>
                                            @else
                                                <span class="badge bg-warning bg-opacity-10 text-warning">
                                                    <i class="bi bi-hourglass-top me-1"></i> Pending
                                                </span>
                                            @endif
                                        </td>
                                        <td class="py-3">
                                            <form action="{{ url('admin/payments/update-note', $payment->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="input-group">
                                                    <input type="text" 
                                                           name="admin_message" 
                                                           class="form-control form-control-sm border-end-0" 
                                                           value="{{ $payment->admin_message ?? '' }}" 
                                                           placeholder="Add note...">
                                                    <button type="submit" class="btn btn-sm btn-outline-primary border-start-0">
                                                        <i class="bi bi-save"></i>
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="pe-4 py-3">
                                            @if($payment->status == 'pending')
                                                <div class="d-flex gap-2">
                                                    <form action="{{ url('admin/payments/update', $payment->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="action" value="verify" class="btn btn-sm btn-success px-3">
                                                            <i class="bi bi-check-lg me-1"></i> Verify
                                                        </button>
                                                    </form>
                                                    <form action="{{ url('admin/payments/update', $payment->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit" name="action" value="reject" class="btn btn-sm btn-danger px-3">
                                                            <i class="bi bi-x-lg me-1"></i> Reject
                                                        </button>
                                                    </form>
                                                </div>
                                            @else
                                                <form action="{{ url('admin/payments/update', $payment->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" name="action" value="pending" class="btn btn-sm btn-outline-secondary">
                                                        <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($payments->lastPage() > 1)
                    <div class="card-footer bg-white border-0 py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-muted small">
                                Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }} of {{ $payments->total() }} entries
                            </div>
                            <nav aria-label="Page navigation">
                                {{ $payments->onEachSide(1)->links() }}
                            </nav>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    .avatar-initial {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
    }
    .badge {
        padding: 0.45rem 0.65rem;
        font-size: 0.75rem;
    }
    .table > :not(:first-child) {
        border-top: 1px solid #f0f0f0;
    }
    .form-control-sm {
        min-height: calc(1.5em + 0.5rem + 2px);
        padding: 0.25rem 0.5rem;
    }
    .dropdown-menu {
        min-width: 12rem;
    }
    .pagination {
        margin-bottom: 0;
    }
</style>

@endsection