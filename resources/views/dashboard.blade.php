@extends('layouts.app')
@section('title', 'Dashboard')
 
@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4">Dashboard Perpustakaan</h2>
 
    {{-- Statistics Cards --}}
    <div class="row g-3 mb-4">
        @foreach([
            ['Total Buku', $stats['total_buku'], 'bi-book', 'primary'],
            ['Anggota Aktif', $stats['total_anggota'], 'bi-people', 'success'],
            ['Sedang Dipinjam', $stats['sedang_dipinjam'], 'bi-journal-arrow-up', 'info'],
            ['Terlambat', $stats['terlambat'], 'bi-exclamation-triangle', 'danger'],
            ['Transaksi Hari Ini', $stats['transaksi_hari_ini'], 'bi-calendar-check', 'warning'],
            ['Buku Tersedia', $stats['buku_tersedia'], 'bi-bookshelf', 'secondary'],
            ['Total Transaksi', $stats['total_transaksi'], 'bi-receipt', 'dark'],
            ['Denda Bulan Ini', 'Rp ' . number_format($stats['denda_bulan_ini'], 0, ',', '.'), 'bi-cash', 'danger'],
        ] as [$label, $value, $icon, $color])
        <div class="col-xl-3 col-md-6">
            <div class="card border-{{ $color }} h-100">
                <div class="card-body d-flex align-items-center">
                    <i class="bi {{ $icon }} fs-1 text-{{ $color }} me-3"></i>
                    <div>
                        <h6 class="text-muted mb-1">{{ $label }}</h6>
                        <h4 class="mb-0">{{ $value }}</h4>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
 
    {{-- Charts --}}
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header bg-info">Transaksi 6 Bulan Terakhir</div>
                <div class="card-body">
                    <canvas id="chartTransaksi" height="100"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">Top 5 Buku Populer</div>
                <div class="card-body">
                    <canvas id="chartBuku" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- BUKU POPULER & ANGGOTA AKTIF --}}
    <div class="row mb-3">

        {{-- Buku Populer --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-primary text-white">
                    <i class="bi bi-book"></i>
                    5 Buku Terpopuler
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Judul</th>
                                <th>Jumlah Pinjam</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($bukuPopuler as $buku)
                                <tr>
                                    <td>{{ $buku->judul }}</td>
                                    <td>{{ $buku->transaksis_count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Anggota Aktif --}}
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-success text-white">
                    <i class="bi bi-people"></i>
                    5 Anggota Teraktif
                </div>

                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Nama</th>
                                <th>Jumlah Transaksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($anggotaAktif as $anggota)
                                <tr>
                                    <td>{{ $anggota->nama }}</td>
                                    <td>{{ $anggota->transaksis_count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- Recent Transactions --}}
    <div class="card">
        <div class="card-header bg-dark text-white">
            <i class="bi bi-clock-history"></i>
            Transaksi Terbaru
        </div>
        <div class="card-body p-0">

            <table class="table table-hover mb-0">

                <thead class="table-light">
                    <tr>
                        <th>Kode</th><th>Anggota</th><th>Buku</th>
                        <th>Tgl Pinjam</th><th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentTransaksi as $trx)
                    <tr>
                        <td>{{ $trx->kode_transaksi }}</td>
                        <td>{{ $trx->anggota->nama }}</td>
                        <td>{{ $trx->buku->judul }}</td>
                        <td>{{ $trx->tanggal_pinjam->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $trx->status === 'Dipinjam' ? 'warning' : 'success' }}">
                                {{ $trx->status }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    
</div>
 
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Line chart — Transaksi 6 bulan terakhir
new Chart(document.getElementById('chartTransaksi'), {
    type: 'line',
    data: {
        labels: @json($chartData->pluck('bulan')),
        datasets: [
            { label: 'Peminjaman', data: @json($chartData->pluck('pinjam')),
              borderColor: '#0d6efd', tension: 0.3 },
            { label: 'Pengembalian', data: @json($chartData->pluck('kembali')),
              borderColor: '#198754', tension: 0.3 }
        ]
    },
    options: { responsive: true }
});
 
// Pie chart — Buku Populer
new Chart(document.getElementById('chartBuku'), {
    type: 'pie',
    data: {
        labels: @json($bukuPopuler->pluck('judul')),
        datasets: [{
            data: @json($bukuPopuler->pluck('transaksis_count')),
            backgroundColor: ['#0d6efd','#198754','#ffc107','#dc3545','#6f42c1']
        }]
    },
    options: { responsive: true, plugins: { legend: { position: 'bottom' } } }
});
</script>
@endpush
@endsection