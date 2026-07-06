<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kategori['nama'] }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="/kategori">Kategori</a>
            </li>

            <li class="breadcrumb-item active">
                {{ $kategori['nama'] }}
            </li>

        </ol>

    </nav>

    <div class="card">

        <div class="card-header bg-primary text-white">

            <h3>{{ $kategori['nama'] }}</h3>

        </div>

        <div class="card-body">

            <p>
                <strong>Deskripsi:</strong>
                {{ $kategori['deskripsi'] }}
            </p>

            <p>
                <strong>Jumlah Buku:</strong>

                <span class="badge bg-success">
                    {{ $kategori['jumlah_buku'] }}
                </span>
            </p>

            <hr>

            <h4>Daftar Buku</h4>

            <table class="table table-bordered">

                <thead class="table-dark">

                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Tahun</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach ($buku_list as $index => $buku)

                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>{{ $buku['judul'] }}</td>

                        <td>{{ $buku['pengarang'] }}</td>

                        <td>{{ $buku['tahun'] }}</td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <div class="mt-3">

        <a href="/kategori" class="btn btn-secondary">
            Kembali ke Daftar Kategori
        </a>

    </div>

</div>

</body>
</html>