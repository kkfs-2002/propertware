<!-- Sidebar Start -->
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between py-2">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="{{ asset('images/logos/logo2.png') }}" alt="Company Logo" width="200">
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-6"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <style>
        :root {
          --sidebar-bg: #1e1e2d;
          --sidebar-active-bg: rgba(113, 106, 202, 0.2);
          --sidebar-hover-bg: rgba(135, 127, 247, 0.1);
          --sidebar-text: #a2a3b7;
          --sidebar-active-text: #aabefe;
          --sidebar-hover-text: #cdb4ee;
          --sidebar-icon: #5d5d6a;
          --sidebar-active-icon: #7d7dff;
          --sidebar-divider: rgba(255,255,255,0.05);
          --sidebar-transition: all 0.2s ease;
        }
        
        .left-sidebar {
          background: var(--sidebar-bg);
          width: 260px;
        }
        
        .sidebar-item .sidebar-link {
          transition: var(--sidebar-transition) !important;
          border-radius: 6px !important;
          margin: 2px 8px !important;
          padding: 8px 12px !important;
          color: var(--sidebar-text);
          font-size: 0.875rem;
        }
        
        .sidebar-item .sidebar-link i {
          color: var(--sidebar-icon);
          font-size: 1rem;
          margin-right: 10px;
          width: 20px;
          text-align: center;
        }
        
        .sidebar-item .sidebar-link:hover {
          background-color: var(--sidebar-hover-bg) !important;
        }
        
        .sidebar-item .sidebar-link:hover .hide-menu,
        .sidebar-item .sidebar-link:hover i {
          color: var(--sidebar-hover-text) !important;
        }
        
        .sidebar-item .sidebar-link.active {
          background-color: var(--sidebar-active-bg) !important;
        }
        
        .sidebar-item .sidebar-link.active .hide-menu {
          color: var(--sidebar-active-text) !important;
          font-weight: 500 !important;
        }
        
        .sidebar-item .sidebar-link.active i {
          color: var(--sidebar-active-icon);
        }
        
        .nav-small-cap {
          color: var(--sidebar-text);
          opacity: 0.6;
          font-size: 0.7rem;
          text-transform: uppercase;
          letter-spacing: 0.5px;
          padding: 8px 16px !important;
          margin-top: 4px;
        }
        
        .sidebar-link.has-arrow:after {
          border-color: var(--sidebar-text);
          right: 1.25rem;
          transition: var(--sidebar-transition);
          width: 5px;
          height: 5px;
          margin-top: -4px;
        }
        
        #categoryMenu .sidebar-item .sidebar-link {
          padding: 6px 12px 6px 32px !important;
        }
        
        #categoryMenu .sidebar-item .sidebar-link i.ti-circle {
          font-size: 0.5rem;
          margin-right: 12px;
        }
        
        .brand-logo {
          padding-left: 12px;
          padding-right: 12px;
          min-height: 64px;
          margin-top:30px;
        }
        
        .logo-img img {
          transition: all 0.3s ease;
        }
        
        .sidebar-nav {
          padding-top: 8px;
        }
      </style>
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <span class="hide-menu">Menu</span>
        </li>
        
        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'dashboard') active @endif" href="{{ url('user/dashboard') }}">
            <i class="ti ti-atom"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        
        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'service_history' || Request::segment(2) == 'book_service') active @endif" href="{{ url('user/service_history/list') }}">
            <i class="ti ti-clipboard-list"></i>
            <span class="hide-menu">Book A Service</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'maintenance_agreement') active @endif" href="{{ url('user/maintenance_agreement/list') }}">
            <i class="fas fa-user-edit"></i>
            <span class="hide-menu">Maintenance Agreement</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'comments') active @endif" href="{{ url('user/comments/index') }}">
            <i class="ti ti-message-dots"></i>
            <span class="hide-menu">Comments</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'payments') active @endif" href="{{ url('user/payments/list') }}">
            <i class="ti ti-credit-card"></i>
            <span class="hide-menu">Payments</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == '_profile') active @endif" href="{{ url('user/_profile/list') }}">
            <i class="fas fa-user-edit"></i>
            <span class="hide-menu">Edit Profile</span>
          </a>
        </li>
        
        <li class="nav-small-cap">
          <span class="hide-menu">Account</span>
        </li>
        
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ url('logout') }}">
            <i class="ti ti-logout"></i>
            <span class="hide-menu">Logout</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->