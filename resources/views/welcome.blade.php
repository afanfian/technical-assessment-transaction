<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div>
            <div class="pt-5 text-center font-bold">
                <p class="text-xl">Technical Assessment - System Development Staff, PT Akebono Brake Astra Indonesia</p>
                <p class="text-lg">Transaksi Koperasi</p>
            </div>
            <div class="flex flex-col lg:flex-row pt-5 items-center justify-center gap-10">
                <div class="space-y-2">
                    <p class="font-bold text-center lg:text-start">Table Master Karyawan:</p>
                    <table class="table-fixed rounded-md">
                        <thead class="border bg-blue-300">
                            <tr class="border">
                                <th class="px-2 border text-center">No</th>
                                <th class="p-2 border">NPK</th>
                                <th class="p-2 border">Nama</th>
                                <th class="p-2 border">Alamat</th>
                            </tr>
                        </thead>
                        <tbody class="border bg-gray-50">
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($karyawans as $item)
                                <tr class="border">
                                    <td class="px-2 text-center border">{{ $counter++ }}</td>
                                    <td class="p-2 border">{{$item->npk}}</td>
                                    <td class="p-2 border">{{$item->name}}</td>
                                    <td class="p-2 border">{{$item->address}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="space-y-2">
                    <h1 class="font-bold text-center lg:text-start">Table Master Item:</h1>
                    <table class="table-fixed rounded-md">
                        <thead class="border bg-blue-400">
                            <tr>
                                <th class="px-2 border text-center">No</th>
                                <th class="p-2 border">Kode</th>
                                <th class="p-2 border">Nama Item</th>
                                <th class="p-2 border">Harga</th>
                            </tr>
                        </thead>
                        <tbody class="border bg-gray-50">
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($items as $item)
                                <tr class="border">
                                    <td class="px-2 text-center border">{{ $counter++ }}</td>
                                    <td class="p-2 border">{{$item->code}}</td>
                                    <td class="p-2 border">{{$item->name_item}}</td>
                                    <td class="p-2 border">{{$item->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="space-y-2">
                    <h1 class="font-bold text-center lg:text-start">Table Transaksi Koperasi:</h1>
                    <table class="table-fixed rounded-md overflow-x-auto">
                        <thead class="border bg-blue-400">
                            <tr>
                                <th class="px-2 border text-center">No</th>
                                <th class="p-2 border">NPK</th>
                                <th class="p-2 border">Tanggal Transaksi</th>
                                <th class="p-2 border">Kode</th>
                                <th class="p-2 border">Qty</th>
                                <th class="p-2 border">Harga</th>
                                <th class="p-2 border">Bayar</th>
                            </tr>
                        </thead>
                        <tbody class="border bg-gray-50">
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($items as $item)
                                <tr class="border">
                                    <td class="px-2 text-center border">{{ $counter++ }}</td>
                                    <td class="p-2 border">{{$item->code}}</td>
                                    <td class="p-2 border">{{$item->name_item}}</td>
                                    <td class="p-2 border">{{$item->price}}</td>
                                    <td class="p-2 border">{{$item->code}}</td>
                                    <td class="p-2 border">{{$item->name_item}}</td>
                                    <td class="p-2 border">{{$item->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
