@extends('layouts.app')

@section('title', 'Laporan Transaksi')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <i class="bi bi-file-earmark-text"></i>
            Laporan Transaksi
        </h2>

        <a href="{{ route('transaksi.laporan.pdf', request()->query()) }}"
        class="btn btn-danger">

            <i class="bi bi-file-earmark-pdf"></i>
            Export PDF

        </a>

    </div>

    {{-- Filter Form --}}
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Dari Tanggal</label>
                    <input type="date" name="dari" class="form-control"
                           value="{{ request('dari') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Sampai Tanggal</label>
                    <input type="date" name="sampai" class="form-control"
                           value="{{ request('sampai') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="">Semua</option>
                        <option value="Dipinjam" {{ request('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                        <option value="Dikembalikan" {{ request('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Anggota</label>
                    <select name="anggota_id" class="form-select">
                        <option value="">Semua</option>
                        @foreach($anggotas as $anggota)
                            <option value="{{ $anggota->id }}" {{ request('anggota_id') == $anggota->id ? 'selected' : '' }}>
                                {{ $anggota->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-filter"></i> Filter
                    </button>
                    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Reset</a>
                    <button type="button" class="btn btn-success" onclick="window.print()">
                        <i class="bi bi-printer"></i> Cetak
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h6>Total Transaksi</h6>
                    <h3>{{ $summary['total'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body text-center">
                    <h6>Dipinjam</h6>
                    <h3>{{ $summary['dipinjam'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h6>Dikembalikan</h6>
                    <h3>{{ $summary['dikembalikan'] }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body text-center">
                    <h6>Total Denda</h6>
                    <h3>Rp {{ number_format($summary['total_denda'], 0, ',', '.') }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Laporan --}}
    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-success">

                        <tr>
                            <th>No</th>
                            <th>Anggota</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Denda</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($transaksis as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>{{ $item->anggota->nama }}</td>

                                <td>{{ $item->buku->judul }}</td>

                                <td>
                                    {{ $item->tanggal_pinjam->format('d-m-Y') }}
                                </td>

                                <td>

                                    @if($item->status == 'Dipinjam')
                                        <span class="badge bg-warning text-dark">
                                            Dipinjam
                                        </span>
                                    @else
                                        <span class="badge bg-success">
                                            Dikembalikan
                                        </span>
                                    @endif

                                </td>

                                <td>
                                    Rp {{ number_format($item->denda ?? 0, 0, ',', '.') }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="text-center text-muted">
                                    Tidak ada data transaksi
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

{{-- Print CSS --}}
<style>
@media print {
    .card-body form, .btn, nav, footer { display: none !important; }
    .card { border: none !important; box-shadow: none !important; }
}
</style>
@endsection