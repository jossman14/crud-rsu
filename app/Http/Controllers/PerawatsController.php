<?php

namespace App\Http\Controllers;

use App\Perawat;
use App\Shift;
use Illuminate\Http\Request;

class PerawatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perawat = Perawat::with('shift')->get();
        // return $perawat;

        return view("perawat.index", ["perawat" => $perawat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shift = Shift::all();
        return view("perawat.create", compact('shift'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Perawat::create($request->all());

        return redirect("/perawat")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perawat  $perawat
     * @return \Illuminate\Http\Response
     */
    public function show(Perawat $perawat)
    {
        $perawat = Perawat::with("shift")->where("id", $perawat->id)->first();

        return view('perawat.show', compact('perawat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perawat  $perawat
     * @return \Illuminate\Http\Response
     */
    public function edit(Perawat $perawat)
    {
        $shift = Shift::all();
        $per = Perawat::where("id", $perawat->id)->get();
        return view('perawat.edit', compact('perawat', "shift", "per"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perawat  $perawat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perawat $perawat)
    {
        Perawat::where("id", $perawat->id)
            ->update([
                "nama_perawat" => $request->nama_perawat ? $request->nama_perawat : $perawat->nama_perawat,
                "alamat_perawat" => $request->alamat_perawat ? $request->alamat_perawat : $perawat->alamat_perawat,
                "jam_jaga" => $request->jam_jaga ? $request->jam_jaga : $perawat->jam_jaga

            ]);


        return redirect("/perawat")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perawat  $perawat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perawat $perawat)
    {
        Perawat::destroy($perawat->id);
        return redirect("/perawat")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function get()
    {
        $data = Perawat::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Perawat::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {


        $data = Perawat::create($request->all());

        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Perawat::where("id", $id)->first();

        if ($data) {
            $data->nama_perawat = $request->nama_perawat ? $request->nama_perawat : $data->nama_perawat;
            $data->alamat_perawat = $request->alamat_perawat ? $request->alamat_perawat : $data->alamat_perawat;
            $data->jam_jaga = $request->jam_jaga ? $request->jam_jaga : $data->jam_jaga;


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
        $data = Perawat::where("id", $id)->first();

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
