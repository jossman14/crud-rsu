@extends('layouts.app')

@section('judulSitus',"Halaman Daftar")

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
                    <div class="mx-auto">
                        <div class="card mb-0 shadow-none">
                            <div class="card-body">
                                <div class="px-3">
                                    <a href="index.html" class="logo logo-admin"><img
                                            src="../../layout/assets/images/logo-sm.png" height="55" alt="logo"
                                            class="mx-auto d-block" /></a>
                                    <div class="media">

                                        <div class="media-body ml-3 align-self-center">
                                            <h4 class="mt-0 mb-1">
                                                Register
                                            </h4>
                                            <p class="text-muted mb-0">
                                                Silahkan isi form pendaftaran berikut
                                            </p>
                                        </div>
                                    </div>

                                    <form class="form-horizontal my-4" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Nama</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1"><i
                                                            class="mdi mdi-account-outline font-16"></i></span>
                                                </div>
                                                <input id="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus
                                                    placeholder="Ahmad Budiyanto" />
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="mdi mdi-email font-16"></i></span>
                                                </div>
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" placeholder="admin@rsu.co.id" />
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="mdi mdi-key font-16"></i></span>
                                                </div>
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password"
                                                    placeholder="password" />
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password-confirm">Konfirmasi Password</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class="mdi mdi-key font-16"></i></span>
                                                </div>
                                                <input placeholder="password" id="password-confirm" type="password"
                                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                                    name="password_confirmation" required
                                                    autocomplete="current-password" />
                                                @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                </div>


                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light"
                                            type="submit">
                                            Daftar
                                            <i class="fas fa-sign-in-alt ml-1"></i>
                                        </button>
                                    </div>
                                </div>
                                </form>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Log In page -->


</div>
@endsection