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

@section('judulSitus', "Halaman Ubah Data Pasien")

@section('konten')
<div class="row">
<div class="col">
                <div class="card">
                  <div class="card-body">
                    <h4 class="mt-0 header-title">Ubah Data Pasien</h4>
                    <p class="text-muted mb-4">
                      Silahkan ubah data berikut sesuai dengan kebutuhan
                    </p>
                  <form method="post" action="/pasien/{{$pasien->id}}">
                        @method("patch")
                        @csrf
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input
                          type="text"
                          class="form-control"
                          id="nama"
                          name="nama_pasien"
                          value="{{$pasien ->nama_pasien}}"
                          placeholder="Ahmad Budiyanto"
                        />
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat (Kecamatan, Kota/Kabupaten)</label>
                        <input
                          type="text"
                          class="form-control"
                          id="alamat"
                          name="alamat_pasien"
                          value="{{$pasien ->alamat_pasien}}"
                          placeholder="Karangmalang, Sragen"
                        />
                      </div>
                      <div class="form-group">
                        <label for="mdate">Tanggal Periksa</label>
                         <input type="text" id="mdate" class="form-control" placeholder="2020-11-22" data-dtp="dtp_PLUKp" value="{{$pasien ->tgl_periksa}}" name="tgl_periksa">

                              <label for="keluhan">Poliklinik</label>

          <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"id="keluhan" name="keluhan"
              >
            <option disabled value selected>Pilih Poliklinik</option>
             @foreach ($poli as $item)
            @if ($pasien->keluhan == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nama_poli}}</option>
            @else
            <option value="{{$item->id}}">{{$item->nama_poli}}</option>
            @endif
            @endforeach
          </select>
          
          <label class="mt-3" for="id_dokter">Dokter</label>

          <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"id="id_dokter" name="id_dokter"
              >
             @foreach ($dokter as $itemDokter)
            @if ($pasien->id_dokter == $itemDokter->id)
            <option value="{{$itemDokter->id}}" selected>{{$itemDokter->nama_dokter}}</option>
            @else
            <option value="{{$itemDokter->id}}">{{$itemDokter->nama_dokter}}</option>
            @endif
            @endforeach


          </select>
                    
                      
                      <button type="submit" class="btn btn-primary mt-4">
                        Edit
                      </button>
                    <a href="{{url('/pasien')}}">
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