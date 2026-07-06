@extends('layouts.app')

@section('title', 'Detail Transaksi')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <i class="bi bi-file-text"></i>
            Detail Transaksi
        </h2>

        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>

    {{-- Warning Terlambat --}}
    @if($transaksi->status == 'Dipinjam' && now()->gt($transaksi->tanggal_kembali))

    <div class="alert alert-danger">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <strong>Peringatan!</strong>
        Buku ini sudah melewati batas pengembalian.
        Terlambat
        <strong>{{ now()->diffInDays($transaksi->tanggal_kembali) }}</strong>
        hari.
    </div>

    @endif

    <div class="row">

        {{-- Informasi Transaksi --}}
        <div class="col-md-6 mb-4">

            <div class="card shadow-sm h-100">

                <div class="card-header bg-primary text-white">
                    <i class="bi bi-receipt"></i>
                    Informasi Transaksi
                </div>

                <div class="card-body">
                    <p>
                        <strong>Kode Transaksi</strong><br>
                        <code>{{ $transaksi->kode_transaksi }}</code>
                    </p>

                    <p>
                        <strong>Status</strong><br>
                        @if($transaksi->status == 'Dipinjam')

                            <span class="badge bg-warning text-dark fs-6">
                                Dipinjam
                            </span>

                        @else

                            <span class="badge bg-success fs-6">
                                Dikembalikan
                            </span>

                        @endif
                    </p>

                    <p>
                        <strong>Denda</strong><br>

                        @if($transaksi->denda > 0)

                            <span class="badge bg-danger fs-6">
                                Rp {{ number_format($transaksi->denda,0,',','.') }}
                            </span>

                        @else

                            <span class="badge bg-success fs-6">
                                Tidak Ada
                            </span>

                        @endif
                    </p>
                </div>
                
            </div>

        </div>

        {{-- Data Anggota --}}
        <div class="col-md-6 mb-4">

            <div class="card shadow-sm h-100">

                <div class="card-header bg-success text-white">
                    <i class="bi bi-person-fill"></i>
                    Data Anggota & Buku
                </div>

                <div class="card-body">

                    <p>
                        <i class="bi bi-person text-primary"></i>
                        <strong>Nama Anggota</strong><br>
                        {{ $transaksi->anggota->nama }}
                    </p>

                    <p>
                        <i class="bi bi-book text-success"></i>
                        <strong>Judul Buku</strong><br>
                        {{ $transaksi->buku->judul }}
                    </p>

                    <p>
                        <i class="bi bi-chat-left-text text-info"></i>
                        <strong>Keterangan</strong><br>

                        {{ $transaksi->keterangan ?: '-' }}

                    </p>

                </div>

            </div>

        </div>

        {{-- Informasi Pengembalian --}}
        <div class="col-md-12">

            <div class="card shadow-sm">

                <div class="card-header bg-dark text-white">
                    <i class="bi bi-calendar-event"></i>
                    Informasi Pengembalian
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="border rounded p-3 text-center">
                                <i class="bi bi-calendar-plus display-6 text-primary"></i>
                                <h6 class="mt-2">Tanggal Pinjam</h6>
                                <strong>
                                    {{ $transaksi->tanggal_pinjam->format('d M Y') }}
                                </strong>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="border rounded p-3 text-center">
                                <i class="bi bi-calendar-check display-6 text-warning"></i>
                                <h6 class="mt-2">Batas Pengembalian</h6>
                                <strong>
                                    {{ $transaksi->tanggal_kembali->format('d M Y') }}
                                </strong>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="border rounded p-3 text-center">
                                <i class="bi bi-calendar2-check display-6 text-success"></i>
                                <h6 class="mt-2">Tanggal Dikembalikan</h6>
                                
                                <strong>
                                    @if($transaksi->tanggal_dikembalikan)

                                        {{ \Carbon\Carbon::parse($transaksi->tanggal_dikembalikan)->format('d M Y') }}

                                    @else

                                        -

                                    @endif
                                </strong>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Tombol Kembalikan (UPDATE + SweetAlert) --}}
    @if($transaksi->status === 'Dipinjam')
        <div class="mt-4">
            <button type="button" class="btn btn-success" id="btn-kembalikan">
                <i class="bi bi-arrow-return-left"></i> Kembalikan Buku
            </button>
        
            <form id="form-kembalikan" action="{{ route('transaksi.kembalikan', $transaksi->id) }}" method="POST" class="d-none">
                @csrf
                @method('PATCH')
            </form>
        </div>
    @else
        @if($transaksi->tanggal_dikembalikan <= $transaksi->tanggal_kembali)
            <div class="alert alert-success mt-3">
                <i class="bi bi-check-circle"></i> Dikembalikan tepat waktu pada
                {{ $transaksi->tanggal_dikembalikan->format('d M Y') }}
            </div>
        @else
            <div class="alert alert-warning">
                <i class="bi bi-exclamation-triangle"></i> Terlambat dikembalikan!
                Denda: Rp {{ number_format($transaksi->denda, 0, ',', '.') }}
            </div>
        @endif
    @endif
    
    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.getElementById('btn-kembalikan')?.addEventListener('click', function() {
        Swal.fire({
            title: 'Konfirmasi Pengembalian',
            text: 'Apakah Anda yakin ingin mengembalikan buku ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            confirmButtonText: 'Ya, Kembalikan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('form-kembalikan').submit();
            }
        });
    });
    </script>
    @endpush

</div>

@endsection