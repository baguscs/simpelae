<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <Link href="{{ route('dashboard') }}" class="app-brand-link">
            <x-application-logo></x-application-logo>
        </Link>

        <button as="button" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </button>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
    <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <Link as="button" href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Beranda</div>
            </Link>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text fw-bold" style="font-size: 14px">masyarakat</span>
        </li>

        <li class="menu-item {{ request()->routeIs('villager.index') ? 'active' : '' }}">
            <Link as="button" href="{{ route('villager.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-group"></i>
                <div>Warga</div>
            </Link>
        </li>

        <li class="menu-item {{ request()->routeIs('operator.index') ? 'active' : '' }}">
            <Link as="button" href="{{ route('operator.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-shield-quarter"></i>
                <div>Pengurus</div>
            </Link>
        </li>

        <li class="menu-header small text-uppercase"><span class="menu-header-text fw-bold" style="font-size: 14px">Pelayanan</span></li>

        <li class="menu-item ">
            <a href="S" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div>Pengajuan</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-list-check"></i>
                <div data-i18n="User interface">Validasi</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="ui-accordion.html" class="menu-link">
                        <div data-i18n="Accordion">Kelahiran</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="#" class="menu-link">
                        <div data-i18n="Badges">Kematian</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="#" class="menu-link">
                        <div data-i18n="Badges">Keterangan Miskin</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
