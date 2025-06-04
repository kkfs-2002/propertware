@extends('admin.layouts.app')

@section('content')
<div class="body-wrapper bg-light">
    <div class="body-wrapper-inner py-4">
        <div class="container-fluid px-4">
            <!-- Summary Cards Row -->
            <div class="row g-4 mb-4">
                <!-- Total Vendors Card -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-primary bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary bg-opacity-15 p-3 rounded-3 me-3">
                                    <i class="ti ti-briefcase text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Total Vendors</h6>
                                    <h4 class="mb-0 fw-bold">12</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-primary border-opacity-10">
                                <span class="badge bg-primary bg-opacity-10 text-primary fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>5.3%
                                </span>
                                <span class="text-muted fs-7 ms-1">vs last month</span>
                            </div>
                        </div>
                        <div class="bg-primary bg-opacity-10" style="height: 4px;">
                            <div class="bg-primary" style="width: 60%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Total Users Card -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-success bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-success bg-opacity-15 p-3 rounded-3 me-3">
                                    <i class="ti ti-users text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Total Users</h6>
                                    <h4 class="mb-0 fw-bold">85</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-success border-opacity-10">
                                <span class="badge bg-success bg-opacity-10 text-success fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>2.7%
                                </span>
                                <span class="text-muted fs-7 ms-1">vs last month</span>
                            </div>
                        </div>
                        <div class="bg-success bg-opacity-10" style="height: 4px;">
                            <div class="bg-success" style="width: 70%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Total AMC Plans Card -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-info bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                <div class="bg-info bg-opacity-15 p-3 rounded-3 me-3">
                                    <i class="ti ti-clipboard-text text-white fs-4"></i>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Total AMC Plans</h6>
                                    <h4 class="mb-0 fw-bold">24</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-info border-opacity-10">
                                <span class="badge bg-info bg-opacity-10 text-info fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>6.1%
                                </span>
                                <span class="text-muted fs-7 ms-1">vs last month</span>
                            </div>
                        </div>
                        <div class="bg-info bg-opacity-10" style="height: 4px;">
                            <div class="bg-info" style="width: 50%; height: 100%;"></div>
                        </div>
                    </div>
                </div>

                <!-- Total Payments Card -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card border-0 rounded-3 shadow-sm h-100 overflow-hidden bg-warning bg-opacity-10">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center">
                                
                                <div>
                                    <h6 class="text-muted mb-1 fs-7">Total Payments</h6>
                                    <h4 class="mb-0 fw-bold">2.15M</h4>
                                </div>
                            </div>
                            <div class="mt-3 pt-2 border-top border-warning border-opacity-10">
                                <span class="badge bg-warning bg-opacity-10 text-warning fs-7">
                                    <i class="ti ti-arrow-up-right fs-5 me-1"></i>8.9%
                                </span>
                                <span class="text-muted fs-7 ms-1">vs last month</span>
                            </div>
                        </div>
                        <div class="bg-warning bg-opacity-10" style="height: 4px;">
                            <div class="bg-warning" style="width: 78%; height: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Row -->
            <div class="row g-3 mb-4">
                <!-- Monthly Property Sales Bar Chart -->
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

                <!-- Apartment Types Pie Chart -->
                <div class="col-lg-4">
                    <div class="card border-0 rounded-3 shadow-sm h-100">
                        <div class="card-header bg-success bg-opacity-10 py-3 border-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="fw-bold mb-0 text-success">Property Types</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container" style="position: relative; height: 300px;">
                                <canvas id="propertyTypeChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          <!-- Apartment Types with Images - Full Width Version -->
<div class="row g-3 mb-4">
    <div class="col-12">  <!-- Changed from col-lg-4 to col-12 -->
        <div class="card border-0 rounded-3 shadow-sm h-100">
            <div class="card-header bg-success bg-opacity-10 py-3 border-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold mb-0 text-success">Apartment Types</h5>
                </div>
            </div>
            <div class="card-body">
                <div class="row">  <!-- Added row to organize items in columns -->
                    <div class="col-md-3 col-6">  <!-- Each type takes 3 columns on medium screens, 6 on small -->
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/logos/im.jpg') }}" alt="Studio Apartment" class="rounded me-2" style="width: 130px; height: 130px;">
                            <div>
                                <h6 class="mb-1 fs-7">Studio</h6>
                                <small class="text-muted">Compact</small>
                                <div class="fw-bold text-primary">25%</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/logos/im1.jpg') }}" alt="1 Bedroom" class="rounded me-2" style="width: 130px; height: 130px;">
                            <div>
                                <h6 class="mb-1 fs-7">1-Bedroom</h6>
                                <small class="text-muted">Professionals</small>
                                <div class="fw-bold text-success">35%</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('images/logos/im2.jpg') }}" alt="2 Bedroom" class="rounded me-2" style="width: 130px; height: 130px;">
                            <div>
                                <h6 class="mb-1 fs-7">2-Bedroom</h6>
                                <small class="text-muted">Families</small>
                                <div class="fw-bold text-info">28%</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 col-6">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/logos/im3.jpg') }}" alt="Penthouse" class="rounded me-2" style="width: 130px; height: 130px;">
                            <div>
                                <h6 class="mb-1 fs-7">Penthouses</h6>
                                <small class="text-muted">Luxury</small>
                                <div class="fw-bold text-warning">12%</div>
                            </div>
                        </div>
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
                        </div>
                    </div>
                </div>
                
                <!-- Property Card 1 -->
                <div class="col-sm-6 col-xl-3">
                    <div class="card h-100 border-0 rounded-3 shadow-sm overflow-hidden property-card">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Skyline Echo" style="height: 180px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary">Featured</span>
                            </div>
                            <button class="btn btn-sm btn-light rounded-circle p-2 position-absolute top-0 end-0 m-3">
                                <i class="ti ti-heart text-primary fs-4"></i>
                            </button>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0 fs-6">Beverly Hills Lanka</h5>
                                <span class="text-primary fw-bold">Rs25,500</span>
                            </div>
                            <p class="text-muted fs-7 mb-3">
                                <i class="ti ti-map-pin text-primary fs-7 me-1"></i>
                               No. 12, Beverly Heights Road, Cinnamon Gardens, Colombo 7, Sri Lanka
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
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Prestige Pointe" style="height: 180px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-success">New</span>
                            </div>
                            <button class="btn btn-sm btn-light rounded-circle p-2 position-absolute top-0 end-0 m-3">
                                <i class="ti ti-heart text-success fs-4"></i>
                            </button>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0 fs-6">Red Cove Aprtments</h5>
                                <span class="text-success fw-bold">Rs 10,000</span>
                            </div>
                            <p class="text-muted fs-7 mb-3">
                                <i class="ti ti-map-pin text-success fs-7 me-1"></i>
                              No. 08, Sunset Bay Road, Red Cove Point, Hikkaduwa Beach, Galle, Sri Lanka
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
                            <img src="https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Nova Hills" style="height: 180px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-info">Popular</span>
                            </div>
                            <button class="btn btn-sm btn-light rounded-circle p-2 position-absolute top-0 end-0 m-3">
                                <i class="ti ti-heart text-info fs-4"></i>
                            </button>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0 fs-6">Palm Pearl Residencies</h5>
                                <span class="text-info fw-bold">RS 10,500</span>
                            </div>
                            <p class="text-muted fs-7 mb-3">
                                <i class="ti ti-map-pin text-info fs-7 me-1"></i>
                               No. 45, Pearl Road, Negombo Lagoon Front, Palm Gardens, Negombo, Sri Lanka
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
                            <img src="https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Urban Elegance" style="height: 180px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-warning">Deal</span>
                            </div>
                            <button class="btn btn-sm btn-light rounded-circle p-2 position-absolute top-0 end-0 m-3">
                                <i class="ti ti-heart text-warning fs-4"></i>
                            </button>
                        </div>
                        <div class="card-body p-3">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="fw-bold mb-0 fs-6">St. Crystal Lake View</h5>
                                <span class="text-warning fw-bold">Rs 20,000</span>
                            </div>
                            <p class="text-muted fs-7 mb-3">
                                <i class="ti ti-map-pin text-warning fs-7 me-1"></i>
                               No. 18, Crystal Lake Drive, North Bolgoda Lake, Moratuwa, Sri Lanka
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Sales Chart
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    new Chart(salesCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Property Sales',
                data: [12, 19, 15, 20, 18, 25, 22, 30, 28, 32, 35, 40],
                backgroundColor: 'rgba(13, 110, 253, 0.7)',
                borderColor: 'rgba(13, 110, 253, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Property Type Chart
    const typeCtx = document.getElementById('propertyTypeChart').getContext('2d');
    new Chart(typeCtx, {
        type: 'pie',
        data: {
            labels: ['Apartments', 'Service Usage', 'Availability by Floor', 'Monthly Rent Range'],
            datasets: [{
                data: [45, 25, 15, 15],
                backgroundColor: [
                    '#0d6efd',
                    '#198754',
                    '#fd7e14',
                    '#6f42c1'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
});
</script>
@endsection