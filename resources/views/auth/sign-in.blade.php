@extends('layouts.auth')
{{-- Memanggil Yield --}}
@section('title', 'LogIn')
@section('content')
@include('components.loadlogin')
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo">
                            <div class="logo"><img src="{{ asset('image/gambar/logopenabur.png') }}" style="width: 30%"></div>
                            <a href=""><img src="{{ asset('image/gambar/centerbg.png') }}" class="img-fluid" alt="Center Image" style="width: 80%; margin: 0 auto;"></a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('auth.loginproses') }}" class="col-lg-12" id="sign_in" method="POST">
                    @csrf
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="text" class="form-control" name="email">
                            <label class="form-label text-dark" style="font-weight: bold;">Email</label>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="form-line">
                            <input type="password" class="form-control" name="password">
                            <label class="form-label text-dark" style="font-weight: bold;">Password</label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn  btn-raised bg-blue waves-effect">SIGN IN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection