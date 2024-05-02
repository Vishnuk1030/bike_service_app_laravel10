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
        <li class="menu-item {{ Route::is('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">Dashboards</div>
            </a>
        </li>

        <!-- Layouts -->
        <li
            class="menu-item {{ Route::is('post.service', 'service.form', 'service.form', 'edit_ser') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Services</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('post.service', 'service.form') ? 'active' : '' }}">
                    <a href="{{ route('post.service') }}" class="menu-link">
                        <div data-i18n="Without menu">Post new services</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Front Pages -->
        <li
            class="menu-item {{ Route::is('view.booked.services', 'view.each.service', 'owner.booking.status') ? 'active' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-store"></i>
                <div data-i18n="Front Pages">Bookings</div>

            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ Route::is('view.booked.services', 'view.each.service') ? 'active' : '' }}">
                    <a href="{{ route('view.booked.services') }}" class="menu-link">
                        <div data-i18n="Landing">View Booking</div>
                    </a>
                </li>
                <li class="menu-item {{ Route::is('owner.booking.status') ? 'active' : '' }}">
                    <a href="{{ route('owner.booking.status') }}" class="menu-link">
                        <div data-i18n="Pricing">Booking Status</div>
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
            <a href="{{ route('owner.logout') }}" class="menu-link"
                onclick="return confirm('Are you sure want to Logout ?')">
                <i class="bx bx-power-off me-2"></i>
                <div data-i18n="logout" class="p-1">Logout</div>
                <div class="badge bg-label-primary fs-tiny rounded-pill ms-auto"></div>
            </a>
        </li>


    </ul>
</aside>
