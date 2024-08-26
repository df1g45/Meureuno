@extends('kerangka.dasar')
@section('judul','login')
@section('asoe')
<div class="row">
    <div class="col-md-4"></div>
    <div class="card col-md-4">
        <div class="card-body">
            <h1 class="text-center">
                Login
            </h1>

            <form action='{{url("login")}}' method="post" class="form-control">
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
                    <button type="submit" class="btn btn-primary">Log in</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection