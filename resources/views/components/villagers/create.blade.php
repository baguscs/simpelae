<div class="row">
    <div class="col-md-6">
        <x-splade-input id="form-data" name="name" label="Nama Lengkap" placeholder="Masukkan Nama Lengkap" type="text" required />
    </div>
    <div class="col-md-6">
        <x-splade-select id="form-data" name="region_rt" label="Wilayah RT" required>
            <option value="" selected disabled>Pilih Wilayah RT</option>
            <option value="RT 01">RT 01</option>
            <option value="RT 02">RT 02</option>
            <option value="RT 03">RT 03</option>
            <option value="RT 04">RT 04</option>
            <option value="RT 05">RT 05</option>
        </x-splade-select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <x-splade-input id="form-data" name="nik" label="NIK" placeholder="Masukkan NIK" type="number" required />
    </div>
    <div class="col-md-6">
        <x-splade-input id="form-data" name="number_kk" label="Nomor Kartu Keluarga" placeholder="Masukkan Nomor Kartu Keluarga" type="number" required />
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
        <x-splade-input id="form-data" placeholder="Masukkan nomor HP" name="phone_number" type="text" label="Nomor HP" required />
    </div>
    <div class="col-md-6">
        <x-splade-input id="form-data" placeholder="Masukkan Pekerjaan" name="job" label="Pekerjaan" type="text" required />
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <x-splade-input id="form-data" placeholder="Masukkan Email" name="email" label="E-Mail" type="email" required />
    </div>
</div>
