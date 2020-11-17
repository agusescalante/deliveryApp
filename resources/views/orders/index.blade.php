<x-orders>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
         <div class="bg-gray-50 py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 border-gray-50" >
            
            <div class="">
            
                </div>
          </div>

        </div>
            <div class="shadow overflow-hidden border-b bg-gray-50 border-gray-50 sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-400">

                <a href="{{ route('orders.create') }}">
                    <button class=" leading-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> Create order </button>
                </a>


                @if($userRole == 'boss' && $pendingTotal > 0)
                <span class="px-8 .w-1/2 text-m .pl-24 .space-y-64 leading-5 font-semibold rounded-full  bg-orange-200 text-red-800">
                Total pending  {{ $pendingTotal }}  
                <span>
                @elseif($userRole == 'user' && $pending > 0)
                <span class="px-8 .w-1/2 text-m .pl-24 .space-y-64 leading-5 font-semibold rounded-full  bg-orange-200 text-red-800">
                Total pending  {{ $pending }}
                <span>
                @else
                <span class="px-8 .w-1/2 text-m .pl-24 .space-y-64 leading-5 font-semibold rounded-full  bg-green-200 text-black-800">
                No orders pending
                <span>
                @endif

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

                    @can('view',$order)
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
                        <img title="{{ $order->user->name }} {{ $order->user->last_name }} " class="h-8 w-8 rounded-full object-cover" src="{{ $order->user->getProfilePhotoUrlAttribute() }}"  />
                    </div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">
                            @can('update',$order)
                                <a href="{{ route('orders.edit',$order) }}" title="Edit" class="text-indigo-600 hover:text-indigo-900"><svg class="h-8 w-8 text-green-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>   <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />  <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /> </svg>
                                </a>
                            @endcan

                            <!-- @cannot('update',$order)

                             <svg class="h-8 w-8 text-red-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="9" cy="7" r="4" />  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />  <line x1="19" y1="7" x2="19" y2="10" />  <line x1="19" y1="14" x2="19" y2="14.01" /></svg>
                             <p>Unauthorized</p>
                            @endcannot -->
                        </div>
                </td>

                <td class="px-6 py-4 whitespace-no-wrap">
                    <div class="text-sm leading-5 text-gray-900"> 
                        @can('delete',$order) 
                        <form action="{{ route('orders.destroy',$order->id) }}" method="POST">      
                            @csrf
                            {{ method_field('DELETE') }}  
                                <button class="leading-4 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" title="Delete"> 
                                Delete order </button> 

                            @endcan
                           
                        </form>

                </div>

                </td>

                </tr>
                @endcan

                @endforeach

             </tbody>

        </table>
         </div>
        </div>
    </div>
</div>

</div>
</x-orders>
