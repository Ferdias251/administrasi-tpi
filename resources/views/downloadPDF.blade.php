<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Laporan Pencatatan</h1>
    <table>
        <thead>
            <tr>
                <th>Nama Nelayan</th>
                <th>NIK</th>
                <th>Nama Perahu</th>
                <th>Ikan Masuk</th>
                <th>Harga per Kg</th>
                <th>Total Berat</th>
                <th>Total Pendapatan</th>
                <th>Tanggal Data Masuk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pencatatans as $pencatatan)
            <tr>
                <td>{{ $pencatatan->nama_nelayan }}</td>
                <td>{{ $pencatatan->nik }}</td>
                <td>{{ $pencatatan->nama_perahu }}</td>
                <td>
                    @php
                        $ikan_masuk = is_array($pencatatan->ikan_masuk) ? $pencatatan->ikan_masuk : json_decode($pencatatan->ikan_masuk, true);
                    @endphp
                    {{ implode(', ', $ikan_masuk) }}
                </td>
                <td>{{ $pencatatan->harga_per_kg }}</td>
                <td>{{ $pencatatan->total_berat }} Kg</td>
                <td>Rp {{ $pencatatan->total_pendapatan }}</td>
                <td>{{ \Carbon\Carbon::parse($pencatatan->created_at)->format('d M Y, H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
