<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    function index(){
        return view('welcome',[
            'karyawans' => Karyawan::all(),
            'items' => Item::all(),
        ]);
    }

    function store(Request $request){
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required',
            'item' => 'required',
            'harga' => 'required|numeric',
            'quantity' => 'required|numeric',
            'bayar' => 'required',
        ]);

        return redirect('/')->with('success', 'Data berhasil disimpan!');
    }

    function create(){
        return view('form',[
            'karyawans' => Karyawan::all(),
            'items' => Item::all(),
        ]);
    }
}