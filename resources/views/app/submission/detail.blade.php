<x-app-layout>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <Link href="{{ route('dashboard') }}">Beranda</Link>
            </li>
            <li class="breadcrumb-item">
                <Link href="{{ route('submission.index') }}">Lihat Pengajuan</Link>
            </li>
            <li class="breadcrumb-item active" style="font-size: 15px">{{ $pageTitle }}</li>
        </ol>
    </nav>
    <div class="mb-4 d-flex">
        <p style="font-size: 25px">Detail Pengajuan</p>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-header m-0 me-2 pb-3 fw-bold" style="font-size: 20px">Berkas Pengajuan
                                </p>
                            </div>
                            <div class="col-md-6">
                                @if ($submission->status == 'Disetujui')
                                    <a href="{{ route('submission.download', $submission->hash) }}" target="_blank"
                                        class="btn btn-success mt-4 mr-5 float-end">
                                        <i class="bx bx-printer"></i> Cetak Surat
                                    </a>
                                @endif
                            </div>
                        </div>
                        <x-splade-form :default="$submission" class="mb-3"
                            action="{{ route('submission.update', $submission->hash) }}" method="PUT">
                            @csrf
                            @method('PUT')
                            <div class="row ps-4 pe-4 pt-2">
                                <div class="col-md-12">
                                    <x-splade-input type="text" name="villager.name" :label="__('Pengaju')" readonly />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input type="text" name="name" :label="__('Kepada')" readonly />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input type="text" name="nik" :label="__('NIK')" readonly />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input type="text" name="place_of_birth" :label="__('Tempat Lahir')" readonly />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input type="text" name="date_of_birth" :label="__('Tanggal Lahir')" readonly />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-select id="form-data" name="gender" label="Jenis Kelamin" disabled>
                                        <option value="" disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </x-splade-select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-select id="form-data" name="religion" label="Agama" disabled>
                                        <option value="" disabled>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </x-splade-select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input type="text" name="address" :label="__('Alamat Lengkap')" readonly />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input type="text" name="nationaly" :label="__('Kewarganegaraan')" readonly />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input type="text" name="job" :label="__('Pekerjaan')" readonly />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-select id="form-data" name="marital_status" label="Status Pernikahan"
                                        disabled>
                                        <option value="" disabled>Pilih Status Pernikahan</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Tidak Kawin">Tidak Kawin</option>
                                    </x-splade-select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-select id="form-data" name="type" label="Jenis Surat" disabled>
                                        <option value="" disabled>Pilih Jenis Tujuan</option>
                                        <option value="Akta Kelahiran">Akta Kelahiran</option>
                                        <option value="Akta Kematian">Akta Kematian</option>
                                        <option value="Keterangan Tidak Mampu">Keterangan Tidak Mampu</option>
                                    </x-splade-select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-textarea type="text" name="description" :label="__('Keperluan')" autosize
                                        readonly />
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Dokumen Pendukung Saat Ini</label>
                                    <Link href="#preview-attachment">
                                    @if ($submission->attachment == null)
                                        <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt=""
                                            style="width: 100px">
                                    @else
                                        <img src="{{ asset('storage/submission/' . $submission->attachment) }}"
                                            alt="" style="width: 100px">
                                    @endif
                                    </Link>

                                    <x-splade-modal name="preview-attachment">
                                        @if ($submission->attachment == null)
                                            <img src="{{ asset('img/illustrations/file_not_found.png') }}"
                                                alt="">
                                        @else
                                            <img src="{{ asset('storage/submission/' . $submission->attachment) }}"
                                                alt="">
                                        @endif
                                    </x-splade-modal>
                                </div>
                                <div class="col-md-12">
                                    <Link href="{{ route('submission.index') }}"
                                        class="btn btn-danger mr-2 w-30 float-end" style="height: 42px">Kembali</Link>
                                </div>
                            </div>
                        </x-splade-form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-auto">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <p class="m-0 mb-4 me-2 fw-bold" style="font-size: 20px">Catatan Verifikasi</p>
                    </div>
                </div>
                <div class="card-body">
                    @foreach ($verification as $note)
                        <div class="list-group mb-2 mt-2">
                            <Link as="button"
                                class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <div>
                                    <h6>{{ $note->operator->villager->name }}</h6>
                                    <small class="pt-2">{{ $note->operator->position }}</small>
                                    <hr>
                                </div>
                                <small>{{ $note->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="mb-1 mt-2">{{ $note->description }}</p>
                            </Link>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    @push('pageTitle')
        {{ $pageTitle }}
    @endpush

</x-app-layout>
