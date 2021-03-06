@extends('layout.main')

@section('judulSitus', "Halaman Manajemen Ruang")

@section('konten')
<div class="row">
<div class="col">
                <div class="card">
                  <div class="card-body"> 
                    <h4 class="mt-0 header-title">Tambah Data Ruang</h4>
                    <p class="text-muted mb-4">
                      Silahkan isikan data berikut
                    </p>
                    <form method="post" action="/ruang">
                        @csrf
                      <div class="form-group">
                        <label for="nama">Nama Ruangan</label>
                        <input
                          type="text"
                          class="form-control"
                          id="nama"
                          name="nama_ruang"
                          value="{{old('nama_ruang')}}"
                          placeholder="Melati 1"
                        />
                      </div>
                      <div class="form-group">
                        <label for="alamat">Nama Gedung</label>
                        <input
                          type="text"
                          class="form-control"
                          id="alamat"
                          name="nama_gedung"
                          value="{{old('nama_gedung')}}"
                          placeholder="Artesia"
                        />
                      </div>
                 
                     
                      <button type="submit" class="btn btn-primary">
                        Tambah
                      </button>
                      <a href="{{url('/ruang')}}">
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