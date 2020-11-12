<DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deliveryApp</title>         
    
 
    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
   </head>
<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
        
            <div class="flex items-center text-lg no-underline text-white pr-6 " title="Users currently">
                <svg class="h-8 w-8 text-white"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">     <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" /> <circle cx="8.5" cy="7" r="4" />   <polyline points="17 11 19 13 23 9" /> </svg>
               <p class=" m-3"> {{ $users  }} </p>   
            </div>
            
                @if (Route::has('login'))
                <div class="flex items-center text-lg no-underline text-white pr-6">
                    @auth
                        <a href="{{ url('/orders') }}" class="hover:text-gray-200 hover:underline px-4">My account</a>
                        <a href="{{ url('/') }}" class="hover:text-gray-200 hover:underline px-4">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-gray-200 hover:underline px-4">Login</a>
                        <a href="{{ url('/') }}" class="hover:text-gray-200 hover:underline px-4">Inicio</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-gray-200 hover:underline px-4">Register</a>
                        @endif
                    @endif
                </div>
            @endif
        </div>

    </nav>

    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <p class="font-bold text-yellow-800 uppercase hover:text-gray-700 text-5xl" href="#">
                deliveryApp
            </p>
            <p class="text-lg text-gray-600">
            Delivery que satisface tus sentidos

            Amamos la comida tanto como vos y por eso queremos llevar a tu mesa, tu comida favorita directamente desde 
            la cocina de los mejores restaurantes. ¿La mejor parte? ¡Te la llevamos donde estés!
            </p>
        </div>
    </header>
    
