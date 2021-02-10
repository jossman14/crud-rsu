<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Pasien;
use App\Poli;
use Illuminate\Http\Request;

class PasiensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $pasien = Pasien::with("dokter", "poli")->get();
        // return $pasien->all();
        return view("pasien.index", ["pasien" => $pasien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $poli = Poli::all();
        $dokter = Dokter::all();
        return view("pasien.create", compact("poli", "dokter"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pasien::create($request->all());

        return redirect("/pasien")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $pasien)
    {
        $pasien = Pasien::with("dokter", "poli")->where("id", $pasien->id)->first();
        // return $pasien;
        // $pasien = $pasien->all();
        return view('pasien.show', compact("pasien"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $pasien)
    {
        $poli = Poli::all();

        $dokter = Dokter::all();

        return view('pasien.edit', compact('pasien', "poli", "dokter"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $pasien)
    {



        Pasien::where("id", $pasien->id)
            ->update([
                "nama_pasien" => $request->nama_pasien ? $request->nama_pasien : $pasien->nama_pasien,
                "alamat_pasien" => $request->alamat_pasien ? $request->alamat_pasien : $pasien->alamat_pasien,
                "tgl_periksa" => $request->tgl_periksa ? $request->tgl_periksa : $pasien->tgl_periksa,
                "keluhan" => $request->keluhan ? $request->keluhan : $pasien->keluhan,
                "id_dokter" => $request->id_dokter ? $request->id_dokter : $pasien->id_dokter,
                "jenis_penjamin" => $request->jenis_penjamin ? $request->jenis_penjamin : $pasien->jenis_penjamin,
                "obat" => $request->obat ? $request->obat : $pasien->obat,
                "jenis_kelamin" => $request->jenis_kelamin ? $request->jenis_kelamin : $pasien->jenis_kelamin,
                "no_hp" => $request->no_hp ? $request->no_hp : $pasien->no_hp,
                "tgl_lahir" => $request->tgl_lahir ? $request->tgl_lahir : $pasien->tgl_lahir,
            ]);

        return redirect("/pasien")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $pasien)
    {
        Pasien::destroy($pasien->id);
        return redirect("/pasien")->with("hasil", "selamat data anda berhasil dihapus!");
    }
}
