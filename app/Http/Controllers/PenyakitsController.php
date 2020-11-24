<?php

namespace App\Http\Controllers;

use App\Penyakit;
use Illuminate\Http\Request;

class PenyakitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyakit = Penyakit::all();
        return view("spesialisasi.index", ["penyakit" => $penyakit]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("spesialisasi.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Penyakit::create($request->all());

        return redirect("/spesialisasi")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function show(Penyakit $spesialisasi)
    {
        return view('spesialisasi.show', compact('spesialisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyakit $spesialisasi)
    {
        // return $spesialisasi;
        return view('spesialisasi.edit', compact('spesialisasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyakit $spesialisasi)
    {
        Penyakit::where("id", $spesialisasi->id)
            ->update([
                "nama_penyakit" => $request->nama_penyakit ? $request->nama_penyakit : $spesialisasi->nama_penyakit,
            ]);


        return redirect("/spesialisasi")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penyakit  $penyakit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyakit $spesialisasi)
    {
        Penyakit::destroy($spesialisasi->id);
        return redirect("/spesialisasi")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function get()
    {
        $data = Penyakit::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Penyakit::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {


        $data = Penyakit::create($request->all());

        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Penyakit::where("id", $id)->first();

        if ($data) {
            $data->nama_penyakit = $request->nama_penyakit ? $request->nama_penyakit : $data->nama_penyakit;

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
        $data = Penyakit::where("id", $id)->first();

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
