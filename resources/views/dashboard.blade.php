<x-app-layout>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item active" style="font-size: 15px">{{ $pageTitle }}</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-12">
                        <p class="card-header m-0 me-2 pb-3 fw-bold" style="font-size: 20px">Grafik Pengajuan Surat Pengantar Desa</p>
                        <center>
                            <div class="chart-container" style="position: relative; height:40vh; width:40vh; margin-bottom: 20px">
                                <canvas id="myChart"></canvas>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->

        <!-- Order Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <p class="m-0 mb-4 me-2 fw-bold" style="font-size: 20px">Total Pengajuan</p>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class='bx bx-face'></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kelahiran</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">1</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-warning"><i class="bx bx-flag"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Kematian</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">1</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Keterangan Miskin</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">1</small>
                                </div>
                            </div>
                        </li>
                        <p class="m-0 mb-4 me-2 fw-bold" style="font-size: 20px">Total Pengguna</p>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary">
                                    <i class='bx bx-user'></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Total Warga</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">1</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class='bx bx-user-check'></i>
                                </span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Warga Aktif</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">1</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Order Statistics -->
    </div>

    @push('pageTitle')
        {{ $pageTitle }}
    @endpush

    <x-splade-script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Kelahiran', 'Kematian', 'Keterangan Miskin'],
                option: {
                    responsive: true
                },
                datasets: [{
                    label: 'Jumlah Pengajuan',
                    data: [12, 19, 3],
                    backgroundColor: [
                        '#71DD37',
                        '#ffab00',
                        '#03c3ec'
                    ],
                    borderWidth: 1
                }]
            }
        });

    </x-splade-script>
</x-app-layout>
