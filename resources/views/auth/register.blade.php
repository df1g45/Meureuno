@extends('kerangka.dasar')
@section('judul','Dafatrkan diri anda')
@section('asoe')
<div class="row">
    <div class="col-md-4"></div>
    <div class="card col-md-4">
        <div class="card-body">
            <h1 class="text-center">
                Daftar
            </h1>
            @if(session()->has('salah'))
            <div class="alert alert-danger">
                {{session()->get('salah')}}
            </div>
            @endif
            <form action='{{url("daftar")}}' method="post" class="form-control">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="nama" class="form-control" id="nama" name="nama">
                    @if($errors->has('nama'))
                    <span class="text-danger">{{$errors->first('nama')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @if($errors->has('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @if($errors->has('password'))
                    <span class="text-danger">{{$errors->first('password')}}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Password Konfirmasi</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection