<section class="sidebar">
    <ul class="sidebar-menu">
        <li class="header">SideBar</li>
        <li>
            <a href="{{ url('/') }}">
                <i class="ion ion-ios-people"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if(Auth::user()->roles[0]->id == 1)
        <li class="header">User Role Management</li>
        <li>
            <a href="{{ url('/check-role') }}">
                <i class="ion ion-ios-people"></i>
                <span>Check Role</span>
            </a>
        </li>
        @endif
        <li class="header">User Management</li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-people"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('admin/users') }}"><i class="fa fa-circle-o"></i> All Users</a></li>
                <li><a href="{{ url('admin/users/admins') }}"><i class="fa fa-circle-o"></i> Admin Users</a></li>
                <li><a href="{{ url('admin/users/banned') }}"><i class="fa fa-circle-o"></i> Banned Users</a></li>
                <li><a href="{{ url('admin/users/create') }}"><i class="fa fa-circle-o"></i> Add New User</a></li>
            </ul>
        </li>
    </ul>
</section>