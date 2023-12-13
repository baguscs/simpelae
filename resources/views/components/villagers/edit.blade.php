<div class="row">
    <div class="col-6">
        <x-splade-input id="form-data" name="name" label="Nama Lengkap" required />
    </div>
    <div class="col-6">
        <x-splade-select id="form-data" name="region_rt" label="Wilayah RT" required>
            <option value="RT 01">RT 01</option>
            <option value="RT 02">RT 02</option>
            <option value="RT 03">RT 03</option>
            <option value="RT 04">RT 04</option>
            <option value="RT 05">RT 05</option>
        </x-splade-select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-input id="form-data" name="nik" label="NIK" required />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="number_kk" label="Nomor Kartu Keluarga" required/>
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-input id="form-data" name="place_of_birth" label="Tempat Lahir" required />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="date_of_birth" label="Tanggal Lahir" date  required/>
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-select id="form-data" name="gender" label="Jenis Kelamin" required>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </x-splade-select>
    </div>
    <div class="col-6">
        <x-splade-select id="form-data" name="religion" label="Agama" required>
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
        <x-splade-input id="form-data" name="address" label="Alamat Lengkap" required />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="nationaly" label="Kewarganegaraan" required />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-input id="form-data" name="phone_number" label="Nomor HP" required />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="job" label="Pekerjaan" type="text" required />
    </div>
    <div class="col-12 mt-3">
        <x-splade-select id="form-data" name="status_account" label="Status Akun" required>
            <option value="1">Aktif</option>
            <option value="0">Non-aktif</option>
        </x-splade-select>
    </div>
</div>
