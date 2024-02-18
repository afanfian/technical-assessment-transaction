@extends('layouts.layout')

@section('content')
    <div class="flex items-center justify-center">
        <form action="/transaction/store" method="POST" class="w-4/12 bg-white shadow-md rounded-lg p-8">
            @csrf
            <p class="text-center text-xl font-bold pb-5">Tambahkan Data Transaksi</p>
            <div class="mb-4">
                <label for="date" class="block text-gray-700 font-bold mb-2">Tanggal</label>
                <input type="date" name="date_transaction" id="date_transaction" value="{{ date('Y-m-d') }}" class="px-4 py-2 border rounded-lg w-full focus:outline-none focus:border-blue-500" required>
            </div>
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Nama</label>
                <select id="name" name="name" class="w-full px-2 py-2 border rounded-lg" required>
                    <option value="">Pilih Nama</option>
                    @foreach($karyawans as $item)
                        <option value="{{ $item->id }}">{{ $item->npk }} - {{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-bold mb-2">Item:</label>
                <select id="item" name="item" class="w-full px-2 py-2 border rounded-lg" required>
                    <option value="">Pilih Item</option>
                    @foreach($items as $item)
                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->name_item }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex mb-4 gap-5">
                <label for="price" class="block text-gray-700 font-bold mb-2">Harga:</label>
                <p id="price" name="price" required></p>
            </div>
            <div class="mb-4">
                <label for="qty" class="block text-gray-700 font-bold mb-2">Quantity:</label>
                <input type="text" name="qty" id="qty" placeholder="2" class="px-4 py-2 border rounded-lg w-full focus:outline-none focus:border-blue-500" required>
            </div> 
            <div class="flex mb-4 gap-5">
                <label for="result" class="block text-gray-700 font-bold mb-2">Total:</label>
                <p id="result" name="result" required></p>
            </div>
            <div class="mb-4">
                <label for="pay" class="block text-gray-700 font-bold mb-2">Bayar:</label>
                    <div class="flex gap-1">
                        <input type="checkbox" id="bayar" name="bayar" value="Lunas"> Lunas
                        <input type="checkbox" id="bayar" name="bayar" value="Cicil"> Cicil
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

        let price = 0;
        let qty = 0;

        var itemPrices = {};
        @foreach($items as $item)
            itemPrices[{{ $item->id }}] = {{ $item->price }};
        @endforeach

        
        function reset(){
            idPrice.textContent = '';
            idTotal.textContent = '';
        }

        document.getElementById('reset').addEventListener('click', reset);
        

        idItem.addEventListener('change', function() {
        const selectedPrice = itemPrices[this.value];
        idPrice.textContent = selectedPrice;
        price = selectedPrice;
        idTotal.textContent = selectedPrice * qty;
        });

        idquantity.addEventListener('change', function() {
            const total = price * this.value;
            idTotal.textContent = total;
            qty = this.value;
        });
    </script>
@endsection
