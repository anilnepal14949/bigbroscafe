<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon mr-1">
            <img src="{{ asset('logoico.png') }}" width="50"> BigBro's
        </div>
        <div class="sidebar-brand-text"> Admin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if($activeMenu == 'home') active @endif">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Admin
    </div>
    <li class="nav-item @if($activeMenu == 'menu') active @endif">
        <a class="nav-link @if($activeMenu != 'menu') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseMenu" aria-expanded="true" aria-controls="collapseMenu">
            <i class="far fa-fw fa-building"></i>
            <span>Menu</span>
        </a>
        <div id="collapseMenu" class="collapse @if($activeMenu == 'menu') show @endif" aria-labelledby="headingMenu" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Menu</h6>
                <router-link to="/menu" class="collapse-item @if($activeSubMenu == 'create-menu') active @endif">Create Menu</router-link>
                <a class="collapse-item @if($activeSubMenu == 'all-menu') active @endif" href="#">All Menus</a>
            </div>
        </div>
    </li>
    <li class="nav-item @if($activeMenu == 'user') active @endif">
        <a class="nav-link @if($activeMenu != 'user') collapsed @endif" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseProduct">
            <i class="far fa-fw fa-user"></i>
            <span>User</span>
        </a>
        <div id="collapseUser" class="collapse @if($activeMenu == 'user') show @endif" aria-labelledby="headingUser" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User</h6>
                <a class="collapse-item @if($activeSubMenu == 'all-users') active @endif" href="{{ route('users.index') }}">All Users</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt" aria-hidden="true"></i>
            <span><strong>Logout</strong></span></a>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
    <!-- <div class="copyright text-center my-auto">
        <span>copyright &copy; <script>
                document.write(new Date().getFullYear());
            </script> - developed by
            <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
        </span>
    </div> -->
</ul>
<!-- Sidebar -->
