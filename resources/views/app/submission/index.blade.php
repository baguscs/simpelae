<x-app-layout>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <Link href="{{ route('dashboard') }}">Beranda</Link>
            </li>
            <li class="breadcrumb-item active" style="font-size: 15px">{{ $pageTitle }}</li>
        </ol>
    </nav>
    <div class="mb-4 d-flex">
        <p style="font-size: 25px">Data Pengajuan</p>
        <Link href="{{ route('submission.create') }}" class="btn btn-success ml-3"><i class="bx bx-user-plus"></i> Tambah Pengajuan</Link>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <x-splade-table :for="$submission">
                <x-splade-cell approve_rw as="$submission">
                    @if ($submission->is_rw_approve == 1)
                        <span class="badge badge-center bg-success"><i class="bx bx-check"></i></span>
                    @else
                        <span class="badge badge-center bg-danger"><i class="bx bx-x"></i></span>
                    @endif
                </x-splade-cell>
                <x-splade-cell approve_rt as="$submission">
                    @if ($submission->is_rt_approve == 1)
                        <span class="badge badge-center bg-success"><i class="bx bx-check"></i></span>
                    @else
                        <span class="badge badge-center bg-danger"><i class="bx bx-x"></i></span>
                    @endif
                </x-splade-cell>
                <x-splade-cell status as="$submission">
                    @if ($submission->status == "Perlu di revisi")
                        <span class="badge bg-warning"><i class="bx bx-time"></i> Perlu di revisi</span>
                    @elseif($submission->status == "Disetujui")
                        <span class="badge bg-success"><i class="bx bx-check"></i> Disetujui</span>
                    @elseif($submission->status == "Ditolak")
                        <span class="badge bg-danger"><i class="bx bx-x"></i> Ditolak</span>
                    @else
                        <span class="badge bg-info"><i class="bx bx-mail-send"></i> Proses verifikasi</span>
                    @endif
                </x-splade-cell>
                <x-splade-cell aksi as="$submission">
                    @if ($submission->status == "Perlu di revisi")
                        <Link href="{{ route('submission.edit', $submission->hash) }}" class="btn btn-primary btn-edit">
                            <i class="bx bx-edit-alt"></i> Revisi
                        </Link>
                    @endif

                    <Link href="#detail-data{{ $submission->hash }}" class="btn btn-info" id="btn-detail" style="margin-left: 10px">
                        <i class="bx bx-info-circle"></i> Detail
                    </Link>


                    <x-splade-modal name="detail-data{{ $submission->hash }}">
                        <p class="fs-3 fw-bold mb-4">Detail Data Warga</p>
                        @if ($submission->status == "Disetujui")
                            <a href="{{ route('submission.download', $submission->hash) }}" target="_blank" class="btn btn-success mb-4">
                                <i class="bx bx-printer"></i> Cetak Surat
                            </a>
                        @endif
                        <x-splade-form :default="$submission">
                            <x-submissions.detail :file="$submission->attachment"></x-submissions.detail>
                        </x-splade-form>
                    </x-splade-modal>

                </x-splade-cell>
                <x-slot:empty-state>
                    <p class="text-center mt-3 mb-3"><i class="bx bx-low-vision"></i> Data tidak ditemukan!</p>
                </x-slot>
            </x-splade-table>
        </div>
    </div>

    @push('pageTitle')
        {{ $pageTitle }}
    @endpush

</x-app-layout>

