@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp
{{--@dd($prefix)--}}
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Sunny</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ $prefix == 'admin/users' ? 'active menu-open' : '' }}">
                <a href="#">
                    <i data-feather="user"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.users.view' ? 'active' : '' }}"><a href="{{ route('admin.users.view') }}"><i class="ti-list"></i>View User</a></li>
                    <li class="{{ $route == 'admin.users.add' ? 'active' : '' }}"><a href="{{ route('admin.users.add') }}"><i class="ti-plus"></i>Add User</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == 'admin/profiles' ? 'active menu-open' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Manage Profile</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.profiles.profile' ? 'active' : '' }}"><a href="{{ route('admin.profiles.profile') }}"><i class="ti-more"></i>Your Profile</a></li>
                    <li><a href="mailbox_compose.html"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == 'admin/setups' ? 'active menu-open' : '' }}">
                <a href="#">
                    <i data-feather="inbox"></i> <span>Setup Management</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ $route == 'admin.class.view' ? 'active' : '' }}"><a href="{{ route('admin.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
                    <li class="{{ $route == 'admin.years.view' ? 'active' : '' }}"><a href="{{ route('admin.years.view') }}"><i class="ti-more"></i>Student Year</a></li>
                    <li class="{{ $route == 'admin.groups.view' ? 'active' : '' }}"><a href="{{ route('admin.groups.view') }}"><i class="ti-more"></i>Student Groups</a></li>
                    <li class="{{ $route == 'admin.shifts.view' ? 'active' : '' }}"><a href="{{ route('admin.shifts.view') }}"><i class="ti-more"></i>Student Shift</a></li>
                    <li class="{{ $route == 'admin.fee.categories.view' ? 'active' : '' }}"><a href="{{ route('admin.fee.categories.view') }}"><i class="ti-more"></i>Fee Category</a></li>
                    <li class="{{ $route == 'admin.fee.amounts.view' ? 'active' : '' }}"><a href="{{ route('admin.fee.amounts.view') }}"><i class="ti-more"></i>Fee Category Amounts</a></li>
                    <li class="{{ $route == 'admin.exam.types.view' ? 'active' : '' }}"><a href="{{ route('admin.exam.types.view') }}"><i class="ti-more"></i>Exam Type</a></li>
                    <li class="{{ $route == 'admin.school.subjects.view' ? 'active' : '' }}"><a href="{{ route('admin.school.subjects.view') }}"><i class="ti-more"></i>School Subject</a></li>
                    <li class="{{ $route == 'admin.assign.subjects.view' ? 'active' : '' }}"><a href="{{ route('admin.assign.subjects.view') }}"><i class="ti-more"></i>Assign Subject</a></li>
                    <li class="{{ $route == 'admin.designations.view' ? 'active' : '' }}"><a href="{{ route('admin.designations.view') }}"><i class="ti-more"></i>Designation</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">EXTRA</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="layers"></i>
                    <span>Multilevel</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#">Level One</a></li>
                    <li class="treeview">
                        <a href="#">Level One
                            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#">Level Two</a></li>
                            <li class="treeview">
                                <a href="#">Level Two
                                    <span class="pull-right-container">
					  <i class="fa fa-angle-right pull-right"></i>
					</span>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="#">Level Three</a></li>
                                    <li><a href="#">Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Level One</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('logout') }}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
