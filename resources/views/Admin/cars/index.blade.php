<x-admin.layout>
    <main class="flex-grow p-6">
        {{-- page title start --}}
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Cars</h4>
        </div>
        @if (session('success'))
            <div id="dismiss-alert" class="transition duration-300 bg-success/25 rounded-md p-2" role="alert">
                <div class="flex items-center gap-3">
                    <div class="flex-shrink-0">
                        <i class="mgc_check_circle_line text-success text-xl"></i>
                    </div>
                    <div class="flex-grow">
                        <div class="text-sm text-success font-medium">
                            <span class="font-bold">Success.</span> <span>{{session('success')}}</span>
                        </div>
                    </div>
                    <button data-fc-dismiss="dismiss-alert" type="button" id="dismiss-test" class="ms-auto h-6 w-6 p-4 rounded-full bg-gray-200 flex justify-center items-center">
                        <i class="mgc_close_line text-sm"></i>
                    </button>
                </div>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="flex justify-between items-center">
                    <h4 class="card-title">Cars List</h4>
                </div>
            </div>
            <div class="p-6">
                <p class="text-sm text-slate-700 dark:text-slate-400 mb-4">Manage your car here: {{$cars->currentPage()}}</p>
                
                {{-- table --}}
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
                                    <a href="/add_cars" class="btn bg-primary text-white"><i class="mgc_add_line text-base me-4"></i> Add data</a>
                                </div>
                            </div>
                            <div class="overflow-hidden">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                            <th scope="col" class="px-1 py-3 pe-0">#</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cars ID</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Image</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Model</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Color</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Doors</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Seats</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Daily Rate</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Weekley Rate</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                        @foreach ($cars as $car)
                                            <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                                                <td class="px-4 py-3 text-center">{{ ($cars->currentPage() - 1) * $cars->perPage() + $loop->iteration }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$car->cars_id}}</td>
                                                <td class="px-6 py-2 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 cursor-pointer">
                                                    <div class="w-36 h-28 flex items-center justify-center rounded-md overflow-hidden">
                                                        @if ($car->image_url != NULL || $car->image_url == '')
                                                            <a class="image-popup" href="{{asset('storage/images/cars/'.$car->image_url)}}">
                                                                <div class="relative block overflow-hidden rounded group transition-all duration-500">
                                                                    <img src="{{asset('storage/images/cars/'.$car->image_url)}}" class="rounded transition-all duration-500 group-hover:scale-105" alt="work-image">
                                                                </div>
                                                            </a>
                                                        @else
                                                            <i class="mgc_pic_2_line text-9xl" id="default-image"></i>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$car->type->name}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$car->model->name}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">{{$car->color}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 text-center">{{$car->doors}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 text-center">{{$car->seats}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 text-end">{{Number::format($car->daily_rate, precision: 2)}}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200 text-end">{{Number::format($car->weekly_rate, precision: 2)}}</td>
                                                <td class="px-1 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                    <div class="flex gap-2 justify-center">
                                                         @if ($car->status == 'Available')
                                                            <img src="{{asset('images/icons/check_circle_fill.svg')}}" alt="">
                                                        @elseif($car->status == 'Rented')
                                                            <img src="{{asset('images/icons/time_fill.svg')}}" alt="">
                                                        @elseif ($car->status == 'Not Available')
                                                            <img src="{{asset('images/icons/close_circle_fill.svg')}}" alt="">
                                                        @else
                                                        @endif
                                                        {{$car->status}}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap ">
                                                    <div class="text-center text-sm font-medium flex gap-5 items-center justify-center">
                                                        <a href="{{route('show_cars', ['car' => $car->cars_id]) }}"  class="bg-green-200 w-8 h-8 p-2 rounded-md" title="show">
                                                            <img src="{{asset('images/icons/eye_line.svg')}}" alt="">
                                                        </a>
                                                        <a href="{{route('edit_cars', ['car' => $car->cars_id])}}" class="bg-blue-200 w-8 h-8 p-2 rounded-md" title="edit">
                                                            <img src="{{asset('images/icons/pen_2_fill.svg')}}" alt="">
                                                        </a>
                                                        <form action="{{route('delete_cars', ['car' => $car->cars_id])}}" method="post">
                                                            @csrf
                                                            <button type="submit" class="bg-danger/25 w-8 h-8 p-2 rounded-md sweetalert-params-delete" title="delete">
                                                                <img src="{{asset('images/icons/delete_3_line.svg')}}" alt="">
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination-container py-1 px-4">
                                {{ $cars->links('vendor.pagination.tailwind') }}
                            </div>
                            {{-- <div class="py-1 px-4">
                                <nav class="flex justify-end items-center space-x-2">
                                    <div>
                                        <a class="text-gray-400 hover:text-primary p-4 inline-flex items-center gap-2 font-medium rounded-md" href="{{$cars->previousPageUrl()}}">
                                            <span aria-hidden="true">«</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="w-10 h-10 p-4 inline-flex items-center text-sm font-medium rounded-full {{$cars->currentPage() == 1 ? 'bg-primary text-white' : 'text-slate-400'}}" 
                                            href="{{$cars->currentPage() == 1 ? $cars->url($cars->currentPage()) : $cars->url($cars->currentPage() -1)}}" aria-current="page">
                                            {{$cars->currentPage() == 1 ? '1' : $cars->currentPage() - 1}}
                                        </a>
                                        <a class="w-10 h-10 hover:text-primary p-4 inline-flex justify-center items-center text-sm font-medium rounded-full {{$cars->currentPage() != 1 ? 'bg-primary text-white' : 'text-slate-400'}}"
                                            href="{{$cars->currentPage() == 1 ? $cars->url($cars->currentPage() + 1) : $cars->url($cars->currentPage())}}">
                                            {{$cars->currentPage() == 1 ? '2' : $cars->currentPage()}}
                                        </a>
                                        <a class="w-10 h-10 hover:text-primary p-4 inline-flex justify-center items-center text-sm font-medium rounded-full {{$cars->currentPage() == $cars->lastPage() ? 'bg-primary text-white' : 'text-slate-400'}}" 
                                            href="{{$cars->currentPage() == 1 ? $cars->url($cars->currentPage() + 2) : $cars->url($cars->currentPage() + 1)}}">
                                            {{$cars->currentPage() == 1 ? '3' : $cars->currentPage() + 1}}
                                        </a>
                                        <a class="text-gray-400 hover:text-primary p-4 inline-flex justify-center items-center gap-2 font-medium rounded-md" href="{{$cars->nextPageUrl()}}">
                                            <span class="sr-only">Next</span>
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </div>
                                </nav>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>      
        <div class="card mt-10">
            <p>hello</p>
             <table id="cars-table" class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr class="divide-x divide-gray-200 dark:divide-gray-700">
                        <th scope="col" class="px-1 py-3 pe-0">#</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cars ID</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Image</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Model</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Color</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Doors</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Seats</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Daily Rate</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Weekley Rate</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                </tbody>
            </table>
        </div>
    </main>
    <x-slot:customjs>{{$jsfile}}</x-slot:customjs>
</x-admin.layout>

