<?php

namespace App\Http\Controllers;

use App\Data;
use App\Pasien;
use Illuminate\Http\Request;

class DatasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function show(Data $data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function edit(Data $data)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Data $data)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Data  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy(Data $data)
    {
        //
    }

    public function get()
    {
        $data = Pasien::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Pasien::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {
        $data = Pasien::create($request->all());
        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Pasien::where("id", $id)->first();
        if ($data) {
            $data->nama_pasien = $request->nama_pasien ? $request->nama_pasien : $data->nama_pasien;
            $data->alamat_pasien = $request->alamat_pasien ? $request->alamat_pasien : $data->alamat_pasien;
            $data->tgl_periksa = $request->tgl_periksa ? $request->tgl_periksa : $data->tgl_periksa;
            $data->keluhan = $request->keluhan ? $request->keluhan : $data->keluhan;
            $data->id_dokter = $request->id_dokter ? $request->id_dokter : $data->id_dokter;
            $data->jenis_penjamin = $request->jenis_penjamin ? $request->jenis_penjamin : $data->jenis_penjamin;
            $data->obat = $request->obat ? $request->obat : $data->obat;
            $data->jenis_kelamin = $request->jenis_kelamin ? $request->jenis_kelamin : $data->jenis_kelamin;
            $data->no_hp = $request->no_hp ? $request->no_hp : $data->no_hp;
            $data->tgl_lahir = $request->tgl_lahir ? $request->tgl_lahir : $data->tgl_lahir;

            $data->save();

            return response()->json([
                "pesan" => "behasil gan pesan put",
                "data" => $data
            ]);
        } else {
            return response()->json([
                "pesan" => "gagal gan pesan put"
            ], 400);
        }
    }
    public function delete($id)
    {
        $data = Pasien::where("id", $id)->first();

        if ($data) {
            $data->delete();
            return response()->json([
                "pesan" => "behasil gan pesan delete",
            ]);
        } else {
            return response()->json([
                "pesan" => "gagal gan pesan put"
            ], 400);
        }
    }
}
