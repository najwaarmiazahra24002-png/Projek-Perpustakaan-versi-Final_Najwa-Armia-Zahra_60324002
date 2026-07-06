<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Transaksi</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            font-size:12px;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid #000;
        }

        th{
            background:#f2f2f2;
        }

        th, td{
            padding:8px;
            text-align:left;
        }

        .footer{
            margin-top:20px;
        }
    </style>

</head>
<body>

<h2>Laporan Transaksi Perpustakaan</h2>

<table>

    <thead>

        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Anggota</th>
            <th>Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Status</th>
            <th>Denda</th>
        </tr>

    </thead>

    <tbody>

    @foreach($transaksis as $transaksi)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $transaksi->kode_transaksi }}</td>

            <td>{{ $transaksi->anggota->nama }}</td>

            <td>{{ $transaksi->buku->judul }}</td>

            <td>{{ $transaksi->tanggal_pinjam->format('d-m-Y') }}</td>

            <td>{{ $transaksi->status }}</td>

            <td>
                Rp {{ number_format($transaksi->denda,0,',','.') }}
            </td>

        </tr>

    @endforeach

    </tbody>

</table>

<div class="footer">

    <p>
        <strong>Total Transaksi :</strong>
        {{ $transaksis->count() }}
    </p>

    <p>
        <strong>Total Denda :</strong>
        Rp {{ number_format($transaksis->sum('denda'),0,',','.') }}
    </p>

</div>

</body>
</html>