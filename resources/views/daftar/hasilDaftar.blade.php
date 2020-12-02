@extends('layouts.app')

@section('judulSitus',"Halaman Daftar")

@section('content')
<div class="account-body bgGan">
    <!-- Log In page -->
    <div class="row vw-100 mx-auto">
        <div class="col-12 p-0 d-flex justify-content-center">
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
                    <div class="col-12 my-5">
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
                                                Berikut data pendaftaran anda
                                            </p>
                                        </div>
                                    </div>

                                </div>

                                <div class="table-responsive mt-4">
                                    <table class="table table-bordered mb-0 table-centered">
                                        <tbody>
                                            <tr>
                                                <td class="thead-light"> <strong>ID Pasien</strong></td>
                                                <td> <strong>{{$pasien->id}}</strong> </td>
                                            </tr>
                                            <tr>
                                                <td class="thead-light">Nama</td>
                                                <td>{{$pasien->nama_pasien}}</td>
                                            </tr>
                                            <tr>
                                                <td class="thead-light">Alamat</td>
                                                <td>{{$pasien->alamat_pasien}}</td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Periksa</td>
                                                <td>{{$pasien->tgl_periksa}}</td>
                                            </tr>
                                            <tr>
                                                <td>Keluhan</td>
                                                <td>{{$pasien->poli->nama_poli}}</td>
                                            </tr>
                                            <tr>
                                                <td>Dokter</td>
                                                <td>{{$pasien->dokter->nama_dokter}}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <!--end /table-->
                                </div>
                                <p class="text-dark mt-2">Tunjukkan ID pasien ke operator untuk melanjutkan pendaftaran
                                </p>

                                <div class="mt-4" id="html-content-holder">
                                    <div class="card rounded border border-dark text-dark" id="">
                                        <div class="card-body">
                                            <div class="">
                                                <div class="card-icon">
                                                    <i class="mdi mdi-stethoscope"></i>
                                                </div>
                                                <h4 class="text-dark">Nomor Antrian</h4>
                                                <h1 class="font-weight-bold text-dark">{{$pasien->no_urut}}</h1>
                                                <p class="text-dark mb-0 font-16 mb-2">ID Pasien: {{$pasien->id}}</p>
                                                <em>RSU - Bawa kartu ini pada proses pendaftaran</em>
                                            </div>
                                        </div>
                                        <!--end card-body-->

                                        <!--end card-body-->
                                    </div>
                                    <!--end card-->
                                </div>
                                <div>
                                    {{-- <input id="btn-Preview-Image" type="button" value="Preview" /> --}}

                                    <a id="btn-Convert-Html2Image" href="#" class="text-white">
                                        <button type="button"
                                            class="btn btn-primary waves-effect waves-light text-white">Download
                                            Kartu</button>
                                    </a>
                                    <a id="btn-Convert-Html2Image" href="/" class=" text-white d-block m-2">
                                        <button type="button"
                                            class="btn btn-primary waves-effect waves-light text-white">Kembali ke
                                            Pendaftaran</button>
                                    </a>
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





                                    <div id="previewImage d-none"></div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>

<script src="https://files.codepedia.info/files/uploads/iScripts/html2canvas.js">
</script>

<script>
    $(document).ready(function() {

// Global variable
var element = $("#html-content-holder");

// Global variable
var getCanvas;

function preview() {
return html2canvas(element, {
scale: 2,
useCORS: true,
onrendered: function(canvas) {
$("#previewImage").append(canvas);
getCanvas = canvas;
}
});
}
// $("#btn-Preview-Image").on('click', preview());
preview()
$("#btn-Convert-Html2Image").on('click', function() {
    
var imgageData =
getCanvas.toDataURL("image/png");

// Now browser starts downloading
// it instead of just showing it
var newData = imgageData.replace(
/^data:image\/png/, "data:application/octet-stream");

$("#btn-Convert-Html2Image").attr(
"download", "GeeksForGeeks.png").attr(
"href", newData);
});
});
</script>

@endsection