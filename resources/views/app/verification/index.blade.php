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
        <p style="font-size: 25px">Verifikasi Pengajuan</p>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <x-splade-table :for="$verification">
                <x-splade-cell aksi as="$verification">
                    <Link href="{{ route('verification.comment', $verification->hash) }}" class="btn btn-warning btn-edit">
                        <i class="bx bx-edit-alt"></i> Verifikasi
                    </Link>
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

