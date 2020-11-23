<?php


namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\Bayar;
use App\Dokter;
use App\Inap;
use App\Pasien;
use App\Perawat;
use App\Ruang;
use Illuminate\Http\Request;


class PagesController extends Controller
{
    public function index()
    {
        $pasien = Pasien::with("dokter", "poli")->get();
        $dokter = Dokter::with('penyakit')->latest()->get();
        $perawat = Perawat::with('shift')->get();
        $inap = Inap::with('pasien', "ruang")->get();
        $ruang = Ruang::all();
        $bayar = Bayar::with('pasien', "perawat")->get();

        return view("dash.index", compact("pasien", "dokter", "perawat", "ruang", "inap", "bayar"));
    }

    public function cobaGet()
    {
        $client = new Client();
        $request = $client->get('http://myexample.com');
        $response = $request->getBody();

        dd($response);
    }
}
