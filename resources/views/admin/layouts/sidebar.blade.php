<!-- Sidebar Start -->
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div>
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="./index.html" class="text-nowrap logo-img">
        <img src=" /template-resources/admin/assets/images/logos/dark-logo.svg" width="180" alt="" />
      </a>
      <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
        <i class="ti ti-x fs-8"></i>
      </div>
    </div>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
      <ul id="sidebarnav">
        <!-- <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li> -->
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.settings') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Settings</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.sliders') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Sliders</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.foods') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Food</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.properties') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Property</span>
          </a>
        </li>


        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.furniture') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Furniture</span>
          </a>
        </li>


        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.bikes') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Bike</span>
          </a>
        </li>


        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.printouts') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Print Out</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.assignments') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Assignment</span>
          </a>
        </li>


        <!-- <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.categories') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Categories</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.services') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Services</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.industries') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Industries</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.brands') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Brands</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.products') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Products</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.pages') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Pages</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.enquiries') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Enquiries</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.clients') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Clients</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.testimonials') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Testimonials</span>
          </a>
        </li>


        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.subscribers') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Subscribers</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.blog-categories') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Blog Categories</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="{{ route('admin.blogs') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Blogs</span>
          </a>
        </li> -->

        <!-- <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('admin.catalogs') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Catalogs</span>
              </a>
            </li> -->


      </ul>

      <!-- <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">Upgrade to pro</h6>
                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src=" /template-resources/admin/assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div> -->
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->