<header>
    <nav class="navbar mb-5" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <div class="d-flex me-5 gap-3">
                @if(Auth::check())
                <a href='{{url("keluar")}}' class="btn btn-outline-success">Keluar</a>
                @else
                <a href='{{url("masuk")}}' class="btn btn-outline-success">Masuk</a>
                <a href='{{url("daftar")}}' class="btn btn-outline-success">Daftar</a>
                @endif
            </div>
        </div>
    </nav>
</header>