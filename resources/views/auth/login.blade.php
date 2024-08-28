@extends('kerangka.dasar')
@section('judul','Silahkan Masuk')
@section('asoe')
<div class="row">
    <div class="col-md-4"></div>
    <div class="card col-md-4">
        <div class="card-body">
            <h1 class="text-center">
                Masuk
            </h1>
            @if(session()->has('salah'))
            <div class="alert alert-danger">
                {{session()->get('salah')}}
            </div>
            @endif
            <form action='{{url("masuk")}}' method="post" class="form-control">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection