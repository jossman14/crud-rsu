<?php

namespace App\Http\Controllers;

use App\Inap;
use App\Pasien;
use App\Ruang;
use Illuminate\Http\Request;

class InapsController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inap = Inap::with('pasien', "ruang")->get();
        // return $inap;
        return view("inap.index", ["inap" => $inap]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $inap = Inap::with('pasien', "ruang")->where("terpakai", 1)->get();
        $pasien = Pasien::where("dirawat", 0)->get();
        $ruang = Ruang::where("terpakai", 0)->get();
        // return $ruang;

        return view("inap.create", compact("pasien", "ruang"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasien = Pasien::where("id", $request->id_pasien)->first();

        if ($pasien->dirawat == 0) {
            $pasien->dirawat = 1;
        } else {
            $pasien->dirawat = 0;
        }
        $pasien->save();

        $ruang = Ruang::where("id", $request->id_ruang)->first();

        if ($ruang->terpakai == 0) {
            $ruang->terpakai = 1;
        } else {
            $ruang->terpakai = 0;
        }
        $ruang->save();

        Inap::create($request->all());

        return redirect("/inap")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inap  $inap
     * @return \Illuminate\Http\Response
     */
    public function show(Inap $inap)
    {
        $inap = Inap::with('pasien', "ruang")->first();
        return view('inap.show', compact('inap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inap  $inap
     * @return \Illuminate\Http\Response
     */
    public function edit(Inap $inap)
    {
        $pasien = Pasien::all();
        $ruang = Ruang::all();

        return view('inap.edit', compact('inap', "pasien", "ruang"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inap  $inap
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inap $inap)
    {

        Inap::where("id", $inap->id)
            ->update([
                "id_pasien" => $request->id_pasien ? $request->id_pasien : $inap->id_pasien,
                "id_ruang" => $request->id_ruang ? $request->id_ruang : $inap->id_ruang
            ]);

        if ($inap->id_pasien != $request->id_pasien) {
            $pasien = Pasien::where("id", $inap->id_pasien)->first();

            if ($pasien->dirawat == 0) {
                $pasien->dirawat = 1;
            } else {
                $pasien->dirawat = 0;
            }
            $pasien->save();

            $pasien = Pasien::where("id", $request->id_pasien)->first();

            if ($pasien->dirawat == 0) {
                $pasien->dirawat = 1;
            } else {
                $pasien->dirawat = 0;
            }
            $pasien->save();
        }

        if ($request->id_ruang != $inap->id_ruang) {
            $ruang = Ruang::where("id", $inap->id_ruang)->first();

            if ($ruang->terpakai == 0) {
                $ruang->terpakai = 1;
            } else {
                $ruang->terpakai = 0;
            }
            $ruang->save();

            $ruang = Ruang::where("id", $request->id_ruang)->first();

            if ($ruang->terpakai == 0) {
                $ruang->terpakai = 1;
            } else {
                $ruang->terpakai = 0;
            }
            $ruang->save();
        }


        return redirect("/inap")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inap  $inap
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inap $inap)
    {
        $pasien = Pasien::where("id", $inap->id_pasien)->first();

        if ($pasien->dirawat == 0) {
            $pasien->dirawat = 1;
        } else {
            $pasien->dirawat = 0;
        }
        $pasien->save();

        $ruang = Ruang::where("id", $inap->id_ruang)->first();

        if ($ruang->terpakai == 0) {
            $ruang->terpakai = 1;
        } else {
            $ruang->terpakai = 0;
        }
        $ruang->save();

        Inap::destroy($inap->id);
        return redirect("/inap")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function get()
    {
        $data = Inap::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Inap::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {


        $data = Inap::create($request->all());

        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Inap::where("id", $id)->first();

        if ($data) {
            $data->id_ruang = $request->id_ruang ? $request->id_ruang : $data->id_ruang;
            $data->id_pasien = $request->id_pasien ? $request->id_pasien : $data->id_pasien;


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
        $data = Inap::where("id", $id)->first();

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
