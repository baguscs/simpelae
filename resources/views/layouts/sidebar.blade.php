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
        @if (Auth::user()->position == "Ketua RW" || Auth::user()->position == "Ketua RT")
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text fw-bold" style="font-size: 14px">masyarakat</span>
            </li>
        @endif

        @if (Auth::user()->position == "Ketua RW" || Auth::user()->position == "Ketua RT")
            <li class="menu-item {{ request()->routeIs('villager.index') ? 'active' : '' }}">
                <Link as="button" href="{{ route('villager.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-group"></i>
                    <div>Warga</div>
                </Link>
            </li>
        @endif

        @if (Auth::user()->position == "Ketua RW")
            <li class="menu-item {{ request()->routeIs('operator.index') ? 'active' : '' }}">
                <Link as="button" href="{{ route('operator.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-shield-quarter"></i>
                    <div>Pengurus</div>
                </Link>
            </li>
        @endif

        <li class="menu-header small text-uppercase"><span class="menu-header-text fw-bold" style="font-size: 14px">Pelayanan</span></li>

        <li class="menu-item {{ request()->routeIs('submission.*') ? 'active' : '' }}">
            <Link as="button" href="{{ route('submission.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div>Pengajuan</div>
            </Link>
        </li>

        @if (Auth::user()->position == "Ketua RW" || Auth::user()->position == "Ketua RT")
            <li class="menu-item {{ request()->routeIs('verification.*') ? 'active' : '' }}">
                <Link as="button" href="{{ route('verification.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-list-check"></i>
                    <div>Verifikasi</div>
                </Link>
            </li>

            <li class="menu-item {{ request()->routeIs('archive.*') ? 'active' : '' }}">
                <Link as="button" href="{{ route('archive.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-archive-in"></i>
                    <div>Arsip Pengajuan</div>
                </Link>
            </li>
        @endif
    </ul>
</aside>
