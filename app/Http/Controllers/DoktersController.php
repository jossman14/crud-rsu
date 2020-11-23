<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Penyakit;
use Illuminate\Http\Request;

class DoktersController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokter = Dokter::with('penyakit')->latest()->get();
        // return $dokter;
        return view("dokter.index", ["dokter" => $dokter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peny = Penyakit::all();
        return view("dokter.create", compact('peny'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dokter::create($request->all());

        return redirect("/dokter")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function show(Dokter $dokter)
    {
        $dokter = Dokter::with("penyakit")->where("id", $dokter->id)->first();

        return view('dokter.show', compact('dokter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokter $dokter)
    {
        $peny = Penyakit::all();
        $dok = Dokter::where("id", $dokter->id)->get();
        return view('dokter.edit', compact('dokter', "peny", "dok"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokter $dokter)
    {
        Dokter::where("id", $dokter->id)
            ->update([
                "nama_dokter" =>  $request->nama_dokter ? $request->nama_dokter : $dokter->nama_dokter,
                "alamat_dokter" =>  $request->alamat_dokter ? $request->alamat_dokter : $dokter->alamat_dokter,
                "spesialisasi_dokter_id" =>  $request->spesialisasi_dokter_id ? $request->spesialisasi_dokter_id : $dokter->spesialisasi_dokter_id
            ]);


        return redirect("/dokter")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dokter  $dokter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokter $dokter)
    {
        Dokter::destroy($dokter->id);
        return redirect("/dokter")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function get()
    {
        $data = Dokter::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Dokter::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {


        $data = Dokter::create($request->all());

        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Dokter::where("id", $id)->first();

        if ($data) {
            $data->nama_dokter = $request->nama_dokter ? $request->nama_dokter : $data->nama_dokter;
            $data->alamat_dokter = $request->alamat_dokter ? $request->alamat_dokter : $data->alamat_dokter;
            $data->tgl_periksa = $request->tgl_periksa ? $request->tgl_periksa : $data->tgl_periksa;
            $data->keluhan = $request->keluhan ? $request->keluhan : $data->keluhan;
            $data->id_dokter = $request->id_dokter ? $request->id_dokter : $data->id_dokter;

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
        $data = Dokter::where("id", $id)->first();

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
