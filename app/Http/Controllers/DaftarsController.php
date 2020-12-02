<?php

namespace App\Http\Controllers;

use App\Dokter;
use App\Pasien;
use App\Poli;
use \Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class DaftarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function umum()
    {
        $pasien = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->get();
        $poli = Poli::all();
        $dokter = Dokter::all();

        return view("daftar.pendaftaran", compact("poli", "dokter", "pasien"));
    }

    public function buat(Request $request)
    {

        $request->validate([
            'nama_pasien' => ['required', 'string', 'max:255'],
            'alamat_pasien' => ['required', 'string', 'max:255'],
            'tgl_periksa' => ['string', 'max:255'],
            'keluhan' => ['required', 'string', 'max:255'],
            'id_dokter' => ['required', 'string', 'max:255'],
            'jenis_penjamin' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'no_hp' => ['required', 'string', 'max:255'],
            'tgl_lahir' => ['required', 'string', 'max:255'],
        ]);

        //tambah no urut;
        $pasien_no_urut = Pasien::latest()->first();

        $no_urut = 0;
        if ($pasien_no_urut->tgl_periksa == date("Y-m-d")) {
            if ($pasien_no_urut->no_urut == 0 || $pasien_no_urut->no_urut == NULL) {
                $no_urut += 1;
                // echo "belum ada ni";
            } else {
                $no_urut = $pasien_no_urut->no_urut +  1;
                // echo "sudah ada ni";
            }
        } else {
            $no_urut = 1;
        }
        Pasien::create($request->all() + ["no_urut" => $no_urut]);

        //tampilin data
        $pasien = Pasien::latest()->first();

        return view("daftar.hasilDaftar", ["pasien" => $pasien]);
    }

    public function index()
    {
        $pasien = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->get()->sortBy("no_urut");

        //jumlah pasien total
        $total_pasien = count($pasien);


        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        //psaien aktif
        $pasien_aktif = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->where("dicek", 0)->paginate(1);

        //no_urut
        $no_urut;
        foreach ($pasien_aktif as $item) {
            $no_urut = $item->no_urut;
        }





        //psaien selesai
        $pasien_selesai = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->where("dicek", 1)->get();


        return view("daftar.index", compact("pasien", "today", "no_urut", "total_pasien"));
    }

    public function aktif()
    {

        $pasien = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->get()->sortBy("no_urut");

        //jumlah pasien total
        $total_pasien = count($pasien);


        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        //psaien aktif
        $pasien_aktif = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->where("dicek", 0)->paginate(1);

        //no_urut
        $no_urut;
        foreach ($pasien_aktif as $item) {
            $no_urut = $item->no_urut;
        }


        //psaien selesai
        $pasien_selesai = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->where("dicek", 1)->get();
        // return date("Y-m-d");

        return view("daftar.daftarAktif", compact("today", "pasien_aktif", "no_urut", "total_pasien"));
    }

    public function selesai()
    {

        $pasien = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->get()->sortBy("no_urut");

        //jumlah pasien total
        $total_pasien = count($pasien);


        $today = Carbon::now()->isoFormat('dddd, D MMMM Y');

        //psaien aktif
        $pasien_aktif = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->where("dicek", 0)->paginate(1);

        //no_urut
        $no_urut;
        foreach ($pasien_aktif as $item) {
            $no_urut = $item->no_urut;
        }


        //psaien selesai
        $pasien_selesai = Pasien::with("dokter", "poli")->where("tgl_periksa", date("Y-m-d"))->where("dicek", 1)->get();
        return view("daftar.daftarSelesai", compact("today", "pasien_selesai", "no_urut", "total_pasien"));
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
        return view("daftar.create", compact("poli", "dokter"));
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

        return redirect("/daftar")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function show(Pasien $daftar)
    {
        $pasien = Pasien::with("dokter", "poli")->where("id", $daftar->id)->first();
        // return $pasien;
        // $pasien = $pasien->all();
        return view('daftar.show', compact("pasien"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasien $daftar)
    {
        $poli = Poli::all();
        $dokter = Dokter::all();
        $pasien = $daftar;

        return view('daftar.edit', compact('pasien', "poli", "dokter"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pasien $daftar)
    {
        $pasien = $daftar;


        Pasien::where("id", $daftar->id)
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

        return redirect("/daftar")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pasien  $pasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasien $daftar)
    {
        Pasien::destroy($daftar->id);
        // return $daftar;
        return redirect("/daftar")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function lanjut(Pasien $daftar_aktif)
    {


        // return $daftar_aktif;
        $data = Pasien::where("id", $daftar_aktif->id)
            ->update([
                "dicek" => 1,
            ]);


        return redirect("/daftar_aktif")->with("hasil", "selamat data pasien berhasil disimpan!");
    }
}
