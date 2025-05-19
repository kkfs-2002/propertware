<!-- Sidebar Start -->
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src="{{ asset('images/logos/logo2_.png') }}" alt="Company Logo" width="200">
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-6"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <style>
        .sidebar-item .sidebar-link {
          transition: all 0.3s ease !important;
          border-radius: 8px !important;
          margin: 2px 8px !important;
        }
        .sidebar-item .sidebar-link:hover {
          background-color: rgba(135, 127, 247, 0.1) !important;
        }
        .sidebar-item .sidebar-link.active {
          background-color: rgba(113, 106, 202, 0.2) !important;
          font-weight: 500 !important;
        }
        .sidebar-item .sidebar-link.active .hide-menu {
          color:rgb(170, 190, 254) !important;
          font-weight: 800 !important;
        }
        .sidebar-item .sidebar-link:hover .hide-menu,
        .sidebar-item .sidebar-link:hover i {
          color:rgb(205, 180, 238) !important;
        }
        #sidebarnav .sidebar-item .sidebar-link.collapsed:not(.active):hover {
          background-color: rgba(147, 141, 229, 0.1) !important;
        }
        .collapse .sidebar-item .sidebar-link {
          padding-left: 15px !important;
        }
      </style>
      <ul id="sidebarnav">
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'dashboard') active @else collapsed @endif" href="{{ url('admin/dashboard') }}" aria-expanded="false">
            <i class="ti ti-atom"></i>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>
        
        <li class="sidebar-item">
          <a class="sidebar-link  @if(Request::segment(2) == 'vendor') active @else collapsed @endif" href="{{ url('admin/vendor/list') }}" aria-expanded="false">
            <div class="d-flex align-items-center gap-2">
              <span class="d-flex">
                <i class="ti ti-list"></i>
              </span>
              <span class="hide-menu">Vendor List</span>
            </div>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'user')  @else collapsed @endif"   href="{{ url('admin/user/list') }}" aria-expanded="false">
            <div class="d-flex align-items-center gap-2">
              <span class="d-flex">
                <i class="ti ti-users"></i>
              </span>
              <span class="hide-menu">User List</span>
            </div>
          </a>
        </li>
        
        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'service_type') active @endif" href="{{ url('admin/service_type/list') }}" aria-expanded="false">
            <div class="d-flex align-items-center gap-2">
              <span class="d-flex">
                <i class="ti ti-briefcase"></i>
              </span>
              <span class="hide-menu">Service Type</span>
            </div>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link  @if(Request::segment(2) == 'Vendor_type') active @endif"  href="{{ url('admin/Vendor_type/list') }}" aria-expanded="false">
            <div class="d-flex align-items-center gap-2">
              <span class="d-flex">
                <i class="ti ti-building-store"></i>
              </span>
              <span class="hide-menu">Vendor Type</span>
            </div>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link has-arrow collapsed @if(Request::segment(2) == 'category' || Request::segment(2) == 'sub_category') active @endif" href="#categoryMenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="categoryMenu">
            <div class="d-flex align-items-center gap-2">
              <span class="d-flex">
                <i class="ti ti-tag"></i>
              </span>
              <span class="hide-menu">Categories</span>
            </div>
          </a>

          <ul class="collapse" id="categoryMenu">
            <li class="sidebar-item">
              <a href="{{ url('admin/category/list') }}" class="sidebar-link @if(Request::segment(2) == 'category') active @else collapsed @endif">
                <div class="d-flex align-items-center gap-2 ps-4">
                  <i class="ti ti-circle"></i>
                  <span class="hide-menu">Category List</span>
                </div>
              </a>
            </li>

            <li class="sidebar-item">
              <a href="{{ url('admin/sub_category/list') }}" class="sidebar-link @if(Request::segment(2) == 'sub_category') active @else collapsed @endif">
                <div class="d-flex align-items-center gap-2 ps-4">
                  <i class="ti ti-circle"></i>
                  <span class="hide-menu">Subcategory List</span>
                </div>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="sidebar-item">
          <a class="sidebar-link justify-content-between @if(Request::segment(2) == 'amc') active @else collapsed @endif" href="{{ url('admin/amc/list') }}">
            <div class="d-flex align-items-center gap-2">
              <span class="d-flex">
                <i class="ti ti-clipboard-list"></i>
              </span>
              <span class="hide-menu">AMC List</span>
            </div>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link @if(Request::segment(2) == 'profile') active @else collapsed @endif" href="{{ url('admin/profile/list') }}">
            <div class="d-flex align-items-center gap-2">
              <span class="d-flex">
                <i class="fas fa-user-cog"></i>
              </span>
              <span class="hide-menu">Profile Update</span>
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
      </ul>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          // Keep submenu open when a subcategory is active
          const categoryMenu = document.getElementById('categoryMenu');
          const activeSubItems = document.querySelectorAll('#categoryMenu .sidebar-link.active');
          
          if (activeSubItems.length > 0) {
            // Show the collapse menu if any subitem is active
            const bsCollapse = new bootstrap.Collapse(categoryMenu, {
              toggle: false
            });
            bsCollapse.show();
            
            // Add 'active' class to parent item
            const parentItem = document.querySelector('.sidebar-link[href="#categoryMenu"]');
            if (parentItem) {
              parentItem.classList.add('active');
              parentItem.setAttribute('aria-expanded', 'true');
              parentItem.classList.remove('collapsed');
            }
          }

          // Prevent collapse when clicking on active submenu items
          document.querySelectorAll('#categoryMenu .sidebar-link').forEach(item => {
            item.addEventListener('click', function(e) {
              if (this.classList.contains('active')) {
                e.stopPropagation();
              }
            });
          });
        });
      </script>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->