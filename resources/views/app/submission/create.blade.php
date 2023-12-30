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
        <p style="font-size: 25px">Tambah Data Pengajuan</p>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-12 p-4">
                        <x-splade-form action="{{ route('submission.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <x-splade-input id="name" name="name" label="Nama Lengkap" placeholder="Masukkan Nama Lengkap" type="text" required />
                                </div>
                                <div class="col-md-6">
                                    <x-splade-input id="nik" name="nik" label="NIK" placeholder="Masukkan NIK" type="number" required />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input id="form-data" name="place_of_birth" label="Tempat Lahir" placeholder="Masukkan Tempat Lahir" type="text" required />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input id="form-data" name="date_of_birth" label="Tanggal Lahir" placeholder="Pilih Tanggal Lahir" required date />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-select id="form-data" name="gender" label="Jenis Kelamin" required>
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </x-splade-select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-select id="form-data" name="religion" label="Agama" required>
                                        <option value="" selected disabled>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </x-splade-select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input id="form-data" name="address" label="Alamat Lengkap" placeholder="Masukkan Alamat Lengkap" type="text" required />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input id="form-data" name="nationaly" label="Kewarganegaraan" placeholder="Masukkan Kewarganegaraan" type="text" required />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-input id="form-data" name="job" label="Pekerjaan" placeholder="Masukkan Pekerjaan" type="text" required />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-select id="form-data" name="marital_status" label="Status Pernikahan" required>
                                        <option value="" selected disabled>Pilih Status Pernikahan</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Tidak Kawin">Tidak Kawin</option>
                                    </x-splade-select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-select id="form-data" name="type" label="Jenis Surat" required>
                                        <option value="" selected disabled>Pilih Jenis Tujuan</option>
                                        <option value="Akta Kelahiran">Akta Kelahiran</option>
                                        <option value="Akta Kematian">Akta Kematian</option>
                                        <option value="Keterangan Tidak Mampu">Keterangan Tidak Mampu</option>
                                    </x-splade-select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-textarea name="description" label="Keperluan" placeholder="Masukkan Keperluan" required autosize />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <x-splade-file name="attachment" :show-filename="false" label="Dokumen Pendukung" />
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Petinjau Dokumen Pendukung</label>
                                    <img v-if="form.attachment" :src="form.$fileAsUrl('attachment')" />
                                </div>
                                 {{-- <div class="col-md-6 mt-3">
                                    <label>Ubah Tanda Tangan:</label>
                                    <div class="wrapper">
                                        <canvas id="signature-pad" class="signature-pad" width=400 height=200 style="border: 1px solid; border-radius: 10px"></canvas>
                                    </div>
                                    <x-splade-textarea name="signature" v-model="test" id="signature" placeholder="Masukkan Keperluan" required autosize />
                                    <div class="hasil"></div>

                                    <input type="text" name="signature" id="signature">
                                    <button id="clear" type="button" style="background-color: red" class="btn btn-danger mt-3">Hapus</button>
                                </div> --}}
                            </div>
                            <div class="mt-4">
                                {{-- <button id="save" type="button" class="btn btn-primary w-30 float-end">Simpan</button> --}}
                                <x-splade-submit class="btn btn-primary  w-30 float-end" :label="__('Simpan')" />
                                <Link href="{{ route('submission.index') }}" class="btn btn-danger mr-2 w-30 float-end" style="height: 42px">Batal</Link>
                            </div>
                        </x-splade-form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('pageTitle')
        {{ $pageTitle }}
    @endpush

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script> --}}

    {{-- <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="_token"]').attr("content"),
                },
            });

            var canvas = document.getElementById("signature-pad");

            var signaturePad = new SignaturePad(canvas, {});

            var clearBtn = document.getElementById("clear");

            clearBtn.addEventListener("click", function () {
                signaturePad.clear();
            });

            var huhu = document.getElementById("hasil");
            var save = document.getElementById("save");

            save.addEventListener('click', function (event) {
                this.signature = signaturePad.toDataURL('image/png');
                $.ajax({
                    url: "{{ route('profile.updateSignature') }}",
                    method: 'PUT',
                    data: {
                        signature: signaturePad.toDataURL('image/png'),
                    },
                    success: function(result){
                        alert("Berhasil merubah tanda tangan");
                    }});
            });

        });
    </script> --}}

</x-app-layout>

