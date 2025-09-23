<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Surat Izin</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .content {
            margin: 20px;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
        }

    </style>
</head>

<body>
    <div class="header">
        <h2>Surat Izin Siswa</h2>
        <p>Tanggal: {{ $izin->tanggal }}</p>
    </div>

    <div class="content">
        <h2>Surat Izin</h2>
        <p><strong>Nama Siswa:</strong> {{ $izin->user->nama }}</p>
        <p><strong>Kelas:</strong> {{ $izin->walikelas->kelas->nama_kelas ?? '-' }}</p>
        <p><strong>Wali Kelas:</strong> {{ $walikelas->nama_walikelas ?? '-' }}</p>
        <p><strong>Petugas:</strong> {{ $petugas->user->nama ?? '-' }}</p>
        <p><strong>Jenis Izin:</strong> {{ ucfirst($izin->jenis_izin) }}</p>
        <p><strong>Keterangan:</strong> {{ $izin->keterangan }}</p>
        <p><strong>Tanggal:</strong> {{ $izin->tanggal }}</p>

    </div>

    <div class="footer">
        <p>Mengetahui,</p>
        <p>___________________</p>
    </div>
</body>

</html>
