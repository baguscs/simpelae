<x-app-layout>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <Link href="{{ route('dashboard') }}">Beranda</Link>
            </li>
            <li class="breadcrumb-item">
                <Link href="{{ route('verification.index') }}">Lihat Verifikasi Pengajuan</Link>
            </li>
            <li class="breadcrumb-item active" style="font-size: 15px">{{ $pageTitle }}</li>
        </ol>
    </nav>
    <div class="mb-4 d-flex">
        <p style="font-size: 25px">Verifikasi Pengajuan {{ $submission->villager->name }}</p>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-12">
                        <p class="card-header m-0 me-2 pb-3 fw-bold" style="font-size: 20px">Berkas Pengajuan</p>
                        <x-splade-form :default="$submission" class="mb-5">
                            @csrf
                            <div class="row ps-4 pe-4 pt-2">
                                <div class="col-12">
                                    <x-splade-input type="text" name="villager.name" :label="__('Pengaju')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="name" :label="__('Kepada')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="nik" :label="__('NIK')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="place_of_birth" :label="__('Tempat Lahir')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="date_of_birth" :label="__('Tanggal Lahir')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="gender" :label="__('Jenis Kelamin')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="religion" :label="__('Agama')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="address" :label="__('Alamat Lengkap')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="nationaly" :label="__('Kewarganegaraan')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="marital_status" :label="__('Status Pernikahan')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="type" :label="__('Jenis Surat')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <x-splade-input type="text" name="description" :label="__('Keperluan')" readonly />
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="">Dokumen Pendukung</label>
                                    <Link href="#preview-attachment">
                                        @if ($submission->attachment == null)
                                            <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt="" style="width: 100px">
                                        @else
                                            <img src="{{ asset('storage/submission/'. $submission->attachment) }}" alt="" style="width: 100px">
                                        @endif
                                    </Link>

                                    <x-splade-modal name="preview-attachment">
                                        @if ($submission->attachment == null)
                                            <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt="">
                                        @else
                                            <img src="{{ asset('storage/submission/'. $submission->attachment) }}" alt="">
                                        @endif
                                    </x-splade-modal>
                                </div>
                            </div>
                        </x-splade-form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card" style="height: 350px">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <p class="m-0 mb-4 me-2 fw-bold" style="font-size: 20px">Formulir Verifikasi</p>
                    </div>
                </div>
                <div class="card-body">
                    <x-splade-form>
                        @csrf
                        <div class="col-12">
                            <x-splade-group name="tags" label="Apakah pengajuan {{ $submission->villager->name }} disetujui?" required>
                                <x-splade-checkbox name="tags" :show-errors="false" value="ya" label="Ya" />
                                <x-splade-checkbox name="tags" :show-errors="false" value="tidak" label="Tidak" />
                            </x-splade-group>
                        </div>
                        <div class="col-12 mt-3">
                            <x-splade-textarea name="biography" label="Komentar" placeholder="Masukkan Komentar" required autosize />
                        </div>
                        <div class="col-12 mt-4">
                            <x-splade-submit class="btn btn-primary" :label="__('Simpan')" />
                        </div>
                    </x-splade-form>
                </div>
            </div>
        </div>
    </div>

    @push('pageTitle')
        {{ $pageTitle }}
    @endpush

</x-app-layout>

