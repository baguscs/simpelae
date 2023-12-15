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
        <p style="font-size: 25px">Data Pengurus</p>
        <Link href="#create-data" class="btn btn-success ml-3"><i class="bx bx-user-plus"></i> Tambah Pengurus</Link>

        <x-splade-modal name="create-data" max-width="xl">
            <p class="fs-3 fw-bold mb-4">Tambah Data Pengurus</p>
            <x-splade-form action="{{ route('operator.store') }}" method="POST" :default="$villagers">
                @csrf
                <x-operators.create :villagers="$villagers"></x-operators.create>

                <div class="mt-4">
                    <x-splade-submit class="btn btn-primary  w-30 float-end" :label="__('Simpan')" />
                    <Link class="btn btn-danger w-30 float-end mr-2" as="button" @click="modal.close">Batal</Link>
                </div>
            </x-splade-form>
        </x-splade-modal>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <x-splade-table :for="$operators">
                {{-- <x-splade-cell status_account as="$villagers">
                    @if ($villagers->status_account == 1)
                        Aktif
                    @else
                        Non-Aktif
                    @endif
                </x-splade-cell> --}}
                <x-splade-cell aksi as="$operators">
                    <Link href="#edit-data{{ $operators->hash }}" class="btn btn-primary btn-edit"> <i class="bx bx-edit-alt"></i> Edit</Link>

                    <x-splade-modal name="edit-data{{ $operators->hash }}" max-width="xl">
                        <p class="fs-3 fw-bold mb-4">Edit Data Warga</p>
                        <x-splade-form :default="$operators" action="{{ route('villager.update', $operators->hash) }}" method="PUT">
                            @csrf
                            <x-villagers.edit></x-villagers.edit>
                            <div class="mt-4">
                                <x-splade-submit class="btn btn-primary  w-30 float-end" :label="__('Simpan')" />
                                <Link class="btn btn-danger w-30 float-end mr-2" as="button" @click="modal.close">Batal</Link>
                            </div>
                        </x-splade-form>
                    </x-splade-modal>

                    <Link href="#detail-data{{ $operators->hash }}" class="btn btn-info" id="btn-detail" style="margin-left: 10px">
                        <i class="bx bx-info-circle"></i> Detail
                    </Link>


                    <x-splade-modal name="detail-data{{ $operators->hash }}">
                        <p class="fs-3 fw-bold mb-4">Detail Data Warga</p>
                        <x-splade-form :default="$operators">
                            <x-villagers.detail></x-villagers.detail>
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

