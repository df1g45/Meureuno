@extends('kerangka.dasar')

@section('judul', 'Selamat Datang')
@section('asoe')
<div class="container">
    <h1>Blog Belajar</h1>
    <a class="btn btn-success" href='{{url("peulajaran/buat")}}'>buat</a>
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~Menampilkan data dari file storage~~~~~~~~~~~~~~~~~~~~~~~ -->
    <!-- @foreach(// $buku as $book)
        @php($book = explode(",", $book))
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{-- $book[1] --}}</h5>
                <p class="card-text">{{-- $book[2] --}}</p>
                <p class="card-text"><small class="text-muted">Last updated at {{--date("d M Y H:i",strtotime($book[3])) --}}</small></p>
                <a href='{{-- url("peulajaran/$book[0]") --}}' class="btn btn-primary">Selanjutnya</a>
            </div>
        </div>
        @endforeach -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->

    @foreach($buku as $book)
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$book->judul}}</h5>
            <p class="card-text">{{$book->deskripsi}}</p>
            <p class="card-text"><small class="text-muted">Last updated at {{date("d M Y H:i",strtotime($book->updated_at))}}</small></p>
            <a href='{{url("peulajaran/$book->id")}}' class="btn btn-primary">Selanjutnya</a>
            <a href='{{url("peulajaran/$book->id/edit")}}' class="btn btn-warning">Edit</a>
        </div>
    </div>
    @endforeach

</div>

@endsection