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
            <div class="w-full bg-blue-500">
                @foreach ($karyawans as $item)
                    <div class="flex gap-4">
                        <p>{{$item->npk}}</p>
                        <p>{{$item->name}}</p>
                        <p>{{$item->address}}</p>
                    </div>
                @endforeach
            </div>
            <div>
                @foreach ($items as $item)
                    <div class="flex gap-4">
                        <p>{{$item->code}}</p>
                        <p>{{$item->name_item}}</p>
                        <p>{{$item->price}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
