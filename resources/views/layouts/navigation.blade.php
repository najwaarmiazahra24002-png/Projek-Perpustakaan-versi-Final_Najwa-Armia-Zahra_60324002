<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold me-5" href="{{ route('dashboard') }}">
            Perpustakaan
        </a>

        <!-- Hamburger -->
        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMain">

            <!-- Menu Kiri -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-bold' : '' }}"
                        href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('buku.*') ? 'active fw-bold' : '' }}"
                        href="{{ route('buku.index') }}">
                        Buku
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('anggota.*') ? 'active fw-bold' : '' }}"
                        href="{{ route('anggota.index') }}">
                        Anggota
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('transaksi.*') ? 'active fw-bold' : '' }}"
                        href="{{ route('transaksi.index') }}">
                        Transaksi
                    </a>
                </li>
            </ul>

            <!-- Bagian kanan -->
            <ul class="navbar-nav ms-auto">
                {{-- Search / Profile / Logout --}}
            </ul>

            <!-- SEARCH - Praktikum 15 -->
            <form class="d-flex me-3" action="{{ route('search') }}" method="GET">
                <input class="form-control me-2" type="search" name="q"
                    placeholder="Cari buku, anggota, transaksi..."
                    value="{{ request('q') }}">
                <button class="btn btn-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <!-- USER DROPDOWN -->
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    {{ Auth::user()->name }}
                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            Profile
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item text-danger" type="submit">
                                Log Out
                            </button>
                        </form>
                    </li>

                </ul>
            </div>

        </div>
    </div>
</nav>