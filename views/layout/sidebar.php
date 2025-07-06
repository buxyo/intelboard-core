<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="/dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <img src="/views/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/views/assets/images/logo-dark.png" alt="" height="17">
            </span>
        </a>
        <a href="/dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="/views/assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="/views/assets/images/logo-light.png" alt="" height="17">
            </span>
        </a>
    </div>
    <div id="scrollbar">
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span><?= Lang::get('sidebar.menu') ?></span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="/dashboard">
                    <i data-feather="home" class="icon-dual"></i>
                    <span><?= Lang::get('sidebar.dashboard') ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="/routes">
                    <i data-feather="map" class="icon-dual"></i>
                    <span><?= Lang::get('sidebar.routes') ?></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="/logout">
                    <i data-feather="log-out" class="icon-dual"></i>
                    <span><?= Lang::get('sidebar.logout') ?></span>
                </a>
            </li>
        </ul>
    </div>
</div>