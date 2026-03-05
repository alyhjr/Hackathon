<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registrasi Berhasil</title>
</head>
<body style="font-family: Arial, sans-serif;">
    <h2>Registrasi Berhasil ✅</h2>

    <p>Halo <b>{{ $calon->nama ?? 'Peserta' }}</b>,</p>

    <p>Registrasi awal kamu sudah kami terima.</p>

    <p><b>Data kamu:</b></p>
    <ul>
        <li>NUPTK: {{ $calon->nuptk }}</li>
        <li>Tanggal Lahir: {{ $calon->tanggal_lahir }}</li>
        <li>Email: {{ $calon->email }}</li>
        <li>No. Telp: {{ $calon->no_telp }}</li>
    </ul>

    <p>Status saat ini: <b>{{ $calon->status }}</b></p>

    <p>Silakan tunggu proses verifikasi dari panitia. Nanti kamu akan dapat notifikasi lagi.</p>

    <br>
    <p>Terima kasih 🙏</p>
</body>
</html>