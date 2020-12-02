@extends('layout.main')

@section('judulSitus', "Halaman Manajemen Daftar Selesai Pasien")

@section('konten')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="alert icon-custom-alert alert-outline-dark alert-dark-shadow" role="alert">

                    <div class="alert-text d-flex justify-content-between">
                        <h5> <span class="mdi mdi-calendar-clock mr-2"></span> {{$today}}</h5>
                        <h5><span class="mdi mdi-clock-outline mr-2"></span><span id="theTime"></span></h5>
                    </div>
                </div>
                <h2 class="text-center">Daftar Pasien Selesai</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="mt-4">
                            <div class="card" id="">
                                <div class="card-body bg-gradient1">
                                    <div class="">
                                        <div class="card-icon">
                                            <i class="mdi mdi-stethoscope"></i>
                                        </div>
                                        <h3 class="text-white">Total Antrian</h3>
                                        <h1 class="font-weight-bold text-white">{{$total_pasien}} <span
                                                class="text-white mb-0 font-16">Pasien</span></h1>

                                    </div>
                                </div>
                                <!--end card-body-->

                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-4">
                            <div class="card" id="">
                                <div class="card-body bg-gradient2">
                                    <div class="">
                                        <div class="card-icon">
                                            <i class="mdi mdi-stethoscope"></i>
                                        </div>
                                        <h3 class="text-white">Antrian Tersisa</h3>
                                        <h1 class="font-weight-bold text-white">{{$total_pasien - $no_urut}}<span
                                                class="text-white mb-0 font-16"> Pasien</span></h1>

                                    </div>
                                </div>
                                <!--end card-body-->

                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mt-4">
                            <div class="card" id="">
                                <div class="card-body bg-gradient3">
                                    <div class="">
                                        <div class="card-icon">
                                            <i class="mdi mdi-stethoscope"></i>
                                        </div>
                                        <h3 class="text-white">Antrian Berlangsung</h3>
                                        <h1 class="font-weight-bold text-white"><span class="font-16">No.</span>
                                            {{$no_urut}}
                                        </h1>

                                    </div>
                                </div>
                                <!--end card-body-->

                                <!--end card-body-->
                            </div>
                            <!--end card-->
                        </div>
                    </div>
                </div>

                {{-- total pasien --}}
                <div class="row mt-4">
                    <div class="col-lg-10">
                        <h4 class="mt-0 header-title">Data Pasien Selesai</h4>
                        <p class="text-muted mb-4 font-13">Tabel berikut menyediakan informasi detail identitas
                            pasien.
                        </p>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{url('/daftar/create')}}"
                            class="btn btn-lg btn-success waves-effect waves-light text-light d-block"><i
                                class="mdi mdi-pencil-box-outline mr-1"></i>Tambah Data</a>
                    </div>
                </div>

                <div class="row">
                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Tanggal Masuk</th>
                                <th>Poliklinik</th>
                                <th>Dokter</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach ($pasien_selesai as $item)
                            <tr>
                                <td>{{$item->nama_pasien}}</td>
                                <td>{{$item->alamat_pasien}}</td>
                                <td>{{$item->tgl_periksa}}</td>
                                <td>{{$item->poli->nama_poli}}</td>
                                <td>{{$item->dokter->nama_dokter}}</td>
                                <td>

                                    <a href="/daftar/{{$item->id}}"
                                        class="btn m-1 btn-sm btn-primary waves-effect waves-light text-light"><i
                                            class="mdi mdi-information-outline mr-1"></i>Detail</a>


                                    <a href="/daftar/{{$item->id}}/edit"
                                        class="btn m-1 btn-sm btn-info waves-effect waves-light text-light"><i
                                            class="mdi mdi-circle-edit-outline mr-1"></i>Ubah</a>

                                    <form action="/daftar/{{$item->id}}" method="post" class="d-inline cek">
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
                </div>
                {{-- end total pasien --}}
                <h5 class="text-center my-3">Menu Navigasi detail Daftar Pasien</h5>
                <div class="row d-flex justify-content-center">
                    <a href="{{url('/daftar_aktif')}}"
                        class="btn btn-lg btn-primary waves-effect waves-light text-light d-block m-2">Daftar Aktif</a>
                    <a href="{{url('/daftar')}}"
                        class="btn btn-lg btn-secondary waves-effect waves-light text-light d-block m-2 text-dark">Daftar
                        Total</a>
                    <a href="{{url('/daftar_selesai')}}"
                        class="btn btn-lg btn-success waves-effect waves-light text-light d-block m-2">Daftar
                        Selesai</a>
                </div>
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

        var clockID;
        var yourTimeZoneFrom = 7.00; //time zone value where you are at
        
        var d = new Date();
        //get the timezone offset from local time in minutes
        var tzDifference = yourTimeZoneFrom * 60 + d.getTimezoneOffset();
        //convert the offset to milliseconds, add to targetTime, and make a new Date
        var offset = tzDifference * 60 * 1000;
        
        function UpdateClock() {
        var tDate = new Date(new Date().getTime()+offset);
        var in_hours = tDate.getHours()
        var in_minutes=tDate.getMinutes();
        var in_seconds= tDate.getSeconds();
        
        if(in_minutes < 10) in_minutes='0' +in_minutes; if(in_seconds<10) in_seconds='0' +in_seconds; if(in_hours<10)
            in_hours='0' +in_hours; document.getElementById('theTime').innerHTML="" + in_hours + ":" + in_minutes + ":" +
            in_seconds; } function StartClock() { clockID=setInterval(UpdateClock, 500); } function KillClock() {
            clearTimeout(clockID); } window.onload=function() { StartClock(); }
</script>
@endsection