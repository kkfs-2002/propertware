
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
          <img src="{{ asset('images/logos/logo2.png') }}" alt="Company Logo" width="200">
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-6"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <!-- <span class="hide-menu">Home</span> -->
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link @if(Request::segment(2) == 'dashboard') active @else collapsed @endif" href=" {{url('user/dashboard') }} " aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
    
          

            <li class="sidebar-item">
  <a class="sidebar-link @if(Request::segment(2) == 'service_history' || Request::segment(2) == 'book_service') active @else collapsed @endif" href="{{url('user/service_history/list')}}">
    <div class="d-flex align-items-center gap-2">
      <span class="d-flex">
      <i class="ti ti-clipboard-list"></i>
                  </span>
                 <span class="hide-menu">Book A service</span>
    </div>
  </a>
</li>
            

          <li class="sidebar-item">
           <a class="sidebar-link @if(Request::segment(2) == 'maintenance_agreement') active @else collapsed @endif" href="{{ url('user/maintenance_agreement/list') }}">
           <div class="d-flex align-items-center gap-2">
                <span class="d-flex">
                <i class="fas fa-user-edit"></i>
                </span>
                <span class="hide-menu">Maintenance Agreement</span>
             </div>
            </a>
          </li>
          <li class="sidebar-item">
             <a class="sidebar-link @if(Request::segment(2) == '_profile') active @else collapsed @endif" href="{{ url('user/_profile/list') }}">
    <div class="d-flex align-items-center gap-2">
      <span class="d-flex">
        <i class="fas fa-user-edit"></i>
      </span>
      <span class="hide-menu">Edit Profile</span>
    </div>
  </a>
</li>

<li class="sidebar-item">
  <a class="sidebar-link justify-content-between" href="{{ url('logout') }}">
    <div class="d-flex align-items-center gap-2">
      <span class="d-flex">
      <i class="ti ti-logout"></i>
             </span>
            <span class="hide-menu">Logout</span>
    </div>
  </a>
</li>

       
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
   
