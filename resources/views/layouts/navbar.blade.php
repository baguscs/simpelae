{{-- <x-splade-toogle> --}}
    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class=" me-3 me-xl-0 d-xl-none">

            <div class="btn-group" id="dropdown-icon-demo">
                <button class="btn btn-primary dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-menu"></i>
                </button>
                <ul class="dropdown-menu">
                    <Link href="{{ route('dashboard') }}" class="app-brand-link ml-5 mt-3">
                        <x-application-logo></x-application-logo>
                    </Link>
                    <li class="ml-5 mt-3 {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <Link as="button" href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i> Beranda
                        </Link>
                    </li>
                    <li class="menu-header small text-uppercase mt-3">
                        <span class="menu-header-text fw-bold ml-5" style="font-size: 12px">masyarakat</span>
                    </li>
                    <li class="ml-5 mt-3 {{ request()->routeIs('villager.index') ? 'active' : '' }}">
                        <Link as="button" href="{{ route('villager.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group"></i> Warga
                        </Link>
                    </li>
                    <li class="ml-5 mt-3 {{ request()->routeIs('operator.index') ? 'active' : '' }}">
                        <Link as="button" href="{{ route('operator.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-shield-quarter"></i>
                            <div>Pengurus</div>
                        </Link>
                    </li>
                    <li class="menu-header small text-uppercase mt-3">
                        <span class="menu-header-text fw-bold ml-5" style="font-size: 12px">pelayanan</span>
                    </li>
                    <li class="menu-item ml-5 mt-3">
                        <a href="S" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-box"></i>
                            <div>Pengajuan</div>
                        </a>
                    </li>
                    <li class="menu-item ml-5 mt-3">
                        <a href="S" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-list-check"></i>
                            <div>Validasi Pengajuan</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>


        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

            <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                    <p class="fw-bold" style="font-size: 20px" >@stack('pageTitle')</p>
                </div>
            </div>

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item">
                    <button class="btn btn-primary rounded-pill btn-icon mt-1" as="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBoth" aria-controls="offcanvasBoth">
                        <i class='bx bxs-bell bx-tada'></i>
                    </button>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ 'https://ui-avatars.com/api/?name=' . auth()->user()->villager->name }}" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ 'https://ui-avatars.com/api/?name=' . auth()->user()->villager->name }}" alt class="w-px-40 h-auto rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{ Auth::user()->villager->name }}</span>
                                        <small class="text-muted">{{ Auth::user()->position }}</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <Link class="dropdown-item" href="{{ route('profile.index', Auth::user()->hash) }}">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">Profil Akun</span>
                            </Link>
                        </li>
                        <li>
                            <a class="dropdown-item" href="">
                                <i class="bx bx-cog me-2"></i>
                                <span class="align-middle">Ganti Password</span>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link as="a" class="dropdown-item" :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Log Out</span>
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>
    </nav>
{{-- </x-splade-toogle> --}}
