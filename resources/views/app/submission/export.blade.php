<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
    {{-- <style>
        .text-content{
            font-size: 15px
        }
        /* Float four columns side by side */
        .column {
            float: left;
            width: %;
            padding: 0 10px;
        }

        /* Remove extra left and right margins, due to padding */
        .row {margin: 0 -5px;}

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        /* Style the counter cards */
        .card {
            padding: 16px;
            text-align: center;
        }

        .column-1{
            margin-left: 450px;
            /* margin-right: 200px */
        }
    </style> --}}
</head>
<body>
    <div class="row text-center mt-3 mb-3">
        <center>
            <h3 style="text-decoration: underline; font-weight: bold">SURAT PENGANTAR DESA</h3>
            <h3 style="margin-top: 10px">No. Surat : {{ $submission->letter_number }}</h3>
        </center>
    </div>
    <p class="text-content" style="margin-left: 20px">Yang bertanda tangan di bawah ini, menerangkan :</p>
    <table class="mt-2 mb-4 text-content" style="margin-left: 40px">
        <tr>
            <td>Nama Lengkap</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->name }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->address }}, {{ $submission->region_rt }}, RW : 02</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->job }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->gender }}</td>
        </tr>
        <tr>
            <td>Tempat/ tgl. lahir</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->place_of_birth }}, {{ \Carbon\Carbon::parse($submission->date_of_birth)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>Agama</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->religion }}</td>
        </tr>
        <tr>
            <td>Kawin / tidak kawin</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->marital_status }}</td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->nationaly }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->nik }}</td>
        </tr>
        <tr>
            <td>Tujuan</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->type }}</td>
        </tr>
        <tr>
            <td>Keperluan</td>
            <td class="ps-3">:</td>
            <td class="ps-2">{{ $submission->description }}</td>
        </tr>
    </table>
    <p class="text-content" style="margin-left: 20px">Demikian surat ini dibuat agar mendapat bantuan seperlunya</p>
    {{-- <div class="row">
        <div class="column column-1">
            <div class="card">
                <p>Tanda tangan</p>
                <p>Yang bersangkutan</p>
                <img src="{{ public_path('img/illustrations/file_not_found.png') }}" alt="" style="width: 150px">
                <p>Nama yang bersangkutan</p>
            </div>
        </div>

        <div class="column" style="margin-left:450px">
            <div class="card">
                <p>Surabaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                <p>Mengetahui:</p>
                <img src="{!! $qrcode !!}" alt="">
                {!! $qrcode !!}
                <img src="{{ public_path('img/illustrations/file_not_found.png') }}" alt="" style="width: 150px">
                <p>Pengurus Desa Sawo Bringin</p>
            </div>
        </div>
    </div> --}}
    <div style="float: right; margin-right: 50px">
        <center>
            <p style="margin-top: 20px">Surabaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
            <p style="margin-bottom: 20px">Mengetahui:</p>
            {{-- {!! QrCode::generate('Make me into a QrCode!'); !!} --}}
            {{-- {!! $qrcode !!} --}}
            <img src="data:image/png;base64, {!!  base64_encode($qrcode) !!}"/>
            <p style="margin-top: 20px">Pengurus Desa Sawo Bringin RW 02</p>
        </center>
    </div>

    <script>
        window.print()
    </script>
</body>
</html>
