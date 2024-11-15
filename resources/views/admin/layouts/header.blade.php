 <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <!--<li class="nav-item">-->
            <!--  <a class="nav-link position-relative nav-icon-hover" href="javascript:void(0)">-->
            <!--    <i class="ti ti-bell-ringing"></i>-->
            <!--    <div class="popup-badge rounded-pill bg-danger text-white fs-2">{{$notificationCount}}</div>-->
            <!--  </a>-->
            <!--</li>-->
            <li class="nav-item dropdown">
                <a class="nav-link position-relative nav-icon-hover" href="javascript:void(0)" id="drop3" data-bs-toggle="dropdown"
                  aria-expanded="false">
                    <i class="ti ti-bell-ringing"></i>
                    <div class="popup-badge rounded-pill bg-danger text-white fs-2">{{$notificationCount}}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-start dropdown-menu-animate-up" aria-labelledby="drop3">
                  <div class="message-body">
                    <a href="{{route('admin.foods')}}" class="d-flex align-items-center gap-2 dropdown-item">
                      <p class="mb-0 fs-3">Food Orders</p>
                      <div class="popup-badge-notify rounded-pill bg-danger text-white fs-2">{{$orderNotificationCount}}</div>
                    </a>
                    
                    <a href="{{route('admin.properties')}}" class="d-flex align-items-center gap-2 dropdown-item">
                      <p class="mb-0 fs-3">Property Enquiries</p>
                      <div class="popup-badge-notify rounded-pill bg-danger text-white fs-2">{{$propertyNotificationCount}}</div>
                    </a>
                    
                    <a href="{{route('admin.assignments')}}" class="d-flex align-items-center gap-2 dropdown-item">
                      <p class="mb-0 fs-3">Assignment Enquiries</p>
                      <div class="popup-badge-notify rounded-pill bg-danger text-white fs-2">{{$assignmentNotificationCount}}</div>
                    </a>
                    
                    
                    <a href="{{route('admin.print_outs')}}" class="d-flex align-items-center gap-2 dropdown-item">
                      <p class="mb-0 fs-3">Printout Enquiries</p>
                      <div class="popup-badge-notify rounded-pill bg-danger text-white fs-2">{{$printOutNotificationCount}}</div>
                    </a>
                    
                  </div>
                </div>
              </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src=" /template-resources/admin/assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="{{route('admin.profile.edit')}}" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <!-- <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a> -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                    <a href="{{route('admin.logout')}}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="btn btn-outline-primary mx-3 mt-2 d-block"> {{ __('Log Out') }}</a>
                               </form>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->