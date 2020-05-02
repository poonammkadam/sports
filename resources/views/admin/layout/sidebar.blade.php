<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">

        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->


                <li class="nav-item">
                    <a href="{{url('admin/user')}}" class="nav-link">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>
                            User
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{url('admin/events')}}" class="nav-link">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <p>
                            Events
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/organisation')}}" class="nav-link">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>
                            Organisation
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{url('admin/setting')}}" class="nav-link">
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
