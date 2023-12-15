<div class="row">
    <div class="col-12">
        <x-splade-input id="form-data" name="villager.name" label="Nama Warga" type="text" readonly />
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <x-splade-select id="position" name="position" label="Pilih Jabatan" required>
            <option value="" selected disabled>Pilih Jabatan</option>
            <option value="Ketua RW">Ketua RW</option>
            <option value="Ketua RT">Ketua RT</option>
        </x-splade-select>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12" id="region" hidden>
        <x-splade-select name="region_rt" label="Wilayah RT">
            <option value="" selected disabled>Pilih Wilayah RT</option>
            <option value="RT 01">RT 01</option>
            <option value="RT 02">RT 02</option>
            <option value="RT 03">RT 03</option>
            <option value="RT 04">RT 04</option>
            <option value="RT 05">RT 05</option>
        </x-splade-select>
    </div>
</div>
<x-splade-script>
    const select = document.getElementById('position');
    var region = document.getElementById('region');

    console.log(select.value);

    select.addEventListener('change', function handleChange(event) {
        if(event.target.value == "Ketua RT"){
            region.removeAttribute('hidden');
        }
        else{
            region.setAttribute('hidden', true);
        }
    });

    if(select.value == 'Ketua RT'){
        region.removeAttribute('hidden');
    } else {
        region.setAttribute('hidden', true);
    }
</x-splade-script>
