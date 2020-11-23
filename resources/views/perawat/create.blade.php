@extends('layout.main')

@section('judulSitus', "Halaman Manajemen Perawat")

@section('konten')
<div class="row">
<div class="col">
                <div class="card">
                  <div class="card-body">
                    <h4 class="mt-0 header-title">Tambah Data Perawat</h4>
                    <p class="text-muted mb-4">
                      Silahkan isikan data berikut
                    </p>
                    <form method="post" action="/perawat"> 
                        @csrf
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input
                          type="text"
                          class="form-control"
                          id="nama"
                          name="nama_perawat"
                          value="{{old('nama_perawat')}}"
                          placeholder="Maemunah Soji"
                        />
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat (Kecamatan, Kota/Kabupaten)</label>
                        <input
                          type="text"
                          class="form-control"
                          id="alamat"
                          name="alamat_perawat"
                          value="{{old('alamat_perawat')}}"
                          placeholder="Masaran, Sragen"
                        />
                      </div>
                 
                         <label for="jam_jaga">Jam Jaga</label>

          <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"id="jam_jaga" name="jam_jaga"
              >
            <option disabled value selected>Pilih Jam Jaga</option>
            @foreach ($shift as $item)
            <option value="{{$item->id}}">{{$item->nama_shift}}</option> 
            @endforeach


          </select>

                      <button type="submit" class="btn btn-primary mt-4">
                        Tambah
                      </button>
                      <a href="{{url('/perawat')}}">
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
{{-- <script src="../../layout/assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../../layout/assets/plugins/timepicker/tempusdominus-bootstrap-4.js"></script>
<script src="../../layout/assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
<script src="../../layout/assets/plugins/clockpicker/jquery-clockpicker.min.js"></script>
<script src="../../layout/assets/plugins/colorpicker/jquery-asColor.js"></script>
<script src="../../layout/assets/plugins/colorpicker/jquery-asGradient.js"></script>
<script src="../../layout/assets/plugins/colorpicker/jquery-asColorPicker.min.js"></script> --}}
<script src="../../layout/assets/plugins/select2/select2.min.js"></script>

{{-- <script src="../../layout/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="../../layout/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="../../layout/assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="../../layout/assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script> --}}

{{-- <script src="../../layout/assets/pages/jquery.forms-advanced.js"></script> --}}

<script>
  $(".select2").select2({});
</script>

@endsection