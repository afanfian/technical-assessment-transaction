<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Form</title>
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="flex justify-center pt-10">
            <form method="POST" action="{{ route('store') }}" class="flex flex-col">
                @csrf
                <div>
                    <label for="tanggal">Tanggal  :</label>
                    <input type="date" id="tanggal" name="tanggal" value="{{ date('Y-m-d') }}" class="px-2 py-1 border rounded-lg" required>
                </div>
                <div>
                    <label for="nama">Nama :</label>
                    <select id="nama" name="nama" class="px-2 py-1 border rounded-lg" required>
                        <option value="">Pilih Nama</option>
                        @foreach($karyawans as $item)
                            <option value="{{ $item->id }}">{{ $item->npk }} - {{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="item">Item:</label>
                    <select id="item" name="item" class="px-2 py-1 border rounded-lg" required>
                        <option value="">Pilih Item</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->name_item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex">
                    <label for="harga">Harga:</label>
                    <p id="harga" name="harga" required></p>
                </div>
                <div>
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="px-2 py-1 border rounded-lg" required>
                </div>
                    <div class="flex">
                    <label for="total">Total:</label>
                    <p id="total" name="total"  required></p>
                </div>
                <div class="flex">
                    <label for="bayar">Bayar:</label>
                    <div class="flex gap-1">
                        <input type="checkbox" id="bayar" name="bayar" value="Lunas"> Lunas
                        <input type="checkbox" id="bayar" name="bayar" value="Cicil"> Cicil
                    </div>
                </div>
                <div class="flex gap-5">
                    <button type="submit" class="rounded-lg px-2 py-2 font-bold text-white bg-blue-400 hover:bg-blue-500">Simpan</button>
                    <button type="reset" id="reset" class="rounded-lg px-2 py-2 font-bold text-white bg-red-400 hover:bg-red-500">Clear</button>
                </div>
            </form>
        </div>
    </body>
    <script>   
        const idItem = document.getElementById('item');
        const idPrice = document.getElementById('harga');
        const idquantity = document.getElementById('quantity');
        const idTotal = document.getElementById('total');

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
</html>