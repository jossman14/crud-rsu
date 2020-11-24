<?php

namespace App\Http\Controllers;

use App\Poli;
use Illuminate\Http\Request;

class PolisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poli = Poli::all();
        return view("poli.index", ["poli" => $poli]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("poli.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Poli::create($request->all());

        return redirect("/poli")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function show(poli $poli)
    {
        return view('poli.show', compact('poli'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function edit(poli $poli)
    {
        // return $poli;
        return view('poli.edit', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, poli $poli)
    {
        Poli::where("id", $poli->id)
            ->update([
                "nama_poli" => $request->nama_poli ? $request->nama_poli : $poli->nama_poli,
            ]);


        return redirect("/poli")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poli  $poli
     * @return \Illuminate\Http\Response
     */
    public function destroy(poli $poli)
    {
        Poli::destroy($poli->id);
        return redirect("/poli")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function get()
    {
        $data = Poli::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Poli::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {


        $data = Poli::create($request->all());

        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Poli::where("id", $id)->first();

        if ($data) {
            $data->nama_poli = $request->nama_poli ? $request->nama_poli : $data->nama_poli;

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
        $data = Poli::where("id", $id)->first();

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
