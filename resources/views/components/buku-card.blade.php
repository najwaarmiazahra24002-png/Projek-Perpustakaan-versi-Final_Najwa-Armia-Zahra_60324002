<div class="card h-100 shadow-sm">

    <div class="card-body d-flex flex-column">

        {{-- Checkbox --}}
        <div class="d-flex justify-content-end mb-2">
            <input type="checkbox"
                name="buku_ids[]"
                value="{{ $buku->id }}"
                form="bulk-delete-form">
        </div>

        {{-- Icon --}}
        <div class="text-center mb-3">
            <i class="bi bi-book-fill text-primary" style="font-size:60px;"></i>
        </div>

        {{-- Judul --}}
        <h5 class="text-center fw-bold mb-3">
            {{ $buku->judul }}
        </h5>

        <table class="table table-sm table-borderless mb-3">

            <tr>
                <td width="35%"><strong>Pengarang</strong></td>
                <td>: {{ $buku->pengarang }}</td>
            </tr>

            <tr>
                <td><strong>Harga</strong></td>
                <td>: Rp {{ number_format($buku->harga,0,',','.') }}</td>
            </tr>

            <tr>
                <td><strong>Stok</strong></td>
                <td>: {{ $buku->stok }}</td>
            </tr>

        </table>

        <div class="mb-2 text-center">
            <span class="badge bg-primary">
                {{ $buku->kategori }}
            </span>
        </div>

        <div class="mb-3 text-center">
            @if($buku->stok > 0)
                <span class="badge bg-success">
                    Tersedia
                </span>
            @else
                <span class="badge bg-danger">
                    Habis
                </span>
            @endif
        </div>

        {{-- Tombol --}}
        @if($showActions)

        <div class="mt-auto">

            <div class="d-grid gap-2">

                <a href="{{ route('buku.show',$buku->id) }}"
                   class="btn btn-info text-white btn-sm">
                    <i class="bi bi-eye"></i>
                    Detail
                </a>

                <div class="row g-2">

                    <div class="col-6">
                        <a href="{{ route('buku.edit',$buku->id) }}"
                           class="btn btn-warning btn-sm w-100">
                            <i class="bi bi-pencil"></i>
                            Edit
                        </a>
                    </div>

                    <div class="col-6">
                        <form action="{{ route('buku.destroy',$buku->id) }}"
                              method="POST"
                              class="delete-form">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm w-100 btn-delete"
                                data-judul="{{ $buku->judul }}">
                                <i class="bi bi-trash"></i>
                                Hapus
                            </button>

                        </form>
                    </div>

                </div>

            </div>

        </div>

        @endif

    </div>

</div>