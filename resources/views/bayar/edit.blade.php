@extends('layout.main')

@section('judulSitus', "Halaman Ubah Pembayaran")

@section('konten')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="mt-0 header-title">Ubah Data Pembayaran</h4>
        <p class="text-muted mb-4">
          Silahkan ubah data berikut sesuai dengan kebutuhan
        </p>
        <form method="post" action="/bayar/{{$bayar->id}}">
          @method("patch")
          @csrf




          <div class="form-group">
            <label for="id_perawat">Nama Perawat</label>

            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" id="id_perawat"
              name="id_perawat">
              <option disabled value>Pilih Nama Perawat</option>
              @foreach ($perawat as $item)
              @if ($bayar->id_perawat == $item->id)

              <option value="{{$item->id}}" selected>{{$item->nama_perawat}}</option>
              @else
              <option value="{{$item->id}}">{{$item->nama_perawat}}</option>
              @endif
              @endforeach


            </select>
          </div>
          <div class="form-group">

            <label for="id_pasien">Nama Pasien</label>

            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" id="id_pasien"
              name="id_pasien">
              <option disabled value>Pilih Nama Pasien</option>
              @foreach ($pasien as $item)
              @if ($bayar->id_pasien == $item->id)

              <option value="{{$item->id}}" selected>{{$item->nama_pasien}}</option>
              @else
              <option value="{{$item->id}}">{{$item->nama_pasien}}</option>
              @endif
              @endforeach

            </select>
          </div>


          <div class="form-group">
            <label for="jumlah_harga">Jumlah Pembayaran</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">Rp</span>
              </div>
              <input type="number" id="jumlah_harga" name="jumlah_harga" class="form-control uang"
                placeholder="1.000.000" value="{{$bayar ->jumlah_harga}}">
              <div class="input-group-append">
                <span class="input-group-text">,00</span>
              </div>
            </div>




            <button type="submit" class="btn btn-primary my-2">
              Edit
            </button>
            <a href="{{url('/bayar')}}">
              <button type="button" class="btn btn-danger">
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