<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Karyawan;
use App\Models\Koperasi;
use Illuminate\Http\Request;

class KoperasiController extends Controller
{
    function index(){
        return view('transaction.index',[
            'karyawans' => Karyawan::all(),
            'items' => Item::all(),
            'koperasis' => Koperasi::all()
        ]);
    }
    function create(){
        return view('transaction.create',[
             'karyawans' => Karyawan::all(),
             'items' => Item::all(),
             'koperasis' => Koperasi::all()
        ]);
    }
    function store(Request $request){
        Koperasi::create($request->except('_token', 'submit'));
        return redirect('/transaction');
    }
    function edit($id){
        $transaction = Koperasi::find($id);
        return view('transaction.edit', [
            'karyawans' => Karyawan::all(),
            'items' => Item::all(),
            'koperasis' => Koperasi::all()
        ], compact('transaction'));
    }
    
    function update(Request $request, $id){
        Koperasi::find($id)->update($request->except('_token', 'submit', '_method'));
        return redirect('/transaction',);
    }
    function destroy($id){
        Koperasi::destroy($id);
        return redirect('/transaction');
    }
}