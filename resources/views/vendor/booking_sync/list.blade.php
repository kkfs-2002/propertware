@extends('vendor.layouts.app')
@section('content')

<div class="body-wrapper">
    <div class="pagetitle">
        <h1 class="ms-4 mt-2 p-2">Booking Sync Configurations</h1>
        <nav>
            <ol class="breadcrumb ms-4 p-2">
                <li class="breadcrumb-item"><a href="{{ url('vendor.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Sync Configurations</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @include('_message')
                
                <!-- Sync Summary Cards - Modern Design -->
                <div class="row mb-4">
                    <div class="col-xl-3 col-md-6">
                        <div class="card summary-card bg-gradient-primary">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-subtitle mb-2">Total Configs</h6>
                                        <h3 class="card-title mb-0">{{ $stats['total'] }}</h3>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="bi bi-gear-fill"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <small class="text-white-50">All sync configurations</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6">
                        <div class="card summary-card bg-gradient-success">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-subtitle mb-2">Active</h6>
                                        <h3 class="card-title mb-0">{{ $stats['active'] }}</h3>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <small class="text-white-50">Currently active syncs</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6">
                        <div class="card summary-card bg-gradient-info">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-subtitle mb-2">Successful Syncs</h6>
                                        <h3 class="card-title mb-0">{{ $stats['successful'] }}</h3>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="bi bi-check2-all"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <small class="text-white-50">Last 30 days</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-md-6">
                        <div class="card summary-card bg-gradient-danger">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-subtitle mb-2">Google Calendar</h6>
                                        <h3 class="card-title mb-0">{{ $stats['google'] }}</h3>
                                    </div>
                                    <div class="icon-circle">
                                        <i class="bi bi-google"></i>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <small class="text-white-50">Google integrations</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Card with Table -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div>
                                <h5 class="card-title m-0">Sync Configurations</h5>
                                <p class="small text-muted m-0">Manage your calendar sync integrations</p>
                            </div>
                            <div class="d-flex gap-2">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                        <i class="bi bi-funnel"></i> Filter
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><h6 class="dropdown-header">Filter by</h6></li>
                                        <li><a class="dropdown-item" href="?status=all">All Configurations</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><h6 class="dropdown-header">Source</h6></li>
                                        <li><a class="dropdown-item" href="?source=google_calendar">
                                            <i class="bi bi-google me-2 text-danger"></i> Google Calendar
                                        </a></li>
                                        <li><a class="dropdown-item" href="?source=outlook">
                                            <i class="bi bi-microsoft me-2 text-primary"></i> Outlook
                                        </a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="?status=active">
                                            <i class="bi bi-check-circle me-2 text-success"></i> Active Only
                                        </a></li>
                                    </ul>
                                </div>
                                <a href="{{ url('vendor/booking_sync/create') }}" class="btn btn-primary d-flex align-items-center">
                                    <i class="bi bi-plus-lg me-2"></i> New Sync
                                </a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Configuration</th>
                                        <th>Source</th>
                                        <th>Sync Details</th>
                                        <th>Status</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($syncs as $sync)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar me-3">
                                                    @if($sync->source_type == 'google_calendar')
                                                    <span class="avatar-initial rounded bg-danger bg-opacity-10 text-danger">
                                                        <i class="bi bi-google"></i>
                                                    </span>
                                                    @elseif($sync->source_type == 'outlook')
                                                    <span class="avatar-initial rounded bg-primary bg-opacity-10 text-primary">
                                                        <i class="bi bi-microsoft"></i>
                                                    </span>
                                                    @else
                                                    <span class="avatar-initial rounded bg-secondary bg-opacity-10 text-secondary">
                                                        <i class="bi bi-calendar"></i>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div>
                                                    <h6 class="mb-1">{{ $sync->name }}</h6>
                                                    <small class="text-muted">Created {{ $sync->created_at->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="badge bg-light text-dark me-2">
                                                    <i class="bi bi-{{ $sync->source_type == 'google_calendar' ? 'google' : 'microsoft' }} me-1"></i>
                                                    {{ \App\Models\BookingSync::getSourceTypes()[$sync->source_type] ?? $sync->source_type }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fw-medium">{{ \App\Models\BookingSync::getFrequencyOptions()[$sync->sync_frequency] ?? $sync->sync_frequency }}</span>
                                                @if($sync->sync_frequency == 'custom')
                                                <small class="text-muted">Every {{ $sync->custom_frequency }} minutes</small>
                                                @endif
                                                @if($sync->last_sync_at)
                                                <small class="text-muted">Last sync: {{ $sync->last_sync_at->diffForHumans() }}</small>
                                                @else
                                                <small class="text-muted">Never synced</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            @if($sync->is_active)
                                            <span class="badge bg-success bg-opacity-10 text-success">
                                                <i class="bi bi-check-circle-fill me-1"></i> Active
                                            </span>
                                            @else
                                            <span class="badge bg-secondary bg-opacity-10 text-secondary">
                                                <i class="bi bi-pause-circle-fill me-1"></i> Inactive
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="{{ url('vendor/booking_sync/edit/' . $sync->id) }}" 
                                                   class="btn btn-sm btn-outline-primary" 
                                                   data-bs-toggle="tooltip" 
                                                   title="Edit configuration">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                               
                                                <form action="{{ url('vendor/booking_sync/delete/' . $sync->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="tooltip" 
                                                            title="Delete configuration"
                                                            onclick="return confirm('Are you sure you want to delete this sync configuration?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5">
                                            <div class="d-flex flex-column align-items-center">
                                                <i class="bi bi-calendar-x fs-1 text-muted mb-3"></i>
                                                <h5 class="text-muted mb-2">No sync configurations found</h5>
                                                <p class="text-muted mb-4">Get started by creating your first sync configuration</p>
                                                <a href="{{ url('vendor/booking_sync/create') }}" class="btn btn-primary">
                                                    <i class="bi bi-plus-lg me-2"></i> Create Sync
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        
                        @if($syncs->count() > 0)
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <div class="text-muted">
                                Showing {{ $syncs->firstItem() }} to {{ $syncs->lastItem() }} of {{ $syncs->total() }} entries
                            </div>
                            <nav aria-label="Page navigation">
                                {{ $syncs->links() }}
                            </nav>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('styles')
<style>
    .summary-card {
        border: none;
        border-radius: 12px;
        color: white;
        transition: transform 0.3s ease;
    }
    
    .summary-card:hover {
        transform: translateY(-5px);
    }
    
    .summary-card .icon-circle {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .avatar-initial {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1rem;
    }
    
    .card {
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }
    
    .table th {
        border-top: none;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        color: #6c757d;
    }
    
    .table td {
        vertical-align: middle;
    }
    
    .badge {
        padding: 0.35em 0.65em;
        font-weight: 500;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endpush