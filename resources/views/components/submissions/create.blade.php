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
<div class="row">
    <div class="col-md-6">
        <x-splade-input id="form-data" name="name" label="Nama Lengkap" placeholder="Masukkan Nama Lengkap" type="text" required />
    </div>
    <div class="col-md-6">
        <x-splade-input id="form-data" name="nik" label="NIK" placeholder="Masukkan NIK" type="number" required />
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <x-splade-input id="form-data" name="place_of_birth" label="Tempat Lahir" placeholder="Masukkan Tempat Lahir" type="text" required />
    </div>
    <div class="col-md-6">
        <x-splade-input id="form-data" name="date_of_birth" label="Tanggal Lahir" placeholder="Pilih Tanggal Lahir" required date />
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <x-splade-select id="form-data" name="gender" label="Jenis Kelamin" required>
            <option value="" selected disabled>Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </x-splade-select>
    </div>
    <div class="col-md-6">
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
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <x-splade-input id="form-data" name="address" label="Alamat Lengkap" placeholder="Masukkan Alamat Lengkap" type="text" required />
    </div>
    <div class="col-md-6">
        <x-splade-input id="form-data" name="nationaly" label="Kewarganegaraan" placeholder="Masukkan Kewarganegaraan" type="text" required />
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <x-splade-input id="form-data" name="job" label="Pekerjaan" placeholder="Masukkan Pekerjaan" type="text" required />
    </div>
    <div class="col-md-6">
        <x-splade-select id="form-data" name="marital_status" label="Status Pernikahan" required>
            <option value="" selected disabled>Pilih Status Pernikahan</option>
            <option value="Kawin">Kawin</option>
            <option value="Tidak Kawin">Tidak Kawin</option>
        </x-splade-select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <x-splade-select id="form-data" name="type" label="Jenis Surat" required>
            <option value="" selected disabled>Pilih Jenis Tujuan</option>
            <option value="Akta Kelahiran">Akta Kelahiran</option>
            <option value="Akta Kematian">Akta Kematian</option>
            <option value="Keterangan Tidak Mampu">Keterangan Tidak Mampu</option>
        </x-splade-select>
    </div>
    <div class="col-md-6">
        <x-splade-textarea name="description" label="Keperluan" placeholder="Masukkan Keperluan" required autosize />
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <x-splade-file name="attachment" :show-filename="false" label="Dokumen Pendukung" />
    </div>
    <div class="col-md-6">
        <label for="">Petinjau Dokumen Pendukung</label>
        <img v-if="form.attachment" :src="form.$fileAsUrl('attachment')" />
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label>Ubah Tanda Tangan:</label>
        <div class="wrapper">
            <canvas id="signature-pad" class="signature-pad" width=400 height=200 style="border: 1px solid; border-radius: 10px"></canvas>
            {{-- <x-splade-textarea name="signature" id="result" /> --}}
        </div>
        <button type="button" style="background-color: red" class="btn btn-danger mt-3" id="clear">Hapus</button>
        {{-- <button type="button" style="background-color: green" class="btn btn-success mt-3" id="save">Yakin</button> --}}
    </div>
</div>
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous">
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

            saveButton.addEventListener('click', function (event) {

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

            clearButton.addEventListener('click', function () {
                signaturePad.clear();
            });

        });
</script>

