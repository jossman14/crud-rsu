@extends('layouts.app')

@section('judulSitus',"Halaman Daftar")

@section('content')
<div class="account-body bgGan">
    <!-- Log In page -->
    <div class="row vw-100 mx-auto">
        <div class="col-12 p-0 d-flex justify-content-center">
            <div class="d-flex align-items-center">
                <div class="account-title text-white text-center">

                    <div class="col-12 mx-auto m-4">
                        <div class="card mb-0 shadow-none">
                            <div class="card-body">
                                <div class="px-3">
                                    <a href="index.html" class="logo logo-admin"><img
                                            src="../../layout/assets/images/logo-sm.png" height="55" alt="logo"
                                            class="mx-auto d-block" /></a>
                                    <div class="media">

                                        <div class="media-body ml-3 align-self-center">
                                            <h3 class="mt-0 mt-4 mb-2 text-dark">
                                                Form Pendaftaran Pasien RSU
                                            </h3>
                                            <p class="text-muted mb-0">
                                                Silahkan isi form pendaftaran berikut
                                            </p>
                                        </div>
                                    </div>

                                    <form class="form-horizontal my-4" action="/pendaftaran" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="nama_pasien">Nama</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i
                                                                    class="mdi mdi-account-outline font-16"></i></span>
                                                        </div>
                                                        <input id="nama_pasien" type="text"
                                                            class="form-control @error('nama_pasien') is-invalid @enderror"
                                                            name="nama_pasien" value="{{ old('nama_pasien') }}" required
                                                            autocomplete="nama_pasien" autofocus
                                                            placeholder="Ahmad Budiyanto" />
                                                        @error('nama_pasien')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat_pasien">Alamat</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i
                                                                    class="mdi mdi-book font-16"></i></span>
                                                        </div>
                                                        <input id="alamat_pasien" type="text"
                                                            class="form-control @error('alamat_pasien') is-invalid @enderror"
                                                            name="alamat_pasien" value="{{ old('alamat_pasien') }}"
                                                            required autocomplete="alamat_pasien" autofocus
                                                            placeholder="Karangmalang, Sragen" />
                                                        @error('alamat_pasien')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i
                                                                    class="mdi mdi-database-edit font-16"></i></span>
                                                        </div>

                                                        <input type="text" id="mdate"
                                                            class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                            placeholder="1990-11-22" data-dtp="dtp_PLUKp"
                                                            value="{{old('tgl_lahir')}}" name="tgl_lahir">
                                                        @error('tgl_lahir')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>

                                                    <select class="select2 form-control mb-3 custom-select"
                                                        style="width: 100%; height:36px;" id="jenis_kelamin"
                                                        class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                                        name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                                                        <option disabled value selected>Pilih Jenis Kelamin
                                                        </option>
                                                        <option value="pria">
                                                            Pria
                                                        </option>
                                                        <option value="wanita">
                                                            Wanita
                                                        </option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="no_hp">No. HP (WA)</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i
                                                                    class="mdi mdi-cellphone-wireless font-16"></i></span>
                                                        </div>
                                                        <input id="no_hp" type="text"
                                                            class="form-control @error('no_hp') is-invalid @enderror"
                                                            name="no_hp" value="{{ old('no_hp') }}" required
                                                            autocomplete="no_hp" autofocus placeholder="08123456789" />

                                                        @error('no_hp')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="tgl_periksa">Tanggal Periksa</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i
                                                                    class="mdi mdi-clipboard-arrow-up-outline font-16"></i></span>
                                                        </div>

                                                        <input disabled type="text" id="mdate"
                                                            class="form-control @error('tgl_periksa') is-invalid @enderror"
                                                            placeholder="2020-11-22" data-dtp="dtp_PLUKp"
                                                            value="{{date("Y-m-d")}}" name="tgl_periksa_hehe">
                                                        <input type="hidden" id="mdate"
                                                            class="form-control @error('tgl_periksa') is-invalid @enderror"
                                                            placeholder="2020-11-22" data-dtp="dtp_PLUKp"
                                                            value="{{date("Y-m-d")}}" name="tgl_periksa">
                                                        @error('tgl_periksa')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="keluhan">Poliklinik</label>


                                                    <select class="select2 form-control mb-3 custom-select"
                                                        style="width: 100%; height:36px;" id="keluhan"
                                                        class="form-control @error('keluhan') is-invalid @enderror"
                                                        name="keluhan" value="{{ old('keluhan') }}">
                                                        <option disabled value selected>Pilih Poliklinik</option>
                                                        @foreach ($poli as $item)
                                                        <option value="{{$item->id}}">{{$item->nama_poli}}</option>
                                                        @endforeach
                                                    </select>


                                                    @error('keluhan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="id_dokter">Dokter</label>


                                                    <select class="select2 form-control mb-3 custom-select"
                                                        style="width: 100%; height:36px;" id="id_dokter"
                                                        class="form-control @error('id_dokter') is-invalid @enderror"
                                                        name="id_dokter" value="{{ old('id_dokter') }}">
                                                        <option disabled value selected>Pilih Dokter</option>
                                                        @foreach ($dokter as $itemDokter)
                                                        <option value="{{$itemDokter->id}}">{{$itemDokter->nama_dokter}}
                                                        </option>
                                                        @endforeach


                                                    </select>
                                                    @error('id_dokter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>
                                                <div class="form-group">
                                                    <label for="jenis_penjamin">Jenis Penjamin</label>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                        style="width: 100%; height:36px;" id="jenis_penjamin"
                                                        class="form-control @error('jenis_penjamin') is-invalid @enderror"
                                                        name="jenis_penjamin" value="{{ old('jenis_penjamin') }}">
                                                        <option disabled value selected>Pilih Jenis Penjamin
                                                        </option>
                                                        <option value="umum">
                                                            Umum
                                                        </option>
                                                        <option value="bpjs">
                                                            BPJS
                                                        </option>
                                                    </select>
                                                    @error('jenis_penjamin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror

                                                </div>


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
                                <div class="m-3 text-center bg-light p-3 text-primary">
                                    <h5 class="">
                                        Aanda staff rumah sakit ?
                                    </h5>
                                    <p class="font-13">
                                        Masuk melalui tombol berikut
                                    </p>
                                    <a href="{{ route('login') }}"
                                        class="btn btn-primary btn-round waves-effect waves-light">Masuk</a>
                                </div>
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

@section('css')
<!-- Clock css -->
<link href="../../layout/assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
<!-- Plugins css -->
<link href="../../layout/assets/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
<link href="../../layout/assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
<link href="../../layout/assets/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />
<link href="../../layout/assets/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
<link href="../../layout/assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

<link href="../../layout/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<link href="../../layout/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
<link href="../../layout/assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
@endsection

@section('js')
<!-- Plugins js -->
<script src="../../layout/assets/plugins/moment/moment.js"></script>
{{-- <script src="../../layout/assets/plugins/daterangepicker/daterangepicker.js"></script> --}}
<script src="../../layout/assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
<script src="../../layout/assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
{{-- <script src="../../layout/assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
<script src="../../layout/assets/plugins/colorpicker/jquery-asColor.js"></script>
<script src="../../layout/assets/plugins/colorpicker/jquery-asGradient.js"></script>
<script src="../../layout/assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script> --}}
<script src="../../layout/assets/plugins/select2/select2.min.js"></script>

{{-- <script src="../../layout/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> --}}
<script src="../../layout/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
{{-- <script src="../../layout/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script> --}}
<script src="../../layout/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

{{-- <script src="../../layout/assets/pages/jquery.forms-advanced.js"></script> --}}

<script>
    $(".select2").select2({});
     // MAterial Date picker    
     $('#mdate').bootstrapMaterialDatePicker({
          weekStart : 0, time: false 
         });
</script>

@endsection