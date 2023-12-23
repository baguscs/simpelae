@props(['file'])
<div class="row">
    <div class="col-6">
        <x-splade-input id="form-data" name="name" label="Nama Lengkap" placeholder="Masukkan Nama Lengkap" type="text" readonly />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="nik" label="NIK" placeholder="Masukkan NIK" type="number" readonly />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-input id="form-data" name="place_of_birth" label="Tempat Lahir" placeholder="Masukkan Tempat Lahir" type="text" readonly />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="date_of_birth" label="Tanggal Lahir" placeholder="Pilih Tanggal Lahir" readonly />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-select id="form-data" name="gender" label="Jenis Kelamin" disabled>
            <option value="" selected disabled>Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </x-splade-select>
    </div>
    <div class="col-6">
        <x-splade-select id="form-data" name="religion" label="Agama" disabled>
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
    <div class="col-6">
        <x-splade-input id="form-data" name="address" label="Alamat Lengkap" placeholder="Masukkan Alamat Lengkap" type="text" readonly />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="nationaly" label="Kewarganegaraan" placeholder="Masukkan Kewarganegaraan" type="text" readonly />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-input id="form-data" name="job" label="Pekerjaan" placeholder="Masukkan Pekerjaan" type="text" readonly />
    </div>
    <div class="col-6">
        <x-splade-select id="form-data" name="marital_status" label="Status Pernikahan" disabled>
            <option value="" selected disabled>Pilih Status Pernikahan</option>
            <option value="Kawin">Kawin</option>
            <option value="Tidak Kawin">Tidak Kawin</option>
        </x-splade-select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-select id="form-data" name="type" label="Jenis Tujuan" disabled>
            <option value="" selected disabled>Pilih Jenis Keperluan</option>
            <option value="Akta Kelahiran">Akta Kelahiran</option>
            <option value="Akta Kematian">Akta Kematian</option>
            <option value="Keterangan Tidak Mampu">Keterangan Tidak Mampu</option>
        </x-splade-select>
    </div>
    <div class="col-6">
        <x-splade-textarea name="description" label="Keperluan" placeholder="Masukkan Keperluan" readonly autosize />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <label for="">Dokumen Pendukung</label>
        <Link href="#preview-attachment">
            @if ($file == null)
                <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt="" style="width: 50px">
            @else
                <img src="{{ asset('storage/submission/'. $file) }}" alt="" style="width: 50px">
            @endif
        </Link>

        <x-splade-modal name="preview-attachment">
            @if ($file == null)
                <img src="{{ asset('img/illustrations/file_not_found.png') }}" alt="" style="width: 50px">
            @else
                <img src="{{ asset('storage/submission/'. $file) }}" alt="">
            @endif
        </x-splade-modal>
    </div>
</div>
