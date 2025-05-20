@extends('vendor.layouts.app')

@section('content')
<div class="body-wrapper bg-light">
    <div class="body-wrapper-inner py-4">
        <div class="container-fluid px-4">
            <!-- Summary Cards Row -->
            <div class="row g-3 mb-4">
                <!-- Total Properties Card -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-primary bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-15 p-3 rounded-3 me-3">
                                   <i class="ti ti-home text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Total Properties</h6>
                                    <h4 class="mb-0 fw-bold">142</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-primary border-opacity-10">
                                <span class="badge bg-primary bg-opacity-10 text-primary fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>12.5%
                                </span>
                                <span class="text-muted fs-7 ms-1">vs last month</span>
                            </div>
                        </div>
                        <div class="bg-primary bg-opacity-10" style="height: 4px;">
                            <div class="bg-primary" style="width: 65%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Total Revenue Card -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-success bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-15 p-3 rounded-3 me-3">
                                    <i class="ti ti-currency-rupee text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Total Revenue</h6>
                                    <h4 class="mb-0 fw-bold">₹8.42M</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-success border-opacity-10">
                                <span class="badge bg-success bg-opacity-10 text-success fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>18.3%
                                </span>
                                <span class="text-muted fs-7 ms-1">vs last month</span>
                            </div>
                        </div>
                        <div class="bg-success bg-opacity-10" style="height: 4px;">
                            <div class="bg-success" style="width: 80%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- New Leads Card -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-info bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-15 p-3 rounded-3 me-3">
                                    <i class="ti ti-users text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">New Leads</h6>
                                    <h4 class="mb-0 fw-bold">56</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-info border-opacity-10">
                                <span class="badge bg-info bg-opacity-10 text-info fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>7.2%
                                </span>
                                <span class="text-muted fs-7 ms-1">vs last month</span>
                            </div>
                        </div>
                        <div class="bg-info bg-opacity-10" style="height: 4px;">
                            <div class="bg-info" style="width: 45%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Occupancy Rate Card -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-warning bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-warning bg-opacity-15 p-3 rounded-3 me-3">
                                    <i class="ti ti-chart-pie text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Occupancy Rate</h6>
                                    <h4 class="mb-0 fw-bold">82%</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-warning border-opacity-10">
                                <span class="badge bg-warning bg-opacity-10 text-warning fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>3.1%
                                </span>
                                <span class="text-muted fs-7 ms-1">vs last month</span>
                            </div>
                        </div>
                        <div class="bg-warning bg-opacity-10" style="height: 4px;">
                            <div class="bg-warning" style="width: 82%; height: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Row -->
            <div class="row g-3 mb-4">
                <div class="col-lg-8">
                    <div class="card border-0 rounded-3 shadow-sm h-100">
                        <div class="card-header bg-primary bg-opacity-10 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-primary">Monthly Property Sales</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle" type="button" id="chartDropdown" data-bs-toggle="dropdown">
                                        This Year
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                        <li><a class="dropdown-item" href="#">All Time</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height: 300px;">
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card border-0 rounded-3 shadow-sm h-100">
                        <div class="card-header bg-success bg-opacity-10 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-success">Property Types</h5>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-light border dropdown-toggle" type="button" id="pieChartDropdown" data-bs-toggle="dropdown">
                                        This Year
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                        <li><a class="dropdown-item" href="#">Last Year</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height: 200px;">
                                <canvas id="propertyTypeChart"></canvas>
                            </div>
                            <div class="mt-4">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-primary me-2 rounded" style="width: 12px; height: 12px;"></span>
                                    <span class="text-muted fs-7">Apartments</span>
                                    <span class="ms-auto fw-bold fs-7">42%</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2 rounded" style="width: 12px; height: 12px;"></span>
                                    <span class="text-muted fs-7">Villas</span>
                                    <span class="ms-auto fw-bold fs-7">28%</span>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-info me-2 rounded" style="width: 12px; height: 12px;"></span>
                                    <span class="text-muted fs-7">Townhouses</span>
                                    <span class="ms-auto fw-bold fs-7">18%</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-warning me-2 rounded" style="width: 12px; height: 12px;"></span>
                                    <span class="text-muted fs-7">Plots</span>
                                    <span class="ms-auto fw-bold fs-7">12%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Featured Properties -->
            <div class="row g-3">
                <div class="col-12">
                    <div class="bg-dark bg-opacity-10 p-3 rounded-3 mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0 text-dark">Featured Properties</h5>
                            <!-- <a href="#" class="btn btn-sm btn-primary bg-opacity-75">View All <i class="ti ti-chevron-right ms-1"></i></a> -->
                        </div>
                    </div>
                </div>
                
                <!-- Property Card 1 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card h-100 border-0 rounded-3 shadow-sm overflow-hidden property-card">
                        <div class="position-relative">
                            <!-- <a href="/property-details/skyline-echo"> -->
                                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Skyline Echo" style="height: 180px; object-fit: cover;">
                            <!-- </a> -->
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary">Featured</span>
                            </div>
                            <button class="btn btn-sm btn-light rounded-circle p-2 position-absolute top-0 end-0 m-3">
                                <i class="ti ti-heart text-primary fs-4"></i>
                            </button>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0 fs-6">Skyline Echo</h5>
                                <span class="text-primary fw-bold">₹450,000</span>
                            </div>
                            <p class="text-muted fs-7 mb-3">
                                <i class="ti ti-map-pin text-primary fs-7 me-1"></i>
                                Downtown, Bangalore
                            </p>
                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <div>
                                    <i class="ti ti-bed text-primary fs-7 me-1"></i>
                                    <span class="fs-7">3 Beds</span>
                                </div>
                                <div>
                                    <i class="ti ti-bath text-primary fs-7 me-1"></i>
                                    <span class="fs-7">2 Baths</span>
                                </div>
                                <div>
                                    <i class="ti ti-ruler-2 text-primary fs-7 me-1"></i>
                                    <span class="fs-7">1200 sq.ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Card 2 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card h-100 border-0 rounded-3 shadow-sm overflow-hidden property-card">
                        <div class="position-relative">
                            <!-- <a href="/property-details/prestige-pointe"> -->
                                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Prestige Pointe" style="height: 180px; object-fit: cover;">
                            <!-- </a> -->
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-success">New</span>
                            </div>
                            <button class="btn btn-sm btn-light rounded-circle p-2 position-absolute top-0 end-0 m-3">
                                <i class="ti ti-heart text-success fs-4"></i>
                            </button>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0 fs-6">Prestige Pointe</h5>
                                <span class="text-success fw-bold">₹680,000</span>
                            </div>
                            <p class="text-muted fs-7 mb-3">
                                <i class="ti ti-map-pin text-success fs-7 me-1"></i>
                                Whitefield, Bangalore
                            </p>
                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <div>
                                    <i class="ti ti-bed text-success fs-7 me-1"></i>
                                    <span class="fs-7">4 Beds</span>
                                </div>
                                <div>
                                    <i class="ti ti-bath text-success fs-7 me-1"></i>
                                    <span class="fs-7">3 Baths</span>
                                </div>
                                <div>
                                    <i class="ti ti-ruler-2 text-success fs-7 me-1"></i>
                                    <span class="fs-7">1800 sq.ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Card 3 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card h-100 border-0 rounded-3 shadow-sm overflow-hidden property-card">
                        <div class="position-relative">
                            <!-- <a href="/property-details/nova-hills"> -->
                                <img src="https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Nova Hills" style="height: 180px; object-fit: cover;">
                            <!-- </a> -->
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-info">Popular</span>
                            </div>
                            <button class="btn btn-sm btn-light rounded-circle p-2 position-absolute top-0 end-0 m-3">
                                <i class="ti ti-heart text-info fs-4"></i>
                            </button>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0 fs-6">Nova Hills</h5>
                                <span class="text-info fw-bold">₹320,000</span>
                            </div>
                            <p class="text-muted fs-7 mb-3">
                                <i class="ti ti-map-pin text-info fs-7 me-1"></i>
                                Koramangala, Bangalore
                            </p>
                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <div>
                                    <i class="ti ti-bed text-info fs-7 me-1"></i>
                                    <span class="fs-7">2 Beds</span>
                                </div>
                                <div>
                                    <i class="ti ti-bath text-info fs-7 me-1"></i>
                                    <span class="fs-7">2 Baths</span>
                                </div>
                                <div>
                                    <i class="ti ti-ruler-2 text-info fs-7 me-1"></i>
                                    <span class="fs-7">950 sq.ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Property Card 4 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card h-100 border-0 rounded-3 shadow-sm overflow-hidden property-card">
                        <div class="position-relative">
                            <!-- <a href="/property-details/urban-elegance"> -->
                                <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Urban Elegance" style="height: 180px; object-fit: cover;">
                            <!-- </a> -->
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-warning">Deal</span>
                            </div>
                            <button class="btn btn-sm btn-light rounded-circle p-2 position-absolute top-0 end-0 m-3">
                                <i class="ti ti-heart text-warning fs-4"></i>
                            </button>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0 fs-6">Urban Elegance</h5>
                                <span class="text-warning fw-bold">₹525,000</span>
                            </div>
                            <p class="text-muted fs-7 mb-3">
                                <i class="ti ti-map-pin text-warning fs-7 me-1"></i>
                                Indiranagar, Bangalore
                            </p>
                            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                                <div>
                                    <i class="ti ti-bed text-warning fs-7 me-1"></i>
                                    <span class="fs-7">3 Beds</span>
                                </div>
                                <div>
                                    <i class="ti ti-bath text-warning fs-7 me-1"></i>
                                    <span class="fs-7">2.5 Baths</span>
                                </div>
                                <div>
                                    <i class="ti ti-ruler-2 text-warning fs-7 me-1"></i>
                                    <span class="fs-7">1400 sq.ft</span>
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
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sales Chart (Line Chart)
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Properties Sold',
                data: [12, 19, 15, 24, 18, 22, 17, 25, 28, 30, 26, 32],
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                borderColor: 'rgba(13, 110, 253, 1)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointBackgroundColor: '#fff',
                pointBorderColor: 'rgba(13, 110, 253, 1)',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#2c3e50',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 12,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            return context.parsed.y + ' properties';
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        stepSize: 5
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Property Type Chart (Doughnut)
    const propertyTypeCtx = document.getElementById('propertyTypeChart').getContext('2d');
    const propertyTypeChart = new Chart(propertyTypeCtx, {
        type: 'doughnut',
        data: {
            labels: ['Apartments', 'Villas', 'Townhouses', 'Plots'],
            datasets: [{
                data: [42, 28, 18, 12],
                backgroundColor: [
                    'rgba(13, 110, 253, 0.8)',
                    'rgba(25, 135, 84, 0.8)',
                    'rgba(13, 202, 240, 0.8)',
                    'rgba(255, 193, 7, 0.8)'
                ],
                borderColor: '#fff',
                borderWidth: 2,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%',
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#2c3e50',
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    padding: 10,
                    displayColors: true,
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw + '%';
                        }
                    }
                }
            }
        }
    });
});
</script>

<style>
    .property-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .property-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .bg-gradient-primary {
        background: linear-gradient(135deg, #0d6efd, #6c5ce7);
    }
    .bg-gradient-success {
        background: linear-gradient(135deg, #198754, #00b894);
    }
    .bg-gradient-info {
        background: linear-gradient(135deg, #0dcaf0, #0984e3);
    }
    .bg-gradient-warning {
        background: linear-gradient(135deg, #ffc107, #f39c12);
    }
</style>
@endsection