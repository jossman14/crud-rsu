@extends('layout.main')

@section('judulSitus', "Halaman Ubah Data inap")

@section('konten')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="mt-0 header-title">Ubah Data Rawat Inap</h4>
        <p class="text-muted mb-4">
          Silahkan ubah data berikut sesuai dengan kebutuhan
        </p>
        <form method="post" action="/inap/{{$inap->id}}">
          @method("patch")
          @csrf
          <div class="form-group">
            <label for="id_ruang">Nama Ruangan</label>

            <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;" id="id_ruang"
              name="id_ruang">
              <option disabled value>Pilih Nama Ruangan</option>
              @foreach ($ruang as $item)
              @if ($inap->id_ruang == $item->id)
              <option value="{{$item->id}}" selected>{{$item->nama_ruang}}</option>
              @else
              <option value="{{$item->id}}">{{$item->nama_ruang}}</option>
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
              @if ($inap->id_pasien == $item->id)
              <option value="{{$item->id}}" selected>{{$item->nama_pasien}}</option>
              @else

              <option value="{{$item->id}}">{{$item->nama_pasien}}</option>
              @endif

              @endforeach


            </select>
          </div>


          <button type="submit" class="btn btn-primary">
            Edit
          </button>
          <a href="{{url('/inap')}}">
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