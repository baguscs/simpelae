<!-- Layout wrapper -->
<x-auth-session-status class="mb-4" />
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        {{-- menu --}}
        @include('layouts.sidebar')

        <div class="layout-page">
            {{-- navbar --}}
            @include('layouts.navbar')

            {{-- notification --}}
            <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasBoth" aria-labelledby="offcanvasBothLabel">
                <div class="offcanvas-header">
                    <p id="offcanvasBothLabel" class="offcanvas-title fw-bold" style="font-size: 20px">
                        <i class='bx bxs-bell'></i>
                        Notifikasi
                    </p>
                    <button as="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <i class='bx bx-badge-check me-2'></i>
                            Pengajuan Perlu di Validasi
                            <span class="badge bg-primary">5</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <i class='bx bx-analyse me-2'></i>
                            Pengajuan Perlu di Review
                            <span class="badge bg-warning">5</span>
                        </li>
                    </ul>
                </div>
                <h4 class="text-center">Tidak ada Notifikasi saat ini</h4>
            </div>
            {{-- end notification --}}

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">

                    {{-- start content here --}}
                        {{ $slot }}
                    {{-- end content here --}}
                </div>
                <!-- / Content -->

                <!-- Footer -->
                @include('layouts.footer')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

      <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
