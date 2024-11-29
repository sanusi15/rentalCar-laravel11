<x-admin.layout>
    <main class="flex-grow p-6">
        {{-- page title start --}}
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Cars</h4>
        </div>

         <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">List models</h4>
                </div>
            </div>
            <div class="p-6">
                @error('name')
                    <div class="bg-warning/25 text-warning  text-sm rounded-md p-4 mb-4" role="alert">
                        <span class="font-bold">Warning</span> {{$message}}
                    </div>
                @enderror
                @if(session('success'))
                    <div class="bg-success/25 text-success  text-sm rounded-md p-4 mb-4" role="alert">
                        <span class="font-bold">Success</span> {{session('success')}}
                    </div>
                @endif
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                            <div class="flex justify-between items-center gap-20">
                                <div class="py-3 px-4">
                                    <div class="relative max-w-xs">
                                        <label for="table-with-pagination-search" class="sr-only">Search</label>
                                        <input type="text" name="table-with-pagination-search" id="table-with-pagination-search" class="form-input ps-11" placeholder="Search for items">
                                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                            <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" >
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-3 px-4">
                                    <button type="button" data-fc-type="modal" class="btn bg-primary text-white"><i class="mgc_add_line text-base me-4"></i> Add data</button>
                                    <div class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden">
                                        <div class="mt-5 fc-modal-open:scale-100 duration-300 scale-90 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto  bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
                                            <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                                                <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                                                    Add model of cars
                                                </h3>
                                                <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                        data-fc-dismiss type="button">
                                                    <span class="material-symbols-rounded">close</span>
                                                </button>
                                            </div>
                                            <form action="{{route('add_model')}}" method="POST">
                                            @csrf
                                            <div class="px-4 py-8 overflow-y-auto">
                                                    <div class="flex gap-10">
                                                        <div class="">
                                                            <label for="name" class="mb-2 block">Name <span class="text-red-500">*</span></label>
                                                        </div>
                                                        <div class="flex-auto">
                                                            <input type="text" class="form-input" id="name" name="name">
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                                                    <button class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all"
                                                    data-fc-dismiss type="button">Close
                                                </button>
                                                <button type="submit" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded bg-primary hover:bg-primary-600 text-white">Save</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                            <th scope="col" class="px-1 py-3 pe-0">#</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type ID</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach($CarsModel as $row)
                                        <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                            <td class="py-1  text-center">{{$loop->iteration}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$row->id_cars_model}}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$row->name}}</td>
                                            <td class="px-6 py-4 flex items-center justify-center gap-4">
                                                 <button class="bg-blue-200 w-8 h-8 p-2 rounded-md btn-edit" data-fc-type="modal"  title="edit">
                                                    <img src="{{asset('images/icons/pen_2_fill.svg')}}" alt="">
                                                </button>
                                                <div class="w-full h-full fixed top-0 left-0 z-50 transition-all duration-500 hidden modal-edit">
                                                    <div class="mt-5 fc-modal-open:scale-100 duration-300 scale-90 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto  bg-white border shadow-sm rounded-md dark:bg-slate-800 dark:border-gray-700">
                                                        <div class="flex justify-between items-center py-2.5 px-4 border-b dark:border-gray-700">
                                                            <h3 class="font-medium text-gray-800 dark:text-white text-lg">
                                                                Edit model of cars
                                                            </h3>
                                                            <button class="inline-flex flex-shrink-0 justify-center items-center h-8 w-8 dark:text-gray-200"
                                                                    data-fc-dismiss type="button">
                                                                <span class="material-symbols-rounded">close</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('update_model')}}" method="POST">
                                                            @csrf
                                                            <div class="px-4 py-8 overflow-y-auto">
                                                                <div class="flex gap-10">
                                                                    <div class="">
                                                                        <label for="name" class="mb-2 block">Name <span class="text-red-500">*</span></label>
                                                                    </div>
                                                                    <div class="flex-auto">
                                                                        <input type="text" class="form-input" id="name" name="name" value="{{$row->name}}">
                                                                        <input type="hidden" name="id_model" value="{{$row->id_cars_model}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex justify-end items-center gap-4 p-4 border-t dark:border-slate-700">
                                                                <button class="py-2 px-5 inline-flex justify-center items-center gap-2 rounded dark:text-gray-200 border dark:border-slate-700 font-medium hover:bg-slate-100 hover:dark:bg-slate-700 transition-all"
                                                                data-fc-dismiss type="button">Close
                                                                    </button>
                                                                <button type="submit" class="py-2.5 px-4 inline-flex justify-center items-center gap-2 rounded bg-primary hover:bg-primary-600 text-white">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <form action="{{route('delete_model', ['car' => $row->id_cars_model])}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="bg-danger/25 w-8 h-8 p-2 rounded-md sweetalert-params-delete" title="delete">
                                                        <img src="{{asset('images/icons/delete_3_line.svg')}}" alt="">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach 
                                    </tbody>
                                </table>
                            </div>
                            <div class="py-1 px-4">
                                <nav class="flex justify-end items-center space-x-2">
                                    <a class="text-gray-400 hover:text-primary p-4 inline-flex items-center gap-2 font-medium rounded-md" href="#">
                                        <span aria-hidden="true">«</span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="w-10 h-10 bg-primary text-white p-4 inline-flex items-center text-sm font-medium rounded-full" href="#" aria-current="page">1</a>
                                    <a class="w-10 h-10 text-gray-400 hover:text-primary p-4 inline-flex items-center text-sm font-medium rounded-full" href="#">2</a>
                                    <a class="w-10 h-10 text-gray-400 hover:text-primary p-4 inline-flex items-center text-sm font-medium rounded-full" href="#">3</a>
                                    <a class="text-gray-400 hover:text-primary p-4 inline-flex items-center gap-2 font-medium rounded-md" href="#">
                                        <span class="sr-only">Next</span>
                                        <span aria-hidden="true">»</span>
                                    </a>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-slot:customjs>{{$jsfile}}</x-slot:customjs>
</x-admin.layout>