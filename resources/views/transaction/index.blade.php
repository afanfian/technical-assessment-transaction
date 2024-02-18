@extends('layouts.layout')

@section('content')
    <div class="pb-5">
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
                <div class="flex w-4/12 flex-col space-y-2">
                    <div class="flex gap-5 justify-between">
                        <p>Tanggal:</p>
                        <input type="date" id="tanggalFilter" placeholder="Tanggal">
                    </div>
                   <div class="flex gap-5 justify-between">
                        <p>NPK:</p>
                        <select id="npkFilter" placeholder="NPK">
                            @foreach ($koperasis->pluck('karyawan.npk')->unique() as $npk)
                                <option value="{{$npk}}">{{$npk}}</option>
                            @endforeach
                        </select>
                   </div>
                   <div class="flex gap-5 justify-between">
                        <p>Tipe Bayar</p>
                        <select id="tipeBayarFilter" placeholder="Tipe Bayar">
                            <option value="">Semua</option>
                            <option value="Lunas">Lunas</option>
                            <option value="Cicil">Cicil</option>
                        </select>
                   </div>
                    <div class="flex gap-5">
                        <button onclick="filterTable()" class="px-2 py-1 rounded-lg text-white bg-blue-500 hover:bg-blue-600">Search <i class="fas fa-search text-sm"></i></button>
                        <button onclick="clearFilter()" class="px-2 py-1 rounded-lg text-white bg-red-500 hover:bg-red-600">Clear<i class="fas fa-trash text-sm pl-1"></i></button>
                    </div>
                </div>
                <button class="flex justify-end items-end text-right font-bold py-2 px-4 rounded bg-blue-500 hover:bg-blue-700 text-white">
                    <a href="/transaction/create">Tambah Transaksi<i class="fas fa-plus pl-2"></i></a>
                </button>
                <p class="font-bold text-lg text-center">Table Transaksi Koperasi</p>
                <table id="tableTransaksiKoperasi" class="table-auto rounded-md">
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
    <script>
        var searchClicked = false;

        function filterTable() {
            searchClicked = true; 

            var tanggalValue = document.getElementById('tanggalFilter').value;
            var npkValue = document.getElementById('npkFilter').value;
            var tipeBayarValue = document.getElementById('tipeBayarFilter').value;

            applyFilter(tanggalValue, npkValue, tipeBayarValue); 
        }

        function applyFilter(tanggalValue, npkValue, tipeBayarValue) {
            var rows = document.querySelectorAll('#tableTransaksiKoperasi tbody tr');

            rows.forEach(function(row) {
                var tanggal = row.cells[3].textContent;
                var npk = row.cells[2].textContent;
                var tipeBayar = row.cells[9].textContent.trim(); 

                var showRow = true;

                if (tanggalValue !== '' && !tanggal.includes(tanggalValue)) {
                    showRow = false;
                }
                if (npkValue !== '' && npk !== npkValue) {
                    showRow = false;
                }
                if (tipeBayarValue !== '' && tipeBayar !== tipeBayarValue) {
                    showRow = false;
                }

                row.style.display = showRow ? '' : 'none';
            });
        }

        function clearFilter() {
            document.getElementById('tanggalFilter').value = '';
            document.getElementById('npkFilter').value = '';
            document.getElementById('tipeBayarFilter').value = '';
            searchClicked = false;
            applyFilter('', '', ''); 
        }
        document.getElementById('tanggalFilter').addEventListener('change', function() {
            if (searchClicked) {
                filterTable();
            }
        });
        document.getElementById('npkFilter').addEventListener('change', function() {
            if (searchClicked) {
                filterTable();
            }
        });
        document.getElementById('tipeBayarFilter').addEventListener('change', function() {
            if (searchClicked) {
                filterTable();
            }
        });
    </script>


@endsection