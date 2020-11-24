<?php

namespace App\Http\Controllers;

use App\Shift;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shift = Shift::all();
        return view("shift.index", ["shift" => $shift]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("shift.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Shift::create($request->all());

        return redirect("/shift")->with("hasil", "Data Berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(shift $shift)
    {
        return view('shift.show', compact('shift'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(shift $shift)
    {
        // return $shift;
        return view('shift.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shift $shift)
    {
        Shift::where("id", $shift->id)
            ->update([
                "nama_shift" => $request->nama_shift ? $request->nama_shift : $shift->nama_shift,
            ]);


        return redirect("/shift")->with("hasil", "selamat data anda berhasil diedit!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(shift $shift)
    {
        Shift::destroy($shift->id);
        return redirect("/shift")->with("hasil", "selamat data anda berhasil dihapus!");
    }

    public function get()
    {
        $data = Shift::all();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function getById($id)
    {
        $data = Shift::where("id", $id)->get();

        return response()->json([
            "pesan" => "Success",
            "data" => $data
        ]);
    }
    public function post(Request $request)
    {


        $data = Shift::create($request->all());

        return response()->json([
            "pesan" => "behasil gan pesan post",
            "data" => $data
        ]);
    }
    public function put($id, Request $request)
    {
        $data = Shift::where("id", $id)->first();

        if ($data) {
            $data->nama_shift = $request->nama_shift ? $request->nama_shift : $data->nama_shift;


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
        $data = Shift::where("id", $id)->first();

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
