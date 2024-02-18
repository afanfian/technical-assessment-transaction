@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-center">
        <form action="/transaction/{{ $koperasis->id }}" method="POST" class="w-4/12 bg-white shadow-md rounded-lg p-8">
            @method('PUT')
            @csrf
            <p class="text-center text-xl font-bold pb-5">Tambahkan Data Transaksi</p>
            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-bold mb-2">Tanggal</label>
                <input type="date" name="date_transaction" id="date_transaction" value="{{ $koperasis->date_transaction }}" class="px-4 py-2 border rounded-lg w-full focus:outline-none focus:border-blue-500" required disabled>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama</label>
                <input value="{{$koperasis->karyawan ? $koperasis->karyawan->npk : '-'}} - {{ $koperasis->karyawan ? $koperasis->karyawan->name : '-' }}" class="px-4 py-2 border rounded-lg w-full focus:outline-none focus:border-blue-500" required disabled></input>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-bold mb-2">Item:</label>
                <input value="{{$koperasis->item ? $koperasis->item->code : '-'}} - {{ $koperasis->item ? $koperasis->item->name_item : '-' }}" class="px-4 py-2 border rounded-lg w-full focus:outline-none focus:border-blue-500" required disabled></input>
            </div>
            <div class="mb-4">
                <label for="price" class="block text-gray-700 font-bold mb-2">Harga:</label>
                <input type="text" name="price" id="price" value="{{ $koperasis->price }}" placeholder="2" class="px-4 py-2 border rounded-lg w-full focus:outline-none focus:border-blue-500" required disabled>
            </div>
            <div class="mb-4">
                <label for="qty" class="block text-gray-700 font-bold mb-2">Quantity:</label>
                <input type="text" name="qty" id="qty" value="{{ $koperasis->qty }}" placeholder="2" class="px-4 py-2 border rounded-lg w-full focus:outline-none focus:border-blue-500" required>
            </div> 
            <div class="mb-4">
                <label for="result" class="block text-gray-700 font-bold mb-2">Total:</label>
                <input type="text" id="result" name="result" value="{{ $koperasis->price * $koperasis->qty }}" class="px-4 py-2 border rounded-lg w-full focus:outline-none focus:border-blue-500" required disabled></input>
            </div>
            <div class="mb-4">
                <label for="pay" class="block text-gray-700 font-bold mb-2">Bayar:</label>
                    <div class="flex gap-1">
                        <input type="radio" id="pay_lunas" name="pay" value="1" {{ $koperasis->pay == 1 ? 'checked' : '' }}> Lunas
                        <input type="radio" id="pay_cicil" name="pay" value="0" {{ $koperasis->pay == 0 ? 'checked' : '' }}> Cicil
                    </div>
            </div>
            <button type="submit" name="submit" class="px-4 py-2 rounded-lg text-white bg-blue-500 hover:bg-blue-600 focus:outline-none">
                Simpan
            </button>
            <button type="reset" name="reset" id="reset" class="px-4 py-2 rounded-lg text-white bg-red-500 hover:bg-red-600 focus:outline-none">
                Reset
            </button>
        </form>
    </div>
    <script>   
        const idItem = document.getElementById('item');
        const idPrice = document.getElementById('price');
        const idquantity = document.getElementById('qty');
        const idTotal = document.getElementById('result');

        let price = idPrice.value || 0;
        let qty = 0;
        
        function reset(){
            idPrice.textContent = '';
            idTotal.textContent = '';
        }

        document.getElementById('reset').addEventListener('click', reset);

        idquantity.addEventListener('change', function() {
            const total = price * this.value;
            idTotal.value = total;
            qty = this.value;
        });
    </script>
@endsection
