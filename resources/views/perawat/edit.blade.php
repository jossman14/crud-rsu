@extends('layout.main')

@section('judulSitus', "Halaman Ubah Data Perawat")
 
@section('konten')
<div class="row">
<div class="col">
                <div class="card">
                  <div class="card-body">
                    <h4 class="mt-0 header-title">Ubah Data Perawat</h4>
                    <p class="text-muted mb-4">
                      Silahkan ubah data berikut sesuai dengan kebutuhan
                    </p>
                  <form method="post" action="/perawat/{{$perawat->id}}">
                        @method("patch")
                        @csrf
                      <div class="form-group">
                        <label for="nama">Nama</label>
                        <input
                          type="text"
                          class="form-control"
                          id="nama"
                          name="nama_perawat"
                          value="{{$perawat ->nama_perawat}}"
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
                          value="{{$perawat ->alamat_perawat}}"
                          placeholder="Masaran, Sragen"
                        />
                      </div>
                    
            


                    <label for="jam_jaga">Jam Jaga</label>

          <select class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;"id="jam_jaga" name="jam_jaga"
              >
            <option disabled value >Pilih Jam Jaga</option>
            @foreach ($shift as $item)
            @if ($perawat->jam_jaga == $item->id)
            <option value="{{$item->id}}" selected>{{$item->nama_shift}}</option>
            @else
            <option value="{{$item->id}}">{{$item->nama_shift}}</option>
            @endif
            @endforeach


          </select>

                      <button type="submit" class="btn btn-primary mt-4">
                        Edit
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