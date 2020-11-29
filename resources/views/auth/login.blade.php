@extends('layouts.app')

@section('judulSitus',"Halaman Login")

@section('css')
<link href="../../layout/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
@endsection
@section('content')
<div class="account-body bgGan">
    <!-- Log In page -->
    <div class="row vh-100">
        <div class="col p-0 d-flex justify-content-center">
            <div class="d-flex align-items-center">
                <div class="account-title text-white text-center">
                    <!-- <img src="../../layout/assets/images/logo-sm.png" alt="" class="thumb-sm" />
            <h4 class="mt-3">Welcome To Frogetor</h4>
            <div class="border w-25 mx-auto border-primary"></div>
            <h1 class="">Let's Get Started</h1>
            <p class="font-14 mt-3">
              Don't have an account ?
              <a href="" class="text-primary">Sign up</a>
            </p> -->
                    <div class="col-lg-10 mx-auto">
                        <div class="card mb-0 shadow-none">
                            <div class="card-body">
                                <div class="px-3">
                                    <a href="index.html" class="logo logo-admin"><img
                                            src="../../layout/assets/images/logo-sm.png" height="55" alt="logo"
                                            class="mx-auto d-block" /></a>
                                    <div class="media">

                                        <div class="media-body ml-3 align-self-center">
                                            <h4 class="mt-0 mb-1">
                                                Login
                                            </h4>
                                            <p class="text-muted mb-0">
                                                Silahkan masukkan identitas anda untuk masuk sistem informasi rumah
                                                sakit
                                            </p>
                                        </div>
                                    </div>

                                    <form class="form-horizontal my-4" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="mdi mdi-account-outline font-16"></i></span>
                                                </div>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus placeholder="admin@rsu.co.id" />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="userpassword">Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="mdi mdi-key font-16"></i></span>
                                                </div>
                                                <input placeholder="password" id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="current-password" />
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-sm-6 d-flex justify-content-start">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="remember"
                                                id="remember" {{ old('remember') ? 'checked'
                                    : '' }} />
                                            <label class="custom-control-label" for="remember">ingat
                                                saya</label>
                                        </div>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <div class="col-sm-6 text-right">

                                        <a href="{{ route('password.request') }}" class="text-muted font-13"><i
                                                class="mdi mdi-lock"></i>
                                            Lupa password anda?</a>
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">
                                            Masuk
                                            <i class="fas fa-sign-in-alt ml-1"></i>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>

                            <div class="m-3 text-center bg-light p-3 text-primary">
                                <h5 class="">
                                    Tidak punya akun ?
                                </h5>
                                <p class="font-13">
                                    silahkan bergabung sekarang
                                </p>
                                <a href="{{ route('register') }}"
                                    class="btn btn-primary btn-round waves-effect waves-light">Daftar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Log In page -->

@endsection

@section('js')
{{-- <script src="../../layout/assets/plugins/sweet-alert2/sweetalert2.min.js"></script> --}}
<script src="../../layout/assets/js/sweetAlertNew.js"></script>
<script>
    $(document).ready(function(){
        var login = document.createElement("div");
        login.innerHTML = `
        <div class="m-3 text-center bg-light p-3 text-primary">
            <h5 class="">
                Anda dapat menggunakan akun demo berikut:
            </h5>
            <p class="font-13">
                email: admin@test.id
            </p>
            <p class="font-13">
                password: 123456789
            </p>
        </div>`;
                 swal({
                content: login,
                }).catch(swal.noop);
                });
                
</script>
@endsection