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
            'items' => Item::all()
        ]);
    }
}