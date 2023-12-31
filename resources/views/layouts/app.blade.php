<!-- Layout wrapper -->
<x-auth-session-status class="mb-4" />
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        {{-- menu --}}
        @include('layouts.sidebar')

        <div class="layout-page">
            {{-- navbar --}}
            @include('layouts.navbar')
            @php
            if (Auth::user()->position == "Ketua RW") {
                $needVerif = App\Models\Submission::query()->where('is_rw_approve', '0')->where('status', App\Models\Submission::STATUS_NEED_VERIF)->count();
            } else if(Auth::user()->position == "Ketua RT") {
                $needVerif = App\Models\Submission::query()->where('is_rt_approve', '0')->where('status', App\Models\Submission::STATUS_NEED_VERIF)->count();
            }
            $needRevision = App\Models\Submission::query()->where('villager_id', Auth::user()->villager_id)->where('status', App\Models\Submission::STATUS_NEED_REVISION)->count();

            @endphp

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
                       @if ($needVerif != 0)
                            <li class="list-group-item d-flex justify-content-between">
                                <i class='bx bx-badge-check me-2'></i>
                                Pengajuan Perlu di Validasi
                                <span class="badge bg-primary">
                                    @if (Auth::user()->position != 'Warga')
                                        {{ $needVerif }}
                                    @endif
                                </span>
                            </li>
                       @endif
                       @if ($needRevision != 0)
                            <li class="list-group-item d-flex justify-content-between">
                                <i class='bx bx-analyse me-2'></i>
                                Pengajuan Perlu di Revisi
                                <span class="badge bg-warning">
                                    {{ $needRevision }}
                                </span>
                            </li>
                       @endif
                    </ul>
                </div>
                @if (Auth::user()->position == "Warga")
                    @if ($needRevision == 0)
                        <h4 class="text-center">Tidak ada Notifikasi saat ini</h4>
                    @endif
                @else
                    @if ($needVerif == 0 && $needRevision == 0)
                        <h4 class="text-center">Tidak ada Notifikasi saat ini</h4>
                    @endif
                @endif
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
