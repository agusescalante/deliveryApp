<x-employees>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                <a href="{{ route('employees.create') }}">
                    <button id="create" name="create" class="leading-4 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-full"> Add employee </button>                                                       
                </a>
        
        <thead>
            <tr>           
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Name & email
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Surname
                </th>
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Born Date
                </th>
                <th class="px-6 py-3 bg-gray-50"></th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($employees as $employee)
                
                <tr>
                <td class="px-6 py-4 whitespace-no-wrap">
                <!-- <div class="flex items-center"> -->
                <!-- <div class="flex-shrink-0 h-10 w-10">
                </div> -->
                <div class="ml-4">
                    <div class="text-sm leading-5 font-medium text-gray-900">
                    {{ $employee->name }}
                    <div class="text-sm leading-5 text-gray-500">
                    {{ $employee->email }}

                    <div class="w-full md:w-3/5 mx-auto p-8">
                            <!-- <p> <strong>  </strong></p> -->
                                <div class="shadow-md">
                                    <div class="tab w-full overflow-hidden border-t">
                                        <input class="absolute opacity-0 " id="tab-multi-one"  name="tabs">
                                        <label class="block p-2 text-black leading-normal cursor-pointer" >Orders</label>
                                        @foreach($orders as $order)
                                        @if($order->employee_id == $employee->id)
                                        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                        <ul>
                                        <li>
                                        {{ $order->description }} <br>
                                        </li>
                                        </ul>    
                                            
                                        <!-- <p class="p-5">   </p> -->
                                             </div>
                                             @endif
                                             @endforeach
                                </div>
                        </div>
                    </div>
                        
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    <div class="text-sm leading-5 text-gray-900">  
                    {{  $employee->surname }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">
                    <div class="text-sm leading-5 text-gray-900">  
                    {{  $employee->born_date }}
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-500">
                    Admin
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                    <a href="{{ route('employees.edit',$employee) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
                <td>
                <!-- <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                    @csrf
                    <a href="{{ route('employees.destroy',$employee) }}" class="text-indigo-600 hover:text-indigo-900">Delete</a>
                     
                </td> -->
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                @csrf
                {{ method_field('DELETE') }}  
                <button class="leading-4 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" title="Delete"> 
                Remove employee </button> 
                </form>
                </td>                                                      
                </tr>
                @endforeach
                
            <!-- More rows... -->
        </tbody>
        
        </table>
         </div>
        </div>
    </div>
</div>

</div>
</x-employees>
