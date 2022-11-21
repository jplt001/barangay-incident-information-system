<ul class="nav pcoded-inner-navbar ">
    <li class="nav-item">
        <a href="{{ route('dashboard') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dasboard</span></a>
    </li>

    <li class="nav-item pcoded-menu-caption">
        <label>Content Management</label>
    </li>
    <li class="nav-item">
        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="fa fa-newspaper"></i></span><span class="pcoded-mtext">Bulletin Board</span></a>
    </li>
    <li class="nav-item">
        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="fa fa-bullhorn"></i></span><span class="pcoded-mtext">Announcements</span></a>
    </li>
    {{--  Incidents  --}}
    <li class="nav-item pcoded-menu-caption">
        <label>Incidents</label>
    </li>
    <li class="nav-item">
        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="fa fa-newspaper"></i></span><span class="pcoded-mtext">Incident Alerts</span></a>
    </li>
    <li class="nav-item">
        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="fa fa-map"></i></span><span class="pcoded-mtext">Incident Alerts Map</span></a>
    </li>

    {{--  Documentss  --}}
    <li class="nav-item pcoded-menu-caption">
        <label>Documents</label>
    </li>
    <li class="nav-item">
        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="fa fa-file"></i></span><span class="pcoded-mtext">Requests</span></a>
    </li>
    <li class="nav-item">
        <a href="index.html" class="nav-link "><span class="pcoded-micon"><i class="fa fa-file-code"></i></span><span class="pcoded-mtext">Document Templates</span></a>
    </li>

    {{--  Admin  --}}
    <li class="nav-item pcoded-menu-caption">
        <label>Admin</label>
    </li>
    <li class="nav-item">
        <a href="{{ route('users') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Users</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('residents') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Residents</span></a>
    </li>
    <li class="nav-item">
        <a href="{{ route('roles') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Roles</span></a>
    </li>
    {{--  <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-layout"></i></span><span class="pcoded-mtext">Documents</span></a>
        <ul class="pcoded-submenu">
            <li><a href="layout-vertical.html" target="_blank">Cu</a></li>
            <li><a href="layout-horizontal.html" target="_blank">Horizontal</a></li>
        </ul>
    </li>  --}}
    {{--  <li class="nav-item pcoded-menu-caption">
        <label>UI Element</label>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Basic</span></a>
        <ul class="pcoded-submenu">
            <li><a href="bc_alert.html">Alert</a></li>
            <li><a href="bc_button.html">Button</a></li>
            <li><a href="bc_badges.html">Badges</a></li>
            <li><a href="bc_breadcrumb-pagination.html">Breadcrumb & paggination</a></li>
            <li><a href="bc_card.html">Cards</a></li>
            <li><a href="bc_collapse.html">Collapse</a></li>
            <li><a href="bc_carousel.html">Carousel</a></li>
            <li><a href="bc_grid.html">Grid system</a></li>
            <li><a href="bc_progress.html">Progress</a></li>
            <li><a href="bc_modal.html">Modal</a></li>
            <li><a href="bc_spinner.html">Spinner</a></li>
            <li><a href="bc_tabs.html">Tabs & pills</a></li>
            <li><a href="bc_typography.html">Typography</a></li>
            <li><a href="bc_tooltip-popover.html">Tooltip & popovers</a></li>
            <li><a href="bc_toasts.html">Toasts</a></li>
            <li><a href="bc_extra.html">Other</a></li>
        </ul>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Forms &amp; table</label>
    </li>
    <li class="nav-item">
        <a href="form_elements.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">Forms</span></a>
    </li>
    <li class="nav-item">
        <a href="tbl_bootstrap.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-align-justify"></i></span><span class="pcoded-mtext">Bootstrap table</span></a>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Chart & Maps</label>
    </li>
    <li class="nav-item">
        <a href="chart-apex.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Chart</span></a>
    </li>
    <li class="nav-item">
        <a href="map-google.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-map"></i></span><span class="pcoded-mtext">Maps</span></a>
    </li>
    <li class="nav-item pcoded-menu-caption">
        <label>Pages</label>
    </li>
    <li class="nav-item pcoded-hasmenu">
        <a href="#!" class="nav-link "><span class="pcoded-micon"><i class="feather icon-lock"></i></span><span class="pcoded-mtext">Authentication</span></a>
        <ul class="pcoded-submenu">
            <li><a href="auth-signup.html" target="_blank">Sign up</a></li>
            <li><a href="auth-signin.html" target="_blank">Sign in</a></li>
        </ul>
    </li>
    <li class="nav-item"><a href="sample-page.html" class="nav-link "><span class="pcoded-micon"><i class="feather icon-sidebar"></i></span><span class="pcoded-mtext">Sample page</span></a></li>  --}}

</ul>