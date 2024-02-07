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
        <p style="font-size: 25px">Arsip Data Pengajuan</p>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <x-splade-table :for="$archives">
                <x-splade-cell aksi as="$archives">
                    <Link href="#detail-data{{ $archives->hash }}" class="btn btn-info" id="btn-detail" style="margin-left: 10px">
                        <i class="bx bx-info-circle"></i> Detail
                    </Link>


                    <x-splade-modal name="detail-data{{ $archives->hash }}">
                        <p class="fs-3 fw-bold mb-4">Detail Data Warga</p>
                        @if ($archives->status == "Disetujui")
                            <a href="{{ route('submission.download', $archives->hash) }}" target="_blank" class="btn btn-success mb-4">
                                <i class="bx bx-download"></i> Download Surat
                            </a>
                        @endif
                        <x-splade-form :default="$archives">
                            <x-submissions.detail :file="$archives->attachment"></x-submissions.detail>
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

