<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian Kategori</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Hasil Pencarian</h1>

    <div class="alert alert-info">

        Keyword:
        <strong>{{ $keyword }}</strong>

    </div>

    <div class="row">

        @forelse ($hasil as $kategori)

        <div class="col-md-4 mb-4">

            <div class="card">

                <div class="card-body">

                    <h4>
                        <mark>{{ $kategori['nama'] }}</mark>
                    </h4>

                    <p>{{ $kategori['deskripsi'] }}</p>

                    <span class="badge bg-primary">
                        {{ $kategori['jumlah_buku'] }} Buku
                    </span>

                </div>

            </div>

        </div>

        @empty

        <div class="alert alert-danger">
            Kategori tidak ditemukan
        </div>

        @endforelse

    </div>

</div>

</body>
</html>