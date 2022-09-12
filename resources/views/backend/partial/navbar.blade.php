<header class="header">
    <div class="page-brand">
        <a class="link" href="{{route('dashboard')}}">
            <span class="brand">E-Shop
            </span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>
        </ul>
        <!-- END TOP-LEFT TOOLBAR-->
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                <img src="{{asset('asset')}}/assets/img/passprt.jpg" style="height:30px; width:30px; border-radius:50%;" />
                    <span></span><i class="fa fa-angle-down m-l-5"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href=""><i class="fa fa-user"></i>Profile</a>
                    <a class="dropdown-item" href=""><i class="fa fa-key"></i>Change Password</a>
                    <li class="dropdown-divider"></li>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-power-off"></i>Logout</a>
                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>