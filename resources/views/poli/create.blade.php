@extends('layout.main')

@section('judulSitus', "Halaman Manajemen Poliklinik")

@section('konten')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="mt-0 header-title">Tambah Data Poliklinik</h4>
        <p class="text-muted mb-4">
          Silahkan isikan data berikut
        </p>
        <form method="post" action="/poli">
          @csrf
          <div class="form-group">
            <label for="nama">Nama Poliklinik</label>
            <input type="text" class="form-control" id="nama" name="nama_poli" value="{{old('nama_poli')}}"
              placeholder="Nama Poliklinik" />
          </div>



          <button type="submit" class="btn btn-primary">
            Tambah
          </button>
          <a href="{{url('/poli')}}">
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