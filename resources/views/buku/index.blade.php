@extends('layouts.app')
 
@section('title', 'Daftar Buku')
 
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>
        <i class="bi bi-book"></i>
        Daftar Buku
    </h1>
    {{-- Button Export / Tugas 3 Pertemuan 12 --}}
    <div>
        <a href="{{ route('buku.export') }}" class="btn btn-success me-2">
            <i class="bi bi-download"></i> Export CSV
        </a>
        <a href="{{ route('buku.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Buku
        </a>
    </div>
</div>

{{-- Statistik Cards --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Total Buku</h6>
                        <h2 class="mb-0">{{ $totalBuku }}</h2>
                    </div>
                    <div class="text-primary">
                        <i class="bi bi-book-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-success">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Tersedia</h6>
                        <h2 class="mb-0">{{ $bukuTersedia }}</h2>
                    </div>
                    <div class="text-success">
                        <i class="bi bi-check-circle-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-danger">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="text-muted mb-1">Buku Habis</h6>
                        <h2 class="mb-0">{{ $bukuHabis }}</h2>
                    </div>
                    <div class="text-danger">
                        <i class="bi bi-x-circle-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Search & Filter --}}
<div class="card mb-4">
    <div class="card-body">

        <form method="GET" action="{{ url('/buku/search') }}">

            {{-- SEARCH BAR --}}
            <div class="row g-3 mb-3">

                <div class="col-md-5">
                    <input type="text"
                           name="keyword"
                           class="form-control"
                           placeholder="Cari judul / pengarang / penerbit"
                           value="{{ request('keyword') }}">
                </div>

                <div class="col-md-2">
                    <input type="number" name="tahun" class="form-control" placeholder="Tahun" value="{{ request('tahun') }}">
                </div>

                <div class="col-md-2">
                    <select name="ketersediaan" class="form-select">
                        <option value="">Semua</option>
                        <option value="tersedia" {{ request('stok') == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="habis" {{ request('stok') == 'habis' ? 'selected' : '' }}>Habis</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <button class="btn btn-primary w-100">
                        <i class="bi bi-search"></i> Cari Buku
                    </button>
                </div>

            </div>

            {{-- KATEGORI --}}
            <div class="card-body">
                <h6 class="card-title">
                    <i class="bi bi-funnel"></i> Filter Kategori:
                </h6>

                <a href="{{ route('buku.index') }}"
                   class="btn btn-sm {{ !request('kategori') ? 'btn-primary' : 'btn-outline-primary' }}">
                    Semua
                </a>

                <a href="{{ route('buku.kategori', 'Programming') }}"
                   class="btn btn-sm {{ request('kategori') == 'Programming' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Programming
                </a>

                <a href="{{ route('buku.kategori', 'Database') }}"
                   class="btn btn-sm {{ request('kategori') == 'Database' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Database
                </a>

                <a href="{{ route('buku.kategori', 'Web Design') }}"
                   class="btn btn-sm {{ request('kategori') == 'Web Design' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Web Design
                </a>

                <a href="{{ route('buku.kategori', 'Networking') }}"
                   class="btn btn-sm {{ request('kategori') == 'Networking' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Networking
                </a>

                <a href="{{ route('buku.kategori', 'Data Science') }}"
                   class="btn btn-sm {{ request('kategori') == 'Data Science' ? 'btn-primary' : 'btn-outline-primary' }}">
                    Data Science
                </a>
            </div>

        </form>

    </div>
</div>
 
{{-- Form Bulk Delete / Tugas 2 Pertemuan 12 --}}
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('buku.bulk-delete') }}" method="POST" id="bulk-delete-form">
            @csrf
            <div class="d-flex justify-content-between align-items-center">

                {{-- Select All Checkbox --}}
                <div class="form-check m-0">
                    <input class="form-check-input" type="checkbox" id="select-all">
                    <label class="form-check-label" for="select-all">
                        Pilih Semua
                    </label>
                </div>

                {{-- Button Bulk Delete --}}
                <button type="submit"
                        class="btn btn-danger"
                        onclick="return confirm('Yakin ingin menghapus buku yang dipilih?')">
                    <i class="bi bi-trash"></i> Hapus Terpilih
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Daftar Buku (Component Version) --}}
@if($bukus->count() > 0)
    <div class="row">
        @foreach ($bukus as $buku)
            <div class="col-md-4 mb-3">
                <x-buku-card :buku="$buku" />
            </div>
        @endforeach
    </div>

@else
    <div class="alert alert-info">
        Tidak ada data buku
    </div>
@endif
</form>
@endsection

{{-- SELECT ALL JS / Tugas 2 Pertemuan 12 --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectAll = document.getElementById('select-all');

    if (selectAll) {
        selectAll.addEventListener('change', function () {
            document.querySelectorAll('input[name="buku_ids[]"]').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    }
});
</script>
@endpush
 
@push('scripts')
<script>
    // SweetAlert confirmation untuk delete
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const form = this.closest('form');
            const judul = this.getAttribute('data-judul');

            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: `Apakah Anda yakin ingin menghapus buku "${judul}"?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.disabled = true;
                    this.innerHTML =
                        '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';

                    form.submit();
                }
            });
        });
    });
</script>
@endpush

@push('scripts')
<script>
    // Loading state saat submit form
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {

            // jangan ganggu bulk delete
            if (this.id === 'bulk-delete-form') return;

            const submitBtn = this.querySelector('button[type="submit"]');

            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>Menyimpan...';
            }
        });
    });
</script>
@endpush