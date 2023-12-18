<x-app-layout>
    <style>
        .wrapper {
        position: relative;
        width: 400px;
        height: 200px;
        -moz-user-select: none;
        -webkit-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .signature-pad {
        position: absolute;
        left: 0;
        top: 0;
        width: 400px;
        height: 200px;
        background-color: white;
    }
    </style>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <Link href="{{ route('dashboard') }}">Beranda</Link>
            </li>
            <li class="breadcrumb-item active" style="font-size: 15px">{{ $pageTitle }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-xl-12">
            <div class="nav-align-top mb-4">
                <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home" aria-selected="true">
                            <i class="tf-icons bx bx-home"></i> Informasi Dasar
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-profile" aria-controls="navs-pills-justified-profile" aria-selected="false">
                            <i class="tf-icons bx bx-key"></i> Ubah Password
                        </button>
                    </li>
                    @if (Auth::user()->position != "Warga")
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-pills-justified-messages" aria-controls="navs-pills-justified-messages" aria-selected="false">
                                <i class="tf-icons bx bx-edit-alt"></i> Ubah Tanda Tangan
                            </button>
                        </li>
                    @endif
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                        <x-splade-form :default="$user" class="mb-3" action="{{ route('profile.updateEmail', $user->hash) }}" method="PUT">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <x-splade-input id="nik" type="number" name="villager.nik" :label="__('NIK')" readonly />
                                </div>
                                <div class="col-4">
                                    <x-splade-input id="number_kk" type="number" name="villager.number_kk" :label="__('Nomor Kartu Keluarga')" readonly />
                                </div>
                                <div class="col-4">
                                    <x-splade-input id="name" type="text" name="villager.name" :label="__('Nama Lengkap')" readonly />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <x-splade-input id="place_of_birth" type="text" name="villager.place_of_birth" :label="__('Tempat Lahir')" readonly />
                                </div>
                                <div class="col-4">
                                    <x-splade-input id="date_of_birth" type="text" name="villager.date_of_birth" :label="__('Tanggal Lahir')" readonly />
                                </div>
                                <div class="col-4">
                                    <x-splade-input id="gender" type="text" name="villager.gender" :label="__('Jenis Kelamin')" readonly />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <x-splade-input id="address" type="text" name="villager.address" :label="__('Alamat')" readonly />
                                </div>
                                <div class="col-4">
                                    <x-splade-input id="religion" type="text" name="villager.religion" :label="__('Agama')" readonly />
                                </div>
                                <div class="col-4">
                                    <x-splade-input id="job" type="text" name="villager.job" :label="__('Pekerjaan')" readonly />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-4">
                                    <x-splade-input id="phone_number" type="number" name="villager.phone_number" :label="__('Nomor Telepon')" readonly />
                                </div>
                                <div class="col-4">
                                    <x-splade-input id="region_rt" type="text" name="villager.region_rt" :label="__('Wilayah RT')" readonly />
                                </div>
                                <div class="col-4">
                                    <x-splade-input id="nationaly" type="text" name="villager.nationaly" :label="__('Kewarganegaraan')" readonly />
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-6">
                                    <label for="" class="block mb-1 text-gray-700 font-sans">Foto Kartu Keluarga</label>
                                    <Link href="#preview-attachment">
                                        <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt="" style="width: 50px">
                                    </Link>

                                    <x-splade-modal name="preview-attachment">
                                        <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt="">
                                    </x-splade-modal>
                                </div>
                                <div class="col-6">
                                    <x-splade-input id="email" type="email" name="email" :label="__('E-Mail')" :label="__('Email')" required />
                                </div>
                            </div>
                            <div class="mt-4">
                                <x-splade-submit class="btn btn-primary d-grid w-30 float-end" :label="__('Simpan')" />
                            </div>
                        </x-splade-form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                        <x-splade-form id="formAuthentication" class="mb-3" action="{{ route('profile.updatePassword', $user->hash) }}" method="PUT">
                            @csrf
                            <x-splade-input id="current_password" type="password" name="current_password" placeholder="Masukkan password saat ini" :label="__('Password')" required autofocus />
                            <x-splade-input class="mt-3" id="password" type="password" name="password" placeholder="Masukkan password baru" :label="__('Password Baru')" required autocomplete="current-password" />
                            <x-splade-input class="mt-3" id="password_confirmation" type="password" name="password_confirmation" placeholder="Masukkan konfirmasi password" :label="__('Konfirmasi Password')" required autocomplete="current-password" />
                            <div class="mt-4">
                                <x-splade-submit class="btn btn-primary d-grid w-30 float-end" :label="__('Simpan')" />
                            </div>
                        </x-splade-form>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                        <x-splade-form class="mb-3" action="{{ route('profile.updateSignature') }}" method="POST">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="" class="block mb-1 text-gray-700 font-sans">Tanda tangan saat ini</label>
                                    <Link href="#preview-signature">
                                        <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt="" style="width: 50px">
                                    </Link>

                                    <x-splade-modal name="preview-signature">
                                        <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt="">
                                    </x-splade-modal>
                                </div>
                                <div class="col-md-6">
                                    <label>Ubah Tanda Tangan:</label>
                                    <div class="wrapper">
                                        <canvas id="signature-pad" class="signature-pad" width=400 height=200 style="border: 1px solid; border-radius: 10px"></canvas>
                                        <x-splade-textarea name="signature" id="result" hidden />
                                    </div>
                                    <button type="button" style="background-color: red" class="btn btn-danger mt-3" id="clear">Hapus</button>
                                    <button type="button" style="background-color: green" class="btn btn-danger mt-3" id="save">Yakin</button>
                                </div>

                            </div>
                            <div class="mt-4">
                                <x-splade-submit class="btn btn-primary d-grid w-30 float-end" :label="__('Simpan')" />
                                {{-- <button type="button" class="btn btn-primary d-grid w-30 float-end" style="background-color: #696cff" id="save">Simpan</button> --}}
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

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous">
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>

      <script>
         $(function(){

               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

               var canvas = document.getElementById('signature-pad');

               var signaturePad = new SignaturePad(canvas, {
               });

               var saveButton = document.getElementById('save');
               var clearButton = document.getElementById('clear');


               saveButton.addEventListener('click', function () {
                    var result = document.getElementById('result').value = signaturePad.toDataURL('image/png');
               });

                clearButton.addEventListener('click', function () {
                  signaturePad.clear();
                  var result = document.getElementById('result').value = '';
                });

            });
      </script>

    {{-- <x-splade-script>
        var canvas = document.getElementById('signature-pad');

        var signaturePad = new SignaturePad(canvas, {
        });
        (function ($) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });



            var saveButton = document.getElementById('save');
            var clearButton = document.getElementById('clear');

            clearButton.addEventListener('click', function () {
                signaturePad.clear();
            });

            saveButton.addEventListener('click', function (event) {

            $.ajax({
                url: "{{ url('/profile/update-signature') }}",
                method: 'post',
                data: {
                    signature: signaturePad.toDataURL('image/png'),
                },
                success: function(result){
                    console.log("berhasil")
                }});
            });

        });


    </x-splade-script> --}}

</x-app-layout>

