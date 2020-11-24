@extends('layout.main')

@section('judulSitus', "Halaman Ubah Data Shift")

@section('konten')
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="mt-0 header-title">Ubah Data Shift</h4>
        <p class="text-muted mb-4">
          Silahkan ubah data berikut sesuai dengan kebutuhan
        </p>
        <form method="post" action="/shift/{{$shift->id}}">
          @method("patch")
          @csrf
          <div class="form-group">
            <label for="nama">Nama Shift</label>
            <input type="text" class="form-control" id="nama" name="nama_shift" value="{{$shift ->nama_shift}}"
              placeholder="Nama Shift" />
          </div>



          <button type="submit" class="btn btn-primary">
            Edit
          </button>
          <a href="{{url('/shift')}}">
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