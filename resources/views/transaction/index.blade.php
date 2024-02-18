@extends('layouts.layout')

@section('content')
    <div>
        <div class="flex justify-center pt-5 gap-5">
            <div class="space-y-2">
                <p class="font-bold text-lg text-center">Table Master Karyawan</p>
                <table class="table-auto rounded-md">
                    <thead class="border bg-blue-300">
                    <tr class="border">
                        <th class="px-2 border text-center">No</th>
                        <th class="p-4 border">NPK</th>
                        <th class="p-4 border">Nama</th>
                        <th class="p-4 border">Alamat</th>
                    </tr>
                    </thead>
                    <tbody class="border bg-gray-50">
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($karyawans as $item)
                        <tr class="border">
                            <td class="px-2 text-center border">{{ $counter++ }}</td>
                            <td class="p-4 border">{{$item->npk}}</td>
                            <td class="p-4 border">{{$item->name}}</td>
                            <td class="p-4 border">{{$item->address}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="space-y-2">
                <p class="font-bold text-lg text-center">Table Master Item</p>
                <table class="table-auto rounded-md">
                    <thead class="border bg-blue-300">
                    <tr class="border">
                        <th class="px-2 border text-center">No</th>
                        <th class="p-4 border">Kode</th>
                        <th class="p-4 border">Nama Item</th>
                        <th class="p-4 border">Harga</th>
                    </tr>
                    </thead>
                    <tbody class="border bg-gray-50">
                    @php
                        $counter = 1;
                    @endphp
                    @foreach ($items as $item)
                        <tr class="border">
                            <td class="px-2 text-center border">{{ $counter++ }}</td>
                            <td class="p-4 border">{{$item->code}}</td>
                            <td class="p-4 border">{{$item->name_item}}</td>
                            <td class="p-4 border text-end">{{$item->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="flex justify-center pt-5 gap-5">
            <div class="space-y-2">
                <button class="flex justify-end items-end text-right font-bold py-2 px-4 rounded bg-blue-500 hover:bg-blue-700 text-white">
                    <a href="/transaction/create">Tambah Transaksi<i class="fas fa-plus pl-2"></i></a>
                </button>
                <p class="font-bold text-lg text-center">Table Transaksi Koperasi</p>
                <table class="table-auto rounded-md">
                    <thead class="border bg-blue-300">
                        <tr class="border">
                            <th class="px-2 border text-center">No</th>
                            <th class="p-4 border">Nama</th>
                            <th class="p-4 border">NPK</th>
                            <th class="p-4 border">Tanggal Transaksi</th>
                            <th class="p-4 border">Kode Item</th> 
                            <th class="p-4 border">Nama Item</th> 
                            <th class="p-4 border">Quantity</th>
                            <th class="p-4 border">Harga</th>
                            <th class="p-4 border">Total</th>
                            <th class="p-4 border">Tipe Bayar</th>
                            <th class="p-4 border">Id Karyawan</th>
                            <th class="p-4 border">Id Item</th>
                            <th class="p-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border bg-gray-50">
                        @php $counter = 1; @endphp
                        @foreach ($koperasis as $item)
                            <tr class="border">
                                <td class="px-2 text-center border">{{ $counter++ }}</td>
                                <td class="p-4 border">{{$item->karyawan ? $item->karyawan->name : '-'}}</td>
                                <td class="p-4 border">{{$item->karyawan ? $item->karyawan->npk : '-'}}</td>
                                <td class="p-4 border">{{$item->date_transaction}}</td>
                                <td class="p-4 border">{{$item->item ? $item->item->code : '-'}}</td>
                                <td class="p-4 border">{{$item->item ? $item->item->name_item : '-'}}</td>
                                <td class="p-4 border">{{$item->qty}}</td>
                                <td class="p-4 border text-end">{{$item->price}}</td>
                                <td class="p-4 border text-end">{{ $item->qty * $item->price }}</td>
                                <td class="p-4 border">
                                    @if ($item->pay === 1)
                                        Lunas
                                    @elseif ($item->pay === 0)
                                        Cicil
                                    @else
                                        {{ $item->pay }}
                                    @endif
                                </td>
                                <td class="p-4 border">{{$item->karyawan_id}}</td>
                                <td class="p-4 border">{{$item->item_id}}</td>
                                <td class="p-4 border">
                                    <a href="/transaction/{{ $item->id }}/edit" class="text-blue-500"><i class="fas fa-edit"></i></a>
                                    <form action="/transaction/{{ $item->id }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection