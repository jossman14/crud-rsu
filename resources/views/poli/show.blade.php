@extends('layout.main')

@section('judulSitus', "Halaman Manajemen Poliklinik")

@section('konten')


<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="card neoGan">
                        <h5 class="card-header bg-primary text-white mt-0">Detail Informasi Poliklinik</h5>
                        <div class="card-body">
                            <h5 class="card-title text-center"> {{$poli->id}}</h5>

                            <div class="table-responsive">
                                <table class="table table-bordered mb-0 table-centered">

                                    <tbody>
                                        <tr>
                                            <td>Nama Gedung</td>
                                            <td>{{$poli->nama_poli}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end /table-->
                            </div>
                            <!--end /tableresponsive-->
                        </div>
                        <!--end card-body-->
                        <div class="d-flex justify-content-between m-3">

                            <p class="">Terakhir update: {{$poli->updated_at}}</p>
                            <a href="{{url('/poli')}}">
                                <button type="button" class="btn btn-danger">
                                    Kembali
                                </button>
                            </a>
                        </div>
                    </div>
                    <!--end card-->
                </div>
            </div>
            <!--end card-body-->
        </div>
        <!--end card-->
    </div>
    <!--end col-->
</div>
@endsection