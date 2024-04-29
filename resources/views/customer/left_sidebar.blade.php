<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('assets/img/bike_logo.jpg') }}" alt="logo" width="100px">
            </span>
            <span class="text-uppercase fw-bold fs-4 system font stack head">Bike Service App</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ Route::is('customer.dashboard') ? 'active' : '' }}">
            <a href="{{ route('customer.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item {{ Route::is('Available.services') ? 'active' : '' }}">
            <a href="{{ route('Available.services') }}" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Available Services</div>
            </a>

        </li>

        <!-- Front Pages -->
        <li class="menu-item {{ Route::is('booked.history', 'booked.status') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Front Pages">Services Booked</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('booked.history') ? 'active' : '' }}">
                    <a href="{{ route('booked.history') }}" class="menu-link">
                        <div data-i18n="Landing">History</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('booked.status') ? 'active' : '' }}">
                    <a href="{{ route('booked.status') }}" class="menu-link">
                        <div data-i18n="Pricing">Status</div>
                    </a>
                </li>

            </ul>
        </li>

        {{-- <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Apps &amp; Pages</span>
        </li> --}}
        <!-- Apps -->
        <li class="menu-item">
            <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/html/vertical-menu-template/app-email.html"
                target="_blank" class="menu-link">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Email">Email</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
            </a>
        </li>

        {{-- logout --}}
        <li class="menu-item">
            <a href="{{ route('customer.logout') }}" class="menu-link"
                onclick="return confirm('Are you sure want to Logout ?')">
                <i class="bx bx-power-off me-2"></i>
                <div data-i18n="logout" class="p-1">Logout</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
            </a>
        </li>


    </ul>
</aside>
