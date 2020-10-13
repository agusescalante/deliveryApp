<x-headeruser/>

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
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2"> Movimientos <i</a>
                <a href="#" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">Automotive</a>
                
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

                <div class="p-10">
                <style>
                .dropdown:hover .dropdown-menu {    
                display: block;
                }
                </style>

                    <div class="dropdown inline-block relative">
                        <button class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                        <span class="mr-1">Repartidores</span>
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
                        <li class="" title="Más detalles"><a href="{{ route('mainuser.create') }}" class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">
                        
                       
                        @foreach($employees as $employee)
                        {{ $employee->name }} {{ $employee->surname }} {{ $countTotal[0]['total'] }} <br>
                            @endforeach </a>                         
</li>
                        </ul>
                    </div>

                    </div>
                <!-- <a href="#" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                     Repartidores
                </a>
                @foreach($employees as $employee)
               {{ $employee->name }} {{ $employee->surname }}<br>
                @endforeach -->
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Nuestros movimientos </p>
                @foreach($orders as $order)
               {{ $order->description }}   <br>
                @endforeach
                <div class="grid grid-cols-3 gap-3">
                    <!-- IMAGESSS -->
                </div>
                
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
