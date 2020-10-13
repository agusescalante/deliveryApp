<x-headeruser/>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
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
                                    <label class="block p-2 bg-green-400 text-black leading-normal cursor-pointer" >Orders</label>
                                    @foreach($orders as $order)
                                    @if($order->employee_id == $employee->id)
                                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">

                                        <ul>
                                                <li>
                                                {{ $order->description }} <br>
                                                
                                                </li>
                                        </ul>
                                        @endif  
                                        @endforeach

                                    </div>
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
                    Employee
                </td>
                <td>
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

