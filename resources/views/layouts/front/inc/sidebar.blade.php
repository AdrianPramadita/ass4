<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <img class="img-40 img-radius" src="{{asset('front/assets/images/avatar-4.jpg')}}" alt="User-Profile-Image">
                <div class="user-details">
                    <span>John Doe</span>
                    <span id="more-details">UX Designer<i class="ti-angle-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="#"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="{{ url('/logout') }}"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-search">
            <span class="searchbar-toggle">  </span>
            <div class="pcoded-search-box ">
                <input type="text" placeholder="Search">
                <span class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="active">
                <a href="{{ url('/dashboard') }}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

        </ul>

        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="{{ url('/admin') }}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>MA</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage Akun</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ url('/charts') }}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>C</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Charts</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ url('/income') }}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>I</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Income</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ url('/orderlist') }}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>I</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">List Order</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ url('/spending') }}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b></b>S</span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Spending</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li>
                <a href="{{ url('/financial') }}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FS</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Financial Statments</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>