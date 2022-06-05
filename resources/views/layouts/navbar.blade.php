<nav class="navbar navbar-expand-lg navbar-dark bg-dark">\
    <div class="container">
        <a class="navbar-brand" href="#"><i class="uil uil-database me-1"></i></i>Musang Data Collection</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}"><i class="uil uil-estate me-1"></i>Home</a>
                </li>
                @guest
                    @if(Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"><i class="uil uil-sign-in-alt me-1"></i>Login</a>
                        </li>
                    @endif
                    @if(Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}"><i class="uil uil-user-plus me-1"></i>Register</a>
                        </li>
                    @endif
                @else
                    @if(Auth::user()->role == 'Admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('barang') }}"><i class="uil uil-cube me-1"></i>Kelola Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('kategori.index') }}"><i class="uil uil-books me-1"></i>Kelola Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexPesanan') }}"><i class="uil uil-history ms-1"></i>Kelola Pesanan</a>
                        </li>
                    @elseif(Auth::user()->role == 'Member')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexPesanan') }}"><i class="uil uil-history ms-1"></i>Pesanan</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="uil uil-user me-1"></i>  {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>