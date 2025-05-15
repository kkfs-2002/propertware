
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
              <a class="sidebar-link @if(Request::segment(2) == 'dashboard') active @else collapsed @endif" href=" {{url('vendor/dashboard') }} " aria-expanded="false">
                <i class="ti ti-atom"></i>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>


         
           <!----dashboard---->
           <ul class="sidebar">

      <li class="sidebar-item">
  <a class="sidebar-link has-arrow collapsed @if(Request::segment(2) == 'appointments' || Request::segment(2) == 'availability' || Request::segment(2) == 'booking_sync' || Request::segment(2) == 'notifications' || Request::segment(2) == 'service_slots' || Request::segment(2) == 'integrations') active @endif" 
     href="#calendarMenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="calendarMenu">
    <div class="d-flex align-items-center gap-2">
      <span class="d-flex">
        <i class="ti ti-calendar"></i>
      </span>
      <span class="hide-menu">My Calendar</span>
    </div>
  </a>

  <ul class="collapse" id="calendarMenu">
    <li class="sidebar-item">
      <a href="{{ url('vendor/appointments/list') }}" class="sidebar-link @if(Request::segment(2) == 'appointments') active @else collapsed @endif">
        <div class="d-flex align-items-center gap-2 ps-4">
          <i class="ti ti-circle"></i>
          <span class="hide-menu"> Manage Appointments</span>
        </div>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="{{ url('vendor/availability/list') }}" class="sidebar-link @if(Request::segment(2) == 'availability') active @else collapsed @endif">
        <div class="d-flex align-items-center gap-2 ps-4">
          <i class="ti ti-circle"></i>
          <span class="hide-menu">Set Availability</span>
        </div>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="{{ url('vendor/booking_sync/list') }}" class="sidebar-link @if(Request::segment(2) == 'booking_sync') active @else collapsed @endif">
        <div class="d-flex align-items-center gap-2 ps-4">
          <i class="ti ti-circle"></i>
          <span class="hide-menu">Automatic Booking </span>
        </div>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="{{ url('vendor/notifications/list') }}" class="sidebar-link @if(Request::segment(2) == 'notifications') active @else collapsed @endif">
        <div class="d-flex align-items-center gap-2 ps-4">
          <i class="ti ti-circle"></i>
          <span class="hide-menu">Notifications & Reminders</span>
        </div>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="{{ url('vendor/time_slots/list') }}" class="sidebar-link @if(Request::segment(2) == 'time_slots') active @else collapsed @endif">
        <div class="d-flex align-items-center gap-2 ps-4">
          <i class="ti ti-circle"></i>
          <span class="hide-menu">Service-Specific Time Slots</span>
        </div>
      </a>
    </li>

    <li class="sidebar-item">
      <a href="{{ url('vendor/integrations/list') }}" class="sidebar-link @if(Request::segment(2) == 'integrations') active @else collapsed @endif">
        <div class="d-flex align-items-center gap-2 ps-4">
          <i class="ti ti-circle"></i>
          <span class="hide-menu">Integration with Other Tools</span>
        </div>
      </a>
    </li>
  </ul>
</li>

 
  <li class="sidebar-item">
    <a class="sidebar-link justify-content-between" href="my-assignment.html">
      <div class="d-flex align-items-center gap-2">
        <span class="d-flex">
          <i class="fas fa-book"></i>
        </span>
        <span class="hide-menu">My Assignment</span>
      </div>
    </a>
  </li>


  <li class="sidebar-item">
    <a class="sidebar-link justify-content-between" href="edit-profile.html">
      <div class="d-flex align-items-center gap-2">
        <span class="d-flex">
          <i class="fas fa-user-cog"></i>
        </span>
        <span class="hide-menu">Edit Profile</span>
      </div>
    </a>
  </li>

  <li class="sidebar-item">
    <a class="sidebar-link justify-content-between"   href="{{ url('logout') }}">
      <div class="d-flex align-items-center gap-2">
        <span class="d-flex">
        <i class="ti ti-logout"></i>
            </span>
            <span class="hide-menu">Logout</span>
      </div>
    </a>
  </li>

          
 
        
  </ul>
      
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
   
