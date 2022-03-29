<!-- Topbar Start -->
<div class="navbar-custom">
    <ul class="list-unstyled topnav-menu float-right mb-0">

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="pro-user-name ml-1 text-capitalize">
                    {{ Auth::guard('admin')->user()->name }} <i class="mdi mdi-chevron-down"></i>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                <!-- item-->
                <div class="dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-user"></i>
                    <span>Profile</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <i class="fe-settings"></i>
                    <span>Settings</span>
                </a>

                <div class="dropdown-divider"></div>

                <!-- item-->
                <a class="dropdown-item notify-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fe-log-out"></i>
                    <span>Logout</span>
                </a>

                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>
        </li>
    </ul>

    <!-- LOGO -->
    <div class="logo-box">
        <a href="{{ route('admin.home') }}" class="logo logo-dark text-center">
            <span class="logo-lg">
                <img src="{{ ($sharedSetting->admin_logo) ? asset($sharedSetting->admin_logo) :  asset('backend/images/logo-dark.png') }}" alt="" height="16">
            </span>
            <span class="logo-sm">
                <img src="{{ ($sharedSetting->admin_logo) ? asset($sharedSetting->admin_logo) :  asset('backend/images/logo-dark.png') }}" alt="" height="24">
            </span>
        </a>
        <a href="{{ route('admin.home') }}" class="logo logo-light text-center">
            <span class="logo-lg">
                <img src="{{ asset('backend/images/png') }}" alt="" height="16">
            </span>
            <span class="logo-sm">
                <img src="{{ ($sharedSetting->admin_logo) ? asset($sharedSetting->admin_logo) :  asset('backend/images/logo-dark.png') }}" alt="" height="24">
            </span>
        </a>
    </div>

    <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
        <li>
            <button class="button-menu-mobile disable-btn waves-effect">
                <i class="fe-menu"></i>
            </button>
        </li>

        <li>
            <h4 class="page-title-main">Property Portal</h4>
        </li>
    </ul>

</div>
<!-- end Topbar -->
