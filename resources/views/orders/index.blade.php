<x-orders>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
         <div class="bg-gray-50 py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 border-gray-50" >
            <div class="shadow overflow-hidden border-b bg-gray-50 border-gray-50 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-400">
                
                <a href="{{ route('orders.create') }}">
                    <button class=" leading-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> Create order </button>                                                       
                </a>
                
        <thead>
            <tr class="bg-gray-50">           
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Description
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Price
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Received
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Employee
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    User 
                </th>
                <th class="px-4 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Actions 
                </th>
            </tr>
        </thead>
        </div>

        <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                @foreach($orders as $order)

                <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 font-medium text-gray-900">
                        {{ $order->description }}
                        </div>   
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    <div class="text-sm leading-5 text-gray-900"> $ {{  $order->price }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full @if($order->received) bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
                    @if($order->received)
                        Sent
                    @else
                        Pending
                    @endif
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                    @foreach( $employees as $employee)
                   @if($order->employee_id == $employee->id)
                   {{ $employee->name }}
                   @endif
                   @endforeach

                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    <div class="text-sm leading-5 text-gray-900">  
                    <img title="{{ $order->user->name }}" class="h-8 w-8 rounded-full object-cover" src="{{ $order->user->getProfilePhotoUrlAttribute() }}"  />
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">  
                            @can('update',$order)
                            <a href="{{ route('orders.edit',$order) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </div>
                </td>
    
                <td class="px-6 py-4 whitespace-no-wrap">
                    <div class="text-sm leading-5 text-gray-900">  
                        <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
                                
                            @csrf
                            {{ method_field('DELETE') }}  
                            <button class="leading-4 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" title="Delete"> 
                            Delete order </button> 

                        </form>

                @endcan
                </div>

                </td>

                </tr>
                @endforeach

             </tbody>

        </table>
         </div>
        </div>
    </div>
</div>

</div>
</x-orders>
