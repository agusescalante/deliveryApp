<DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    

            

<!-- <!DOCTYPE html> 
<html lang="en">-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deliveryApp</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                    <!-- <li><a class="hover:text-gray-200 hover:underline px-4" href="#">About</a></li> -->
                </ul>
            </nav>
                <!-- <div class=""> -->
                @if (Route::has('login'))
                <div class="flex items-center text-lg no-underline text-white pr-6">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="hover:text-gray-200 hover:underline px-4">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="hover:text-gray-200 hover:underline px-4">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="hover:text-gray-200 hover:underline px-4">Register</a>
                        @endif
                    @endif
                </div>
            @endif
            <!-- </div>  -->
        </div>

    </nav>

    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                deliveryApp
            </a>
            <p class="text-lg text-gray-600">
            Delivery que satisface tus sentidos

            Amamos la comida tanto como vos y por eso queremos llevar a tu mesa, tu comida favorita directamente desde 
            la cocina de los mejores restaurantes. ¿La mejor parte? ¡Te la llevamos donde estés!
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a 
                href="#" 
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center" 
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Technology <i</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Automotive</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Finance</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Politics</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Culture</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Sports</a>
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">

            <article class="flex flex-col shadow my-4">
                <div class="bg-white flex flex-col justify-start p-6">
                    <p class="text-3xl text-green-700 font-bold hover:text-gray-700 pb-4">Los Viernes descuento 10% en cervezas artesanales!</p>
                <img src="{!! asset('images/cervezaartesanal.jpg') !!}">
                   <p class="text-2xl font-bold hover:text-gray-700 pb-4">Para empezar el finde</p>

                    <!-- <p href="#" class="text-sm pb-3">
                        Publidado en Octubre 12, 2020
                    </p> -->
                    <p class="pb-6">En epoca de cuarentena no hace falta salir para pasarla bien, lo que necites te lo llevamos</p>
                    <!-- <a href="#" class="uppercase text-gray-800 hover:text-black"><i class="fas fa-arrow-right"></i></a> -->
                </div>
            </article>

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                <!-- IMAGEN -->
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <!-- <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">No nos olvidamos de la comida</a> -->
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">No nos olvidamos de la comida</a>
                    <img src="{!! asset('images/mostaza.jpg') !!}">
                    <p class="text-2xl font-bold hover:text-gray-700 pb-4">Domingos llevando "Combo Mostaza x2", te regalamos la bebida</p>
                    <!-- <p href="#" class="text-sm pb-3">
                         <a href="#" class="font-semibold hover:text-gray-800"></a>
                    </p> -->
                    <a href="#" class="pb-6">Lorem ipsum dolor sit amet,  porta volutpat. In sit amet posuere magna..</a>
                </div>
            </article>

            <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                                <!-- IMAGEN -->
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">orasdasdt</a>
                    <a href="#" class="pb-6">texto</a>
                </div>
            </article>

            <!-- Pagination -->
            <div class="flex items-center py-8">
                <a href="#" class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center">1</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center">2</a>
                <a href="#" class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">Next <i class="fas fa-arrow-right ml-2"></i></a>
            </div>

        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Sobre nosotros</p>
                <p class="pb-2">
                Nos dedicamos a la compra y envío de pedidos en menos de 
                una hora a través de repartidores independientes.</p>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Nuestros repartidores
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <!-- IMAGESSS -->
                </div>
                <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i> Seguinos
                </a>
            </div>
        </aside>

    </div>

    <footer class="w-full border-t bg-white pb-12">
        <div 
            class="relative w-full flex items-center invisible md:visible md:pb-12" 
            x-data="getCarouselData()"
        >
            <button 
                class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
                x-on:click="decrement()">
                &#8592;
            </button>
            <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
                <img class="w-1/6 hover:opacity-75" :src="image">
            </template>
            <button 
                class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"
                x-on:click="increment()">
                &#8594;
            </button>
        </div>
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                
            </div>
            <div class="uppercase pb-6">&copy; deliveryApp</div>
        </div>
    </footer>

    <script>
        function getCarouselData() {
            return {
                currentIndex: 0,
                images: [
                    "{!! asset('images/monarca.png') !!}",
                    "{!! asset('images/elnoble.png') !!}",
                    "{!! asset('images/glock.jpeg') !!}",
                    "{!! asset('images/antares.png') !!}",
                    "{!! asset('images/subway.png') !!}",
                    "{!! asset('images/logomostaza.png') !!}",
                    "{!! asset('images/carrefour.png') !!}"
                ],
                increment() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
                },
                decrement() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
                },
            }
        }
    </script>

</body>
</html>
