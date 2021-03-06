<x-employees>
<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 " >
        <div class="py-2  align-middle inline-block bg-gray-200 min-w-full sm:px-6 lg:px-8">

            <form class=" min-w-full  divide-y divide-gray-600 bg-gray-200 sm:px-6 lg:px-2" action="{{ route('employees.index') }}" method="GET" role="search">
                <div class="input-group">
                    <span class="input-group-btn mr-5 mt-1">

                        <input type="text" class="inline-flex items-center px-4 py-2  rounded-full border-black form-control mr-2" name="surname" placeholder="Search employee surname" id="surname" required>
                            <button class="btn btn-danger items-center " type="submit" title="Refresh page">
                                    <span class="fas fa-sync-alt"></span>

                                    <svg class="h-8 w-8 text-purple-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="11" cy="11" r="8" />  <line x1="21" y1="21" x2="16.65" y2="16.65" /></svg>

                            </button>

                    </span>
                </div>
            </form>

                <table class="min-w-full divide-y divide-gray-600 bg-gray-600" >
                @can('create', \App\Models\Employee::class)
                <a href="{{ route('employees.create') }}">
                    <button id="create" name="create" class="leading-4 bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-full"> Add employee </button>
                </a>
                @endcan

                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Name & email
                        </th>
                        <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Surname
                        </th>
                        <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Born Date
                        </th>
                        <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Photo
                        </th>
                        <th class="px-6 py-3 bg-gray-200 text-left text-xs leading-4 font-medium text-gray-600 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
        <tbody class="bg-white divide-y divide-gray-200">

                <tr>
                @foreach($employees as $employee)

                 <td class="px-6 py-4 whitespace-no-wrap">

                    <div class="ml-4">
                        <div class="text-sm leading-5 font-medium text-gray-900">
                            {{ $employee->name }}
                            <div class="text-sm leading-5 text-gray-500">
                            {{ $employee->email }}

                            <div class="w-full md:w-3/5 mx-auto p-8">
                                <div class="shadow-md">
                                    <div class="tab w-full overflow-hidden border-t">
                                        <input class="absolute opacity-0 " id="tab-multi-one"  name="tabs">
                                            <label class="block p-2 text-black leading-normal cursor-pointer" >Orders</label>
                                            @foreach($orders as $order)
                                                    @if($order->employee_id == $employee->id)
                                                    <div class="tab-content overflow-hidden border-l-2 bg-gray-100 text-black border-indigo-500 leading-normal">
                                                            <ul>
                                                                <li>
                                                                {{ $order->description }} <br>
                                                                </li>
                                                            </ul>
                                                    </div>
                                                    @endif
                                            @endforeach

                                </div>
                        </div>
                    </div>


                </td>
                    <td class="px-4 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">
                        {{  $employee->surname }}
                        </div>
                    </td>

                    <td class="px-4 py-4 whitespace-no-wrap">
                        <div class="text-sm leading-5 text-gray-900">
                        {{  $employee->born_date }}
                        </div>
                    </td>

                    <td class="px-4 py-4 whitespace-no-wrap">
                        @if($employee->file_path)
                        <span class="px-8 .w-1/2 text-m .pl-24 .space-y-64 leading-5 font-semibold rounded-full  bg-green-200 text-white-800">
                        Yes
                        <span>
                        @else
                        <span class="px-8 .w-1/2 text-m .pl-24 .space-y-64 leading-5 font-semibold rounded-full  bg-red-200 text-white-800">
                            No                       
                        <span>
                        @endif
                    </td>

                <td >
                    @can('update',$employee)
                    <div class="px-6 py-4 whitespace-no-wrap leading-5   overflow-hidden ">
                    <a href="{{ route('employees.edit',$employee) }}" title="Edit" class="text-indigo-600 hover:text-indigo-900"><svg class="h-8 w-8 text-green-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>   <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />  <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /> </svg>
                     </a>
                     @endcan

                    @cannot('update',$employee)
                    <svg class="h-8 w-8 text-red-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="9" cy="7" r="4" />  <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />  <line x1="19" y1="7" x2="19" y2="10" />  <line x1="19" y1="14" x2="19" y2="14.01" /></svg>
                    <p>Unauthorized</p>
                    @endcannot

                    </div>
                        @can('delete',$employee)
                        <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                            <button class="leading-4 bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full" type="submit" title="Delete">
                            Remove employee </button>
                        @endcan
                        </form>
                      </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
                <div class="px-6 py-4">
                {{ $employees->links() }}
                </div>
         </div>
        </div>
    </div>
</div>

</div>
</x-employees>
