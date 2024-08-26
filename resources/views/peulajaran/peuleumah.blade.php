@extends('kerangka.dasar')
@section('judul',"detail judul $buku->judul")
@section('asoe')
<!-- ------------------menampilkan satu data dari file storage-------------------------- -->
<!-- <h1>{{-- $buku[1] --}}</h1>
    <h6>{{-- date("d M Y H:i:s", strtotime($buku[3])) --}}</h6>
    <p>{{-- $buku[2] --}}</p>
    <a href='{{-- url("peulajaran") --}}'>balek liket</a> -->
<!-- ----------------------------------------------------------------------------------- -->
<h1>{{ $buku->judul}}</h1>
<h6>Creaated At {{ date("d M Y H:i:s", strtotime($buku->created_at)) }}</h6>
<p>{{ $buku->deskripsi }}</p>
<h3>{{$total}} Pendapat</h3>
@foreach($pendapats as $key => $pendapat)
<p>{{$key . '. ' . $pendapat->pendapat}}</p>
@endforeach
<a href='{{ url("peulajaran") }}'>balek liket</a>
@endsection