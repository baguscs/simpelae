<div class="row">
    <div class="col-6">
        <x-splade-input id="form-data" name="name" label="Nama Lengkap" placeholder="Masukkan Nama Lengkap" type="text" required />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="nik" label="NIK" placeholder="Masukkan NIK" type="number" required />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-input id="form-data" name="place_of_birth" label="Tempat Lahir" placeholder="Masukkan Tempat Lahir" type="text" required />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="date_of_birth" label="Tanggal Lahir" placeholder="Pilih Tanggal Lahir" required date />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-select id="form-data" name="gender" label="Jenis Kelamin" required>
            <option value="" selected disabled>Pilih Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </x-splade-select>
    </div>
    <div class="col-6">
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
    <div class="col-6">
        <x-splade-input id="form-data" name="address" label="Alamat Lengkap" placeholder="Masukkan Alamat Lengkap" type="text" required />
    </div>
    <div class="col-6">
        <x-splade-input id="form-data" name="nationaly" label="Kewarganegaraan" placeholder="Masukkan Kewarganegaraan" type="text" required />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-input id="form-data" name="job" label="Pekerjaan" placeholder="Masukkan Pekerjaan" type="text" required />
    </div>
    <div class="col-6">
        <x-splade-select id="form-data" name="marital_status" label="Status Pernikahan" required>
            <option value="" selected disabled>Pilih Status Pernikahan</option>
            <option value="Kawin">Kawin</option>
            <option value="Tidak Kawin">Tidak Kawin</option>
        </x-splade-select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-select id="form-data" name="type" label="Jenis Surat" required>
            <option value="" selected disabled>Pilih Jenis Tujuan</option>
            <option value="Akta Kelahiran">Akta Kelahiran</option>
            <option value="Akta Kematian">Akta Kematian</option>
            <option value="Keterangan Tidak Mampu">Keterangan Tidak Mampu</option>
        </x-splade-select>
    </div>
    <div class="col-6">
        <x-splade-textarea name="description" label="Keperluan" placeholder="Masukkan Keperluan" required autosize />
    </div>
</div>
<div class="row mt-3">
    <div class="col-6">
        <x-splade-file name="attachment" :show-filename="false" label="Dokumen Pendukung" />
    </div>
    <div class="col-6">
        <label for="">Petinjau Dokumen Pendukung</label>
        <img v-if="form.attachment" :src="form.$fileAsUrl('attachment')" />
    </div>
</div>
