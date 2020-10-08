<x-employees>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                <a href="{{ route('employees.create') }}">
                    <button class="leading-6 bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"> Add employee </button>                                                       
                </a>
        
        <thead>
            <tr>           
                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Name
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
        <style>
         /* Tab content - closed */
         .tab-content {
         max-height: 0;
         -webkit-transition: max-height .35s;
         -o-transition: max-height .35s;
         transition: max-height .35s;
         }
         /* :checked - resize to full height */
         .tab input:checked ~ .tab-content {
         max-height: 100vh;
         }
         /* Label formatting when open */
         .tab input:checked + label{
         /*@apply text-xl p-5 border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
         font-size: 1.25rem; /*.text-xl*/
         padding: 1.25rem; /*.p-5*/
         border-left-width: 2px; /*.border-l-2*/
         border-color: #6574cd; /*.border-indigo*/
         background-color: #f8fafc; /*.bg-gray-100 */
         color: #6574cd; /*.text-indigo*/
         }
         /* Icon */
         .tab label::after {
         float:right;
         right: 0;
         top: 0;
         display: block;
         width: 1.5em;
         height: 1.5em;
         line-height: 1.5;
         font-size: 1.25rem;
         text-align: center;
         -webkit-transition: all .35s;
         -o-transition: all .35s;
         transition: all .35s;
         }
         /* Icon formatting - closed */
         .tab input[type=checkbox] + label::after {
         content: "+";
         font-weight:bold; /*.font-bold*/
         border-width: 1px; /*.border*/
         border-radius: 9999px; /*.rounded-full */
         border-color: #b8c2cc; /*.border-grey*/
         }
         .tab input[type=radio] + label::after {
         content: "\25BE";
         font-weight:bold; /*.font-bold*/
         border-width: 1px; /*.border*/
         border-radius: 9999px; /*.rounded-full */
         border-color: #b8c2cc; /*.border-grey*/
         }
         /* Icon formatting - open */
         .tab input[type=checkbox]:checked + label::after {
         transform: rotate(315deg);
         background-color: #6574cd; /*.bg-indigo*/
         color: #f8fafc; /*.text-grey-lightest*/
         }
         .tab input[type=radio]:checked + label::after {
         transform: rotateX(180deg);
         background-color: #6574cd; /*.bg-indigo*/
         color: #f8fafc; /*.text-grey-lightest*/
         }
      </style>
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
                                        <input class="absolute opacity-0 " id="tab-multi-one" type="checkbox" name="tabs">
                                        <label class="block p-5 leading-normal cursor-pointer" for="tab-multi-one">Orders</label>
                                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                                  @foreach($orders as $order)
                                  @if($order->employee_id == $employee->id)
                                  {{ $order->description }} <br>
                                    @endif
                                    @endforeach
                                  <!-- <p class="p-5">   </p> -->
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
