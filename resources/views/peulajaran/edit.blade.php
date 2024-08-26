@extends('kerangka.dasar')
@section('judul', "edit data $buku->judul")
@section('asoe')
<div class="container">
    <form method="POST" action='{{url("peulajaran/$buku->id")}}'>
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">judul</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="judul" value='{{$buku->judul}}'>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi">{{$buku->deskripsi}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <form action='{{url("peulajaran/$buku->id")}}' method="post">
        @method('DELETE')
        @csrf
        <button type="submit" class="btn btn-danger">hapus</button>
    </form>
</div>
<script src="{{ asset('bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection