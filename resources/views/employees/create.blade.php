<x-orders>
<!-- component -->
<div class="leading-loose">
        <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('employees.store') }}">
            @csrf
            <p class="text-gray-800 font-medium">Add new employee</p>

            <div class="">
                <label class="block text-sm text-gray-00" for="name">Name</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" required="" placeholder="Name" aria-label="name" value="{{ old('name') }}">
                        @error('name')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
            </div>

            <div class="">
                <label class="block text-sm text-gray-00" for="surname">Surname</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="surname" name="surname" type="text" required="" placeholder="surname" aria-label="name" value="{{ old('surname') }}">
                        @error('surname')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
            </div>

            <div class="">
                <label class="block text-sm text-gray-00" for="surname">Email</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="text" required="" placeholder="email" aria-label="email" value="{{ old('email') }}">
                        @error('description')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
            </div>

            <div class="">
                <label class="block text-sm text-gray-00" for="born_date"> MM-DD-YY Born date</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="born_date" name="born_date" type="text" required="" placeholder="Born date" aria-label="born_date" value="{{ old('born_date') }}">
                        @error('born_date')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
            </div>
                    
            
            <div class="mt-4">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Add</button>
            </div>
        </form>
                </div>
</x-orders>