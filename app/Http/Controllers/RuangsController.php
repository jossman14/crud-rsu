<?php

namespace App\Http\Controllers;

use App\Ruang;
use Illuminate\Http\Request;

class RuangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruang = Ruang::all();
        return view("ruang.index", ["ruang" => $ruang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("ruang.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ruang::create($request->all());

        return redirect("/ruang")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show(Ruang $ruang)
    {
        return view('ruang.show', compact('ruang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function edit(Ruang $ruang)
    {
        return view('ruang.edit', compact('ruang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ruang $ruang)
    {
        Ruang::where("id", $ruang->id)
            ->update([
                "nama_gedung" => $request->nama_gedung ? $request->nama_gedung : $ruang->nama_gedung,
                "nama_ruang" => $request->nama_ruang ? $request->nama_ruang : $ruang->nama_ruang,
            ]);


        return redirect("/ruang")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ruang $ruang)
    {
        Ruang::destroy($ruang->id);
        return redirect("/ruang")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function get()
    {
        $data = Ruang::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Ruang::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {


        $data = Ruang::create($request->all());

        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Ruang::where("id", $id)->first();

        if ($data) {
            $data->nama_ruang = $request->nama_ruang ? $request->nama_ruang : $data->nama_ruang;
            $data->nama_gedung = $request->nama_gedung ? $request->nama_gedung : $data->nama_gedung;

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
        $data = Ruang::where("id", $id)->first();

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
