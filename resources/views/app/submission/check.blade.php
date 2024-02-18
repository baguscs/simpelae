 <!-- Content -->
<x-auth-session-status class="mb-4" />
<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <x-auth-logo></x-auth-logo>
                    <!-- /Logo -->
                    <div class="text-welcome">
                        <h4 style="font-size: 20px" class="mb-2 text-body">Selamat Datang di SIMPELAE!</h4>
                        <p class="mb-4">Cek validasi Qrcode Surat Pengantar Desa</p>
                    </div>
                    <hr>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-6">
                            <p style="font-weight: bold">Status Surat</p>
                            <p style="">Terdaftar</p>
                        </div>
                        <div class="col-md-6">
                            <p style="font-weight: bold">Jenis Surat</p>
                            <p style="">{{ $submission->type }}</p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-6">
                            <p style="font-weight: bold">Nama Pengaju</p>
                            <p style="">{{ $submission->villager->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <p style="font-weight: bold">Kepada</p>
                            <p style="">{{ $submission->name }}</p>
                        </div>
                    </div>
                    <p style="font-weight: bold; margin-top: 30px">Info Penandatangan</p>
                    <hr>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-md-6">
                            <p style="font-weight: bold">Ketua RT</p>
                            <p style="">
                                @foreach ($rt as $item)
                                    {{ $item->villager->name }}
                                @endforeach
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p style="font-weight: bold">Ketua RW</p>
                            <p style="">
                                @foreach ($rw as $item)
                                    {{ $item->villager->name }}
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <p style="font-weight: bold; margin-top: 30px">Informasi Pengajuan</p>
                    <hr>
                    <div class="row" style="margin-top: 20px">
                        <p style="font-weight: bold">Tanggal Pengajuan</p>
                        <div class="col-md-6">
                            <p style=""> <i class="bx bx-calendar"></i>
                                {{ \Carbon\Carbon::parse($submission->created_at)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p style=""> <i class="bx bx-time"></i>
                                {{ \Carbon\Carbon::parse($submission->created_at)->translatedFormat('H:i:s') }}
                            </p>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <p style="font-weight: bold">Tanggal Penandatanganan</p>
                        <div class="col-md-6">
                            <p style=""> <i class="bx bx-calendar"></i>
                                {{ \Carbon\Carbon::parse($submission->updated_at)->translatedFormat('d F Y') }}
                            </p>
                        </div>
                        <div class="col-md-6">
                            <p style=""> <i class="bx bx-time"></i>
                                {{ \Carbon\Carbon::parse($submission->updated_at)->translatedFormat('H:i:s') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
