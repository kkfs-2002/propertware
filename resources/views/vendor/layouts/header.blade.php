<!--  Header Start -->
<header class="app-header" style="background-color: #1e1e2d;">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-bell"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <!--<a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/?ref=56" target="_blank"
            class="btn btn-primary">Check Pro Template</a>-->

              <li class="nav-item dropdown">
              <a class="nav-link " href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{ asset('images/profile/vendor.png') }}" alt="" width="50" height="50" class="rounded-circle">
                  <h6 >Vendor</h6>
                </a>
 <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminDropdown">
    
    <li><hr class="dropdown-divider"></li>
    <li>
      <a href="{{ url('logout') }}" class="dropdown-item text-danger">
        <i class="ti ti-logout me-2"></i> Logout
      </a>
    </li>
  </ul>
</li>
</ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->