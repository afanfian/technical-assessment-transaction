<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    @vite('resources/css/app.css')
    <style>
        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #333;
            min-width: 100px;
            z-index: 1;
        }

        .dropdown-menu a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body>
    <nav class="bg-white text-black p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div>
                <a href="/" class=" text-lg font-bold">
                    <img src="/logo.png" alt="Logo" width="200" height="200">
                </a>
            </div>
            <div class="hidden md:block">
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Home</a></li>
                    <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Company</a></li>
                    <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Products & Tech</a></li>
                    <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Certification</a></li>
                    <li>
                        <a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">News & Event</a>
                    </li>
                    <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Careers</a></li>
                    <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Contact Us</a></li>
                    <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Sustainbility</a></li>
                </ul>
            </div>
            <div class="md:hidden">
                <button id="mobile-menu-button" class=" focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="hidden md:hidden bg-blue-500 p-4">
        <ul class="flex flex-col space-y-4">
            <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Home</a></li>
            <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Company</a></li>
            <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Products & Tech</a></li>
            <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Certification</a></li>
            <li >
                <a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">News & Event</a>
            </li>
            <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Careers</a></li>
            <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Contact Us</a></li>
            <li><a href="#" class="hover:font-bold hover:bg-blue-200 px-2 py-2 rounded-lg ">Sustainbility</a></li>
        </ul>
    </div>

    @yield('content')

    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>
