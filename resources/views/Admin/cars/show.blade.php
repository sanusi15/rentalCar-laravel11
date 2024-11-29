<x-admin.layout>
    <main class="flex-grow p-6">
        {{-- page title start --}}
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Cars</h4>
        </div>

        <form action="{{route('save_cars')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid lg:grid-cols-4 gap-6">
                <div class="col-span-2 flex flex-col gap-6">
                    <div class="card p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="card-title">Add Cars Images</h4>
                            <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                                <i class="mgc_add_line"></i>
                            </div>
                        </div>
                        <div class="flex items-center justify-center text-gray-700 dark:text-gray-300 h-80 ring-2 ring-slate-500 rounded-md overflow-hidden">
                            <div class="w-full h-full flex justify-center items-center">
                                @if ($car->image_url != NULL || $car->image_url == '')
                                    <img src="{{asset('storage/images/cars/'.$car->image_url)}}" alt="" class="w-full h-full object-cover">
                                @else
                                    <i class="mgc_pic_2_line text-9xl" id="default-image"></i>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-2 space-y-6 lg:order-3">
                    <div class="card p-6">
                        <div class="grid lg:grid-cols-2 gap-4">
                            <div class="flex flex-col gap-3">
                                <div class="grid md:grid-cols-3 gap-2">
                                    <label for="col-span-1">Status</label>
                                    <div class="flex justify-center gap-2 items-center w-full col-span-2">
                                        @if ($car->status == 'Available')
                                            <img src="{{asset('images/icons/check_circle_fill.svg')}}" alt="">
                                        @elseif($car->status == 'Rented')
                                            <img src="{{asset('images/icons/time_fill.svg')}}" alt="">
                                        @elseif ($car->status == 'No Available')
                                            <img src="{{asset('images/icons/close_circle_fill.svg')}}" alt="">
                                        @else
                                        @endif
                                        <input type="text" class="form-input cursor-default col-span-1 w-full" disabled value="{{$car->status}}">                                
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-3 gap-2">
                                    <label for="col-start-1">Tipe</label>                              
                                    <input type="text" class="form-input cursor-default col-span-2" disabled value="{{$car->type->name}}">
                                </div>
                                <div class="grid md:grid-cols-3 gap-2">
                                    <label for="col-start-1">Model</label>
                                    <input type="text" class="form-input cursor-default col-span-2" disabled value="{{$car->model->name}}">
                                </div>
                            </div>
                            <div class="flex flex-col gap-3">
                                <div class="grid md:grid-cols-3 gap-2">
                                    <label for="">Daily Rate</label>
                                    <input type="text" class="form-input col-span-2 cursor-default text-end" disabled value="{{Number::format($car->daily_rate)}}">
                                </div>
                                <div class="grid md:grid-cols-3 gap-2">
                                    <label for="">Weekley Rate</label>
                                    <input type="text" class="form-input col-span-2 cursor-default text-end" disabled value="{{Number::format($car->weekly_rate)}}">
                                </div>
                                <div class="grid">
                                    @if ($car->status != 'Available')
                                        <button type="button" class="btn bg-gray-400 text-white cursor-no-drop">Rent now</button>
                                    @else
                                        <a href="#" class="btn bg-blue-500 text-white">Rent now</a>
                                        
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-span-2 space-y-6 lg:order-2">
                    <div class="card p-6">
                        <div class="flex justify-between items-center mb-4">
                            <p class="card-title">Genrel Product Data</p>
                            <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                                <i class="mgc_transfer_line"></i>
                            </div>
                        </div>
                        <div class="flex flex-col gap-3">
                            <div class="grid md:grid-cols-2 gap-2">
                                <label for="">Color</label>
                                <input type="text" class="form-input cursor-default" disabled value="{{$car->color}}">
                            </div>
                            <div class="grid md:grid-cols-2 gap-2">
                                <label for="">Engine Size</label>
                                <input type="text" class="form-input cursor-default" disabled value="{{$car->engine_size}}">
                            </div>
                            <div class="grid md:grid-cols-2 gap-2">
                                <label for="">Transmission</label>
                                <input type="text" class="form-input cursor-default" disabled value="{{$car->transmission}}">
                            </div>
                            <div class="grid md:grid-cols-2 gap-2">
                                <label for="">Fuel</label>
                                <input type="text" class="form-input cursor-default" disabled value="{{$car->fuel_type}}">
                            </div>
                            <div class="grid md:grid-cols-2 gap-2">
                                <label for="">Doors</label>
                                <input type="text" class="form-input cursor-default" disabled value="{{$car->doors}}">
                            </div>
                            <div class="grid md:grid-cols-2 gap-2">
                                <label for="">Seats</label>
                                <input type="text" class="form-input cursor-default" disabled value="{{$car->seats}}">
                            </div>
                            <div class="grid md:grid-cols-2 gap-2">
                                <label for="">Licence Plate</label>
                                <input type="text" class="form-input cursor-default" disabled value="{{$car->licence_plate}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-2 mt-5 order-last">
                    <div class="flex justify-start gap-3">
                        <a href="{{route('cars')}}" class="inline-flex items-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>

    </main>
    
</x-admin.layout>