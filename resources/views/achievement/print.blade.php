<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Prestasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header p {
            margin: 5px 0;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Laporan Prestasi Mahasiswa</h1>
        <p>Program Studi: {{ $studyProgram ?? 'Semua Program Studi' }}</p>
        <p>Tahun Mulai: {{ $startYear ?? 'Semua Tahun' }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Jenis Prestasi</th>
                <th>Tingkat Prestasi</th>
                <th>Capaian Prestasi</th>
                <th>Tanggal Kegiatan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($achievements as $key => $achievement)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $achievement->nim }}</td>
                    <td>{{ $achievement->name }}</td>
                    <td>{{ $achievement->study_program }}</td>
                    <td>{{ ucfirst($achievement->achievement_type) }}</td>
                    <td>{{ $achievement->achievement_level }}</td>
                    <td>{{ $achievement->achievement_title }}</td>
                    <td>
                        {{ \Carbon\Carbon::parse($achievement->start_date)->translatedFormat('d F Y') }} <br>
                        s/d <br>
                        {{ \Carbon\Carbon::parse($achievement->end_date)->translatedFormat('d F Y') }}
                    </td>
                    <td>{{ ucfirst($achievement->status) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data prestasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>
