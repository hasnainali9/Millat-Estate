<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- User box -->
        <div class="user-box text-center">
            <img src="{{ ($sharedSetting->admin_logo !== null) ? asset($sharedSetting->admin_logo) :  '' }}" alt="admin logo" title="admin logo" class="rounded-circle img-thumbnail avatar-md">
            <p class="text-muted text-capitalize mt-1">{{ Auth::guard('admin')->user()->name }}</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{ route('admin.settings.edit', 1) }}" class="text-muted">
                        <i class="mdi mdi-cog"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li class="menu-title">Dashboard</li>

                <li>
                    <a href="{{ route('admin.home') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Blog </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.blog.category.index') }}">Categories</a></li>
                        <li><a href="{{ route('admin.blog.post.index') }}">Posts</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.page.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Pages </span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ route('admin.testimonial.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Testimonial </span>
                    </a>
                </li> --}}

                <li>
                    <a href="{{ route('admin.settings.edit', 1) }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Settings </span>
                    </a>
                </li>


                <li class="menu-title">Real Estate</li>

                <li>
                    <a href="javascript: void(0);">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Locations </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{ route('admin.locations.state.index') }}">State</a></li>
                        <li><a href="{{ route('admin.locations.city.index') }}">City</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.property.category.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Categories </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.property.project.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Projects </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.properties.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Properties </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.newsletter.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Newsletter </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.contact.index') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Contact </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.profile.edit', Auth::guard('admin')->id()) }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> Profile </span>
                    </a>
                </li>
            </ul>

        </div> <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div> <!-- Sidebar -left -->
</div> <!-- Left Sidebar End -->
