<x-orders>
<!-- component -->
<div class="leading-loose">
        <form class="max-w-xl m-4 p-10 bg-white rounded shadow-xl" method="POST" action="{{ route('orders.update',$order) }}">
            @csrf
            @method('PUT')
            <p class="text-gray-800 font-medium">Edit order</p>

            <div class="">
                <label class="block text-sm text-gray-00" for="price">Price</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="price" name="price" type="text" required=""  aria-label="price" value="{{ $order->price }}">
                        @error('name')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
            </div>

            <div class="">
                <label class="block text-sm text-gray-00" for="surname">Description</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="Description" name="Description" type="text" required=""  aria-label="name" value="{{ $order->description }}">
                        @error('surname')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
            </div>

            <div class="">
                <label class="block text-sm text-gray-00" for="received">Received</label>
                <input type="radio" id="received" value="true" name="received" class=""> Yes <br>
                <input type="radio" id="received" value="false" name="received" class=""> No
                
                        @error('received')
                        <div class="text-red-600">
                            {{ $message }}
                        </div>
                        @enderror
            </div>

            <div class="mt-2">
                <div class="relative">
                    <label class=" block text-sm text-gray-600" for="cus_email">Assigned employee </label>
                        <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" name="employee_id" id="employee_id">
                        @foreach($employees as $employee)
                        
                        <option value="{{ $employee->id }}" @if($order->employee_id == $employee->id) selected @endif >{{ $employee->name }}</option>
                        @endforeach
                        </select>
                    <div class="pointer-events-none absolute pin-y pin-r flex items-center px-2 text-grey-darker">
                    <!-- <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg> -->
                    </div>
 
            
            <div class="mt-4">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Finish edit</button>
            </div>
        </form>
                </div>
</x-orders>