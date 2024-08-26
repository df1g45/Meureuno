@extends('kerangka.dasar')
@section('judul','buat data baru')
@section('asoe')
<div class="container">
    <form method="POST" action='{{url("peulajaran")}}'>
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">judul</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="judul">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection