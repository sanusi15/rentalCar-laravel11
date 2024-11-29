<x-admin.layout>
    <main class="flex-grow p-6">
        {{-- page title start --}}
        <div class="flex justify-between items-center mb-6">
            <h4 class="text-slate-900 dark:text-slate-200 text-lg font-medium">Cars</h4>
        </div>

        <form action="{{route('update_cars', $car->cars_id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid lg:grid-cols-4 gap-6">
                <div class="col-span-1 flex flex-col gap-6">
                    <div class="card p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h4 class="card-title">Add Cars Images</h4>
                            <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                                <i class="mgc_add_line"></i>
                            </div>
                        </div>
                        <div class="flex items-center justify-center text-gray-700 dark:text-gray-300 h-52 ring-2 ring-slate-500 rounded-md cursor-pointer cinp-image">
                            <div class="flex items-center justify-center ">
                                @if ($car->image_url == NULL || $car->image_url == '')
                                    <i class="mgc_pic_2_line text-8xl" id="default-image"></i>
                                @else
                                    <div class="justify-center items-center w-40 h-40 rounded-2xl overflow-hidden" id="cpreview-image">
                                        <img src="{{asset('storage/images/cars/'.$car->image_url)}}" alt="" id="preview-image" class="w-full h-full object-cover">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <input type="file" class="hidden" id="inp-image" name="image">
                        @error('image')
                            <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="lg:col-span-3 space-y-6">
                    <div class="card p-6">
                        <div class="flex justify-between items-center mb-4">
                            <p class="card-title">Genrel Product Data</p>
                            <div class="inline-flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-700 w-9 h-9">
                                <i class="mgc_transfer_line"></i>
                            </div>
                        </div>

                        <div class="flex flex-col gap-3">
                            <div class="grid md:grid-cols-2 gap-3">
                                <div>
                                    <label for="make" class="mb-2 block">Make <span class="text-red-500">*</span></label>
                                    <select id="make" class="selectize" id="make" name="make">
                                        @foreach($types as $t)
                                            <option value="{{$t->id_cars_type}}" {{$t->id_cars_type == $car->make_id ? 'selected' : ''}}>{{$t->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('make')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="model" class="mb-2 block">Model <span class="text-red-500">*</span></label>
                                    <select id="model" class="selectize" id="model" name="model">
                                        @foreach($models as $m)
                                            <option value="{{$m->id_cars_model}}" {{$t->id_cars_type == $car->model_id ? 'selected' : ''}} >{{$m->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('model')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-3">
                                <div>
                                    <label for="year" class="mb-2 block">Year <span class="text-red-500">*</span></label>
                                    <input type="text" class="form-input" id="year" name="year" value="{{$car->year}}">
                                    @error('year')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="color" class="mb-2 block">Color <span class="text-red-500">*</span></label>
                                    <input type="text" class="form-input" id="color" name="color" value="{{$car->color}}">
                                    @error('color')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-3">
                                <div>
                                    <label for="licence_plate" class="mb-2 block">Licence Plate <span class="text-red-500">*</span></label>
                                    <input type="text" class="form-input" id="licence_plate" name="licence_plate" value="{{$car->licence_plate}}">
                                    @error('licence_plate')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="engine_size" class="mb-2 block">Engine Size</label>
                                    <input type="text" class="form-input" id="engine_size" name="engine_size" value="{{$car->engine_size}}">
                                    @error('engine_size')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-3">
                                <div>
                                    <label for="fuel_type" class="mb-2 block">Fuel Type <span class="text-red-500">*</span></label>
                                    <select id="fuel_type" class="selectize" id="fuel_type" name="fuel_type">
                                        <option value="Gasoline" {{$car->fuel_type == 'Gasoline' ? 'selected' : ''}}>Gasoline (Bensin)</option>
                                        <option value="Diesel" {{$car->fuel_type == 'Diesel' ? 'selected' : ''}}>Diesel (Solar)</option>
                                        <option value="Electricicty" {{$car->fuel_type == 'Electricicty' ? 'selected' : ''}}>Electricity (Listrik)</option>
                                    </select>
                                    @error('fuel_type')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="transmission" class="mb-2 block">Transmission <span class="text-red-500">*</span></label>
                                    <select id="transmission" class="selectize" id="transmission" name="transmission">
                                        <option value="Automatic" {{$car->transmission == 'Automatic' ? 'selected' : ''}}>Automatic</option>
                                        <option value="Manual" {{$car->transmission == 'Manual' ? 'selected' : ''}}>Manual</option>
                                    </select>
                                    @error('transmission')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="grid md:grid-cols-2 gap-3">
                                <div>
                                    <label for="doors" class="mb-2 block">Doors <span class="text-red-500">*</span></label>
                                    <input type="number" class="form-input" id="doors" name="doors" value="{{$car->doors}}">
                                    @error('doors')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="seats" class="mb-2 block">Seats <span class="text-red-500">*</span></label>
                                    <input type="number" class="form-input" id="seats" name="seats" value="{{$car->seats}}">
                                    @error('seats')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="grid md:grid-cols-2 gap-3">
                                <div>
                                    <label for="condition" class="mb-2 block">Condition <span class="text-red-500">*</span></label>
                                    <select id="condition" class="selectize" id="condition" name="condition">
                                        <option value="New" {{$car->condition == 'New' ? 'selected' : ''}}>New</option>
                                        <option value="Used" {{$car->condition == 'Used' ? 'selected' : ''}}>Used</option>
                                    </select>
                                    @error('condition')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="status" class="mb-2 block">Status <span class="text-red-500">*</span></label>
                                    <select id="status" class="selectize" id="status" name="status">
                                        <option value="Available" {{$car->status == 'Available' ? 'selected' : ''}}>Available</option>
                                        <option value="Rented" {{$car->status == 'Rented' ? 'selected' : ''}}>Rented</option>
                                        <option value="No Available" {{$car->status == 'No Available' ? 'selected' : ''}}>No Available</option>
                                    </select>
                                    @error('status')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-3">
                                <div>
                                    <label for="daily_rate" class="mb-2 block">Daily Rate <span class="text-red-500">*</span></label>
                                    <input type="number" class="form-input" id="daily_rate" name="daily_rate" value="{{$car->daily_rate}}">
                                    @error('daily_rate')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <label for="weekly_rate" class="mb-2 block">Weekly Rate <span class="text-red-500">*</span></label>
                                    <input type="number" class="form-input" id="weekly_rate" name="weekly_rate" value="{{$car->weekly_rate}}">
                                    @error('weekly_rate')
                                        <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="">
                                <label for="description" class="mb-2 block">Cars Description</label>
                                <textarea id="description" class="form-input" id="description" name="description" rows="8">{{$car->description}}</textarea>
                                @error('description')
                                    <div class="px-2 py-1 text-red-500 text-xs">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 lg:block hidden">
                </div>
                
                <div class="lg:col-span-1 mt-5">
                    <div class="flex justify-start gap-3">
                        <a href="{{route('cars')}}" class="inline-flex items-center rounded-md border border-transparent bg-red-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none">
                            Cancle
                        </a>
                        <button type="submit" class="inline-flex items-center rounded-md border border-transparent bg-green-500 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none">
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>

    </main>
    
    <x-slot:customjs>{{$jsfile}}</x-slot:customjs>
</x-admin.layout>
