<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIMPELAE</title>
</head>
<body>
    <h1>Hallo, {{ $messages['name'] }}</h1>
    <p>Pemberitahuan mengenai pengajuan surat keterangan desa yang perlu diverifikasi, dengan detail sebagai berikut:</p>
    <table border="0" cellpadding="10" cellspacing="5">
        <tr>
            <td>Diajukan Oleh</td>
            <td>:</td>
            <td>{{ $messages['applicant'] }}</td>
        </tr>
        <tr>
            <td>Ditujukan kepada</td>
            <td>:</td>
            <td>{{ $messages['for'] }}</td>
        </tr>
        <tr>
            <td>Jenis Keperluan</td>
            <td>:</td>
            <td>{{ $messages['type'] }}</td>
        </tr>
        <tr>
            <td>Diajukan pada tanggal</td>
            <td>:</td>
            <td>{{ $messages['created_at'] }}</td>
        </tr>
    </table>
    <p>Dengan adanya email ini diberitahuan bahwa pengajuan warga anda {{ $messages['status'] }}</p>
    <p>Untuk informasi selengkapnya, silahkan melakukan pengecekan pada website SIMPELAE pada menu verifikasi</p>
    <p>Terima kasih atas perhatianya, hormat kami pengurus desa Sawo Bringin</p>
    <p>Surabaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
</body>
</html>
