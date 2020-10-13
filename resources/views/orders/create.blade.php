<x-orders>
<!-- component -->
<div class="leading-loose">
        <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('orders.store') }}">
            @csrf
            <p class="text-gray-800 font-medium">Create new order</p>

            <div class="">
                <label class="block text-sm text-gray-00" for="description">Description</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="description" name="description" type="text" required="" placeholder="Products" aria-label="description" value="{{ old('') }}">
                        @error('description')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>

            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="cus_email">Price</label>
                    <input class="w-full px-5  py-4 text-gray-700 bg-gray-200 rounded" id="price" name="price" type="text" required="" placeholder="Price" aria-label="price" value="{{ old('price') }}" >
                        @error('price')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
                        </div>
            
            <div class="mt-2">
                <div class="relative">
                    <label class=" block text-sm text-gray-600" for="cus_email">Assigned employee </label>
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" name="employee_id" id="employee_id" >
                        @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" >{{ $employee->name }}</option>
                        @endforeach
                        </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <!-- <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg> -->
                    </div>
                </div>
            </div>
            <div class="mt-4">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Create</button>
            </div>
        </form>
                </div>
</x-orders>