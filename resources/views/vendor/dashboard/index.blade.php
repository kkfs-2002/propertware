@extends('vendor.layouts.app')

@section('content')
<div class="body-wrapper bg-light">
    <div class="body-wrapper-inner py-4">
        <div class="container-fluid px-4">
            <!-- Summary Cards Row -->
            <div class="row g-4 mb-4">
                <!-- Upcoming Assignments -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-primary bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-15 p-3 rounded-3 me-3">
                                   <i class="ti ti-checklist text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Upcoming Assignments</h6>
                                    <h4 class="mb-0 fw-bold">5</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-primary border-opacity-10">
                                <span class="badge bg-primary bg-opacity-10 text-primary fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>2 New
                                </span>
                                <span class="text-muted fs-7 ms-1">Next 7 days</span>
                            </div>
                        </div>
                        <div class="bg-primary bg-opacity-10" style="height: 4px;">
                            <div class="bg-primary" style="width: 60%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Active Work Orders -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-success bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-15 p-3 rounded-3 me-3">
                                   <i class="ti ti-tool text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Active Work Orders</h6>
                                    <h4 class="mb-0 fw-bold">3</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-success border-opacity-10">
                                <span class="badge bg-success bg-opacity-10 text-success fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>1.2%
                                </span>
                                <span class="text-muted fs-7 ms-1">In progress</span>
                            </div>
                        </div>
                        <div class="bg-success bg-opacity-10" style="height: 4px;">
                            <div class="bg-success" style="width: 70%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Pending Payments -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-info bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-15 p-3 rounded-3 me-3">
                               <i class="ti ti-currency-rupee text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Pending Payments</h6>
                                    <h4 class="mb-0 fw-bold">Rs 42,800</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-info border-opacity-10">
                                <span class="badge bg-info bg-opacity-10 text-info fs-7">
                                    <i class="ti ti-alert-circle fs-5 me-1"></i>2 Overdue
                                </span>
                                <span class="text-muted fs-7 ms-1">From 5 clients</span>
                            </div>
                        </div>
                        <div class="bg-info bg-opacity-10" style="height: 4px;">
                            <div class="bg-info" style="width: 50%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Customer Ratings -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-warning bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-15 p-3 rounded-3 me-3">
                                    <i class="ti ti-star text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Average Rating</h6>
                                    <h4 class="mb-0 fw-bold">4.7/5</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-warning border-opacity-10">
                                <span class="badge bg-warning bg-opacity-10 text-warning fs-7">
                                    <i class="ti ti-trending-up fs-5 me-1"></i>0.3%
                                </span>
                                <span class="text-muted fs-7 ms-1">From 28 reviews</span>
                            </div>
                        </div>
                        <div class="bg-warning bg-opacity-10" style="height: 4px;">
                            <div class="bg-warning" style="width: 78%; height: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Calendar and Work Orders Row -->
            <div class="row g-3 mb-4">
                <!-- Calendar Section -->
                <div class="col-lg-5">
                    <div class="card border-0 rounded-3 shadow-sm h-100">
                        <div class="card-header bg-primary bg-opacity-10 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-primary">My Schedule</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle" type="button" id="calendarDropdown" data-bs-toggle="dropdown">
                                        Month View
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Day View</a></li>
                                        <li><a class="dropdown-item" href="#">Week View</a></li>
                                        <li><a class="dropdown-item" href="#">Month View</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="vendorCalendar" style="min-height: 400px;"></div>
                        </div>
                    </div>
                </div>

                <!-- Recent Work Orders -->
                <div class="col-lg-7">
                    <div class="card border-0 rounded-3 shadow-sm h-100">
                        <div class="card-header bg-success bg-opacity-10 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-success">Recent Assignments</h5>
                                <button class="btn btn-sm btn-success">View All</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-4">Job </th>
                                            <th>Property</th>
                                            <th>Service</th>
                                            <th>Status</th>
                                            <th>Due Date</th>
                                            <th class="pe-4">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="ps-4 fw-bold">WO-2025-045</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('images/logos/im1.jpg') }}" alt="Property" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                                                    <span>Beverly Hills</span>
                                                </div>
                                            </td>
                                            <td>AC Repair</td>
                                            <td><span class="badge bg-warning bg-opacity-10 text-warning">In Progress</span></td>
                                            <td>Today</td>
                                            <td class="pe-4">
                                                <button class="btn btn-sm btn-light border">Details</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 fw-bold">WO-2025-046</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('images/logos/im2.jpg') }}" alt="Property" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                                                    <span>Red Cove</span>
                                                </div>
                                            </td>
                                            <td>Plumbing</td>
                                            <td><span class="badge bg-primary bg-opacity-10 text-primary">Scheduled</span></td>
                                            <td>Tomorrow</td>
                                            <td class="pe-4">
                                                <button class="btn btn-sm btn-light border">Details</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 fw-bold">WO-2025-047</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('images/logos/im4.jpg') }}" alt="Property" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                                                    <span>Palm Pearl</span>
                                                </div>
                                            </td>
                                            <td>Electrical</td>
                                            <td><span class="badge bg-info bg-opacity-10 text-info">Assigned</span></td>
                                            <td>Dec 15</td>
                                            <td class="pe-4">
                                                <button class="btn btn-sm btn-light border">Details</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 fw-bold">WO-2025-048</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('images/logos/im5.jpg') }}" alt="Property" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                                                    <span>Crystal Lake</span>
                                                </div>
                                            </td>
                                            <td>Painting</td>
                                            <td><span class="badge bg-success bg-opacity-10 text-success">Completed</span></td>
                                            <td>Dec 5</td>
                                            <td class="pe-4">
                                                <button class="btn btn-sm btn-light border">Details</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="ps-4 fw-bold">WO-2025-049</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ asset('images/logos/im1.jpg') }}" alt="Property" class="rounded-circle me-2" style="width: 30px; height: 30px; object-fit: cover;">
                                                    <span>Beverly Hills</span>
                                                </div>
                                            </td>
                                            <td>Carpentry</td>
                                            <td><span class="badge bg-danger bg-opacity-10 text-danger">Cancelled</span></td>
                                            <td>Dec 10</td>
                                            <td class="pe-4">
                                                <button class="btn btn-sm btn-light border">Details</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Performance Metrics and Recent Payments -->
            <div class="row g-3 mb-4">
                <!-- Performance Metrics -->
                <div class="col-lg-8">
                    <div class="card border-0 rounded-3 shadow-sm h-100">
                        <div class="card-header bg-info bg-opacity-10 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-info">Performance Metrics</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle" type="button" id="metricsDropdown" data-bs-toggle="dropdown">
                                        Last 6 Months
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">Last Month</a></li>
                                        <li><a class="dropdown-item" href="#">Last 3 Months</a></li>
                                        <li><a class="dropdown-item" href="#">Last 6 Months</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height: 300px;">
                                <canvas id="performanceChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Payments -->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-3 shadow-sm h-100">
                        <div class="card-header bg-success bg-opacity-10 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-success">Recent Payments</h5>
                                <button class="btn btn-sm btn-success">View All</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                                    <i class="ti ti-currency-rupee text-success fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Rs 8,500</h6>
                                    <p class="text-muted fs-7 mb-0">Beverly Hills - AC Repair</p>
                                    <small class="text-muted">Completed on Dec 2, 2024</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 p-2 rounded-3 me-3">
                                    <i class="ti ti-currency-rupee text-primary fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Rs 12,000</h6>
                                    <p class="text-muted fs-7 mb-0">Red Cove - Plumbing</p>
                                    <small class="text-muted">Completed on Apr 28, 2025</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-opacity-10 p-2 rounded-3 me-3">
                                    <i class="ti ti-currency-rupee text-warning fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Rs 6,750</h6>
                                    <p class="text-muted fs-7 mb-0">Palm Pearl - Electrical</p>
                                    <small class="text-muted">Completed on Feb 22, 2025</small>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-10 p-2 rounded-3 me-3">
                                    <i class="ti ti-currency-rupee text-info fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Rs 15,500</h6>
                                    <p class="text-muted fs-7 mb-0">Crystal Lake - Painting</p>
                                    <small class="text-muted">Completed on Jan 15, 2025</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Reviews -->
            <div class="row g-3">
                <div class="col-12">
                    <div class="card border-0 rounded-3 shadow-sm">
                        <div class="card-header bg-warning bg-opacity-10 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-warning">Recent Customer Reviews</h5>
                                <button class="btn btn-sm btn-warning">View All</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Review 1 -->
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0 bg-light h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <img src="{{ asset('images/logos/com4.jpg') }}" class="rounded-circle me-3" width="40" height="40" alt="Customer">
                                                <div>
                                                    <h6 class="mb-0 fw-bold">Nayana Perera</h6>
                                                    <div class="text-warning">
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-0">"Excellent service! The technician arrived on time and fixed our AC issue quickly. Very professional and knowledgeable."</p>
                                            <div class="mt-2 pt-2 border-top">
                                                <small class="text-muted">Beverly Hills - Feb 3, 2025</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Review 2 -->
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0 bg-light h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <img src="{{ asset('images/logos/com3.jpg') }}" class="rounded-circle me-3" width="40" height="40" alt="Customer">
                                                <div>
                                                    <h6 class="mb-0 fw-bold">Rajith Fernando</h6>
                                                    <div class="text-warning">
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star fs-5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-0">"Good plumbing work at Red Cove. The job was done well but took longer than expected. Would use again."</p>
                                            <div class="mt-2 pt-2 border-top">
                                                <small class="text-muted">Red Cove -Jan 29, 2025</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Review 3 -->
                                <div class="col-md-4 mb-3">
                                    <div class="card border-0 bg-light h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-3">
                                                <img src="{{ asset('images/logos/com1.jpg') }}" class="rounded-circle me-3" width="40" height="40" alt="Customer">
                                                <div>
                                                    <h6 class="mb-0 fw-bold">Shamila Bandara</h6>
                                                    <div class="text-warning">
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-filled fs-5"></i>
                                                        <i class="ti ti-star-half-filled fs-5"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-0">"Electrical work at Palm Pearl was completed satisfactorily. Technician was courteous and cleaned up after the job."</p>
                                            <div class="mt-2 pt-2 border-top">
                                                <small class="text-muted">Palm Pearl - Apr 23, 2025</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Performance Chart
    const performanceCtx = document.getElementById('performanceChart').getContext('2d');
    new Chart(performanceCtx, {
        type: 'bar',
        data: {
            labels: ['Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [
                {
                    label: 'Completed Jobs',
                    data: [12, 15, 18, 14, 16, 8],
                    backgroundColor: 'rgba(25, 135, 84, 0.7)',
                    borderColor: 'rgba(25, 135, 84, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Revenue (Rs x1000)',
                    data: [85, 110, 125, 95, 120, 65],
                    backgroundColor: 'rgba(13, 110, 253, 0.7)',
                    borderColor: 'rgba(13, 110, 253, 1)',
                    borderWidth: 1,
                    type: 'line',
                    yAxisID: 'y1'
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jobs Completed'
                    }
                },
                y1: {
                    position: 'right',
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Revenue (Rs)'
                    },
                    grid: {
                        drawOnChartArea: false
                    }
                }
            }
        }
    });

    // Initialize Calendar
    const calendarEl = document.getElementById('vendorCalendar');
    const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: [
            {
                title: 'AC Repair - Beverly Hills',
                start: new Date(),
                end: new Date(),
                backgroundColor: '#0d6efd',
                borderColor: '#0d6efd'
            },
            {
                title: 'Plumbing - Red Cove',
                start: new Date(new Date().setDate(new Date().getDate() + 1)),
                end: new Date(new Date().setDate(new Date().getDate() + 1)),
                backgroundColor: '#198754',
                borderColor: '#198754'
            },
            {
                title: 'Electrical - Palm Pearl',
                start: '2023-12-15',
                end: '2023-12-15',
                backgroundColor: '#fd7e14',
                borderColor: '#fd7e14'
            },
            {
                title: 'Painting - Crystal Lake',
                start: '2023-12-18',
                end: '2023-12-20',
                backgroundColor: '#6f42c1',
                borderColor: '#6f42c1'
            }
        ],
        eventClick: function(info) {
            alert('Event: ' + info.event.title + '\n' +
                  'Start: ' + info.event.start.toLocaleString());
        }
    });
    calendar.render();
});
</script>
@endsection