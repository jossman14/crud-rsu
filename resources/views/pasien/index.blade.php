@extends('layout.main')

@section('judulSitus', "Halaman Manajemen Pasien")

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-10">
                        <h4 class="mt-0 header-title">Data Pasien</h4>
                        <p class="text-muted mb-4 font-13">Tabel berikut menyediakan informasi detail identitas pasien.
                        </p>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{url('/pasien/create')}}"
                            class="btn btn-lg btn-success waves-effect waves-light text-light d-block"><i
                                class="mdi mdi-pencil-box-outline mr-1"></i>Tambah Data</a>
                    </div>
                </div>


                {{-- <div class="table-responsive"> --}}
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>

                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Periksa</th>
                            <th>Poliklinik</th>
                            <th>Dokter</th>
                            <th>Jenis Penjamin</th>
                            <th>Obat</th>
                            <th>No HP</th>
                            <th>No Urut Periksa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach ($pasien as $item)
                        <tr>
                            {{-- $fillable = ["nama_pasien", "alamat_pasien", "tgl_lahir", "jenis_kelamin",
                                    "tgl_periksa","keluhan",
                                    "id_dokter",
                                    "jenis_penjamin", "obat",
                                    "no_hp", "no_urut"]; --}}
                            <td>{{$item->nama_pasien}}</td>
                            <td>{{$item->alamat_pasien}}</td>
                            <td>{{$item->tgl_lahir}}</td>
                            <td>{{$item->jenis_kelamin}}</td>
                            <td>{{$item->tgl_periksa}}</td>
                            <td>{{$item->poli->nama_poli}}</td>
                            <td>{{$item->dokter->nama_dokter}}</td>
                            <td>{{$item->jenis_penjamin}}</td>
                            <td>{{$item->obat}}</td>
                            <td>{{$item->no_hp}}</td>
                            <td>{{$item->no_urut}}</td>
                            <td>

                                <a href="/pasien/{{$item->id}}"
                                    class="btn m-1 btn-sm btn-primary waves-effect waves-light text-light"><i
                                        class="mdi mdi-information-outline mr-1"></i>Detail</a>


                                <a href="/pasien/{{$item->id}}/edit"
                                    class="btn m-1 btn-sm btn-info waves-effect waves-light text-light"><i
                                        class="mdi mdi-circle-edit-outline mr-1"></i>Ubah</a>

                                <form action="/pasien/{{$item->id}}" method="post" class="d-inline cek">
                                    @method('delete')
                                    @csrf
                                    <button type="button"
                                        class="btn m-1 btn-sm btn-danger waves-effect waves-light text-light sa-warning-hapus btn-delete"><i
                                            class="mdi mdi-delete-sweep-outline mr-1"></i>Hapus</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- </div> --}}
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@section('js')
@if (session("hasil"))
<script>
    $(document).ready(function(){
                swal({
                    title: "Selamat",
                    text: "{{session('hasil')}}",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger ml-2 d-none",
                });
            })
</script>
@endif
<script>
    $(document).ready(function(){

            $("#datatable-buttons_filter").addClass("float-right");
            $(".buttons-colvis").addClass("d-none");
            //Warning Message
        $(document).on("click", "form.cek", function () {
            var form = $(this);
            console.log("clik nin gan")
            swal({
                title: "Apakah anda yakin?",
                text: "Anda tidak akan dapat mengembalikan data ini!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-success delete",
                cancelButtonClass: "btn btn-danger ml-2",
                confirmButtonText: "Iya",
                cancelButtonText: "Tidak",
            }).then(function (e) {
                if (e.value == true) {
                    form.submit();
                }
            })
        })
        });
</script>
@endsection