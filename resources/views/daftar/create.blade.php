@extends('layout.main')

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
@section('judulSitus', "Halaman Tambah Data Pasien")

@section('konten')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="mt-0 header-title">Tambah Data Pasien</h4>
        <p class="text-muted mb-4">
          Silahkan isikan data berikut
        </p>
        <form method="post" action="/daftar">
          @csrf
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama_pasien" value="{{old('nama_pasien')}}"
              placeholder="Ahmad Budiyanto" />
          </div>
          <div class="form-group">
            <label for="alamat">Alamat (Kecamatan, Kota/Kabupaten)</label>
            <input type="text" class="form-control" id="alamat" name="alamat_pasien" value="{{old('alamat_pasien')}}"
              placeholder="Karangmalang, Sragen" />
          </div>
          <div class="form-group">
            {{-- <label for="mdate">Tanggal Periksa</label> --}}


            <input type="hidden" id="mdate" class="form-control" placeholder="2020-11-22" data-dtp="dtp_PLUKp"
              value="{{date("Y-m-d")}}" name="tgl_periksa">
          </div>





          <label for="keluhan">Poliklinik</label>

          <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" id="keluhan"
            name="keluhan">
            <option disabled value selected>Pilih Poliklinik</option>
            @foreach ($poli as $item)
            <option value="{{$item->id}}">{{$item->nama_poli}}</option>
            @endforeach
          </select>

          <label class="mt-3" for="id_dokter">Dokter</label>

          <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" id="id_dokter"
            name="id_dokter">
            <option disabled value selected>Pilih Dokter</option>
            @foreach ($dokter as $itemDokter)
            <option value="{{$itemDokter->id}}">{{$itemDokter->nama_dokter}}</option>
            @endforeach


          </select>


          <button type="submit" class="btn btn-primary mt-4">
            Tambah
          </button>
          <a href="{{url('/daftar')}}">
            <button type="button" class="btn btn-danger mt-4">
              Kembali
            </button>
          </a>
        </form>
      </div>
      <!--end card-body-->
    </div>
    <!--end card-->
  </div>
</div>
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