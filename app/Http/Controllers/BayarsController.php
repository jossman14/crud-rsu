<?php

namespace App\Http\Controllers;

use App\Bayar;
use App\Pasien;
use App\Perawat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BayarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bayar = Bayar::with('pasien', "perawat")->get();
        // return $bayar;

        return view("bayar.index", ["bayar" => $bayar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasien = Pasien::all();
        $perawat = Perawat::all();
        return view("bayar.create", compact("pasien", "perawat"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'jumlah_harga' => 'required|numeric',
        // ]);
        Bayar::create($request->all());


        return redirect("/bayar")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function show(Bayar $bayar)
    {
        return view('bayar.show', compact('bayar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function edit(Bayar $bayar)
    {
        $pasien = Pasien::all();
        $perawat = Perawat::all();
        return view('bayar.edit', compact('bayar', "pasien", "perawat"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bayar $bayar)
    {
        Bayar::where("id", $bayar->id)
            ->update([
                "id_perawat" => $request->id_perawat ? $request->id_perawat : $bayar->id_perawat,
                "id_pasien" => $request->id_pasien ? $request->id_pasien : $bayar->id_pasien,
                "jumlah_harga" => $request->jumlah_harga ? $request->jumlah_harga : $bayar->jumlah_harga

            ]);

        return redirect("/bayar")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bayar  $bayar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bayar $bayar)
    {
        Bayar::destroy($bayar->id);
        return redirect("/bayar")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function get()
    {
        $data = Bayar::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Bayar::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {


        $data = Bayar::create($request->all());

        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Bayar::where("id", $id)->first();

        if ($data) {
            $data->id_perawat = $request->id_perawat ? $request->id_perawat : $data->id_perawat;
            $data->id_pasien = $request->id_pasien ? $request->id_pasien : $data->id_pasien;
            $data->jumlah_harga = $request->jumlah_harga ? $request->jumlah_harga : $data->jumlah_harga;


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
        $data = Bayar::where("id", $id)->first();

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
