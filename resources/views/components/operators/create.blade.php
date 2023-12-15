<div class="row">
    <div class="col-12">
        <x-splade-select name="villager_id" :options="$villagers" option-label="name" option-value="id" :choices="['searchEnabled' => true ]" label="Pilih Warga" placeholder="Pilih Nama Warga" required />
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <x-splade-select id="form-data" name="position" label="Pilih Jabatan" required>
            <option value="" selected disabled>Pilih Jabatan</option>
            <option value="Ketua RW">Ketua RW</option>
            <option value="Ketua RT">Ketua RT</option>
        </x-splade-select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
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
