<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarsModel;
use App\Models\CarsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    public function index()
    {
        return view('admin/cars/index', [
            'cars' => Car::with(['type', 'model'])->paginate(10),
        ])->with('jsfile', 'cars.js');
    }

    public function create()
    {
        return view('admin/cars/add', [
            'models' => CarsModel::get(),
            'types' => CarsType::get(),
        ])->with('jsfile', 'cars.js');
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'color' => 'required',
            'licence_plate' => 'required|unique:cars',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'doors' => 'required|numeric',
            'seats' => 'required|numeric',
            'condition' => 'required',
            'status' => 'required',
            'daily_rate' => 'required|numeric',
            'weekly_rate' => 'required|numeric',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            ]);
            $image = $request->file('image');
            $image->storeAs('public/images/cars', $image->hashName());
        }
        Car::create([
            'cars_id' => $this->generate_id(),
            'image_url' => $request->image ? $image->hashName() : null,
            'make_id' => $request->make,
            'model_id' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
            'licence_plate' => $request->licence_plate,
            'engine_size' => $request->engine_size,
            'fuel_type' => $request->fuel_type,
            'transmission' => $request->transmission,
            'doors' => $request->doors,
            'seats' => $request->seats,
            'condition' => $request->condition,
            'status' => $request->status,
            'daily_rate' => $request->daily_rate,
            'weekly_rate' => $request->weekly_rate,
            'description' => $request->description,
        ]);
        return redirect()->route('cars')->with('success', 'Car created successfully');
    }

    public function show(Car $car)
    {
        return view('admin/cars/show', ['car' => $car]);
    }

    public function edit(Car $car)
    {
        return view('admin/cars/edit', [
            'car' => $car,
            'models' => CarsModel::get(),
            'types' => CarsType::get(),
        ])->with('jsfile', 'cars.js');
        
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'year' => 'required|numeric',
            'color' => 'required',
            'licence_plate' => [
                'required',
                Rule::unique('cars')->ignore($car->cars_id, 'cars_id'),
            ],
            'fuel_type' => 'required',
            'transmission' => 'required',
            'doors' => 'required|numeric',
            'seats' => 'required|numeric',
            'condition' => 'required',
            'status' => 'required',
            'daily_rate' => 'required|numeric',
            'weekly_rate' => 'required|numeric',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:4048',
            ]);
            $oldImage = $car->image_url;
            if($oldImage && Storage::exists('public/images/cars/'.$oldImage)){
                Storage::delete('public/images/cars/'.$oldImage);
            }
            $image = $request->file('image');
            $imagePath = $image->hashName();
            $image->storeAs('public/images/cars', $imagePath);
            $request->merge(['image_url' => basename($imagePath)]);
        }
        $car->update($request->all());
        return redirect()->route('cars')->with('success', 'Car has been updated');
        
    }

    public function destroy($id)
    {
        $car = Car::where('cars_id', $id)->firstOrFail();
        $car->delete();
        return redirect()->route('cars')->with('success', 'Car has been deleted');
    }

    function generate_id()
    {
        $cars = Car::all();
        if($cars->count() >= 1){
            $lastCar = Car::orderBy('cars_id', 'desc')->first();
            $lastNumber = intval(substr($lastCar->cars_id, -1)) + 1;
            $uniqueid = 'CAR' . str_pad($lastNumber, 5, '0', STR_PAD_LEFT);
        }else{
            $uniqueid = 'CAR00001';
        }
        return $uniqueid;
    }

    public function type()
    {
        $CarsType = CarsType::all();
        return view('admin/cars/type/type', ['CarsType' => $CarsType])->with('jsfile', 'cars_type.js');
    }

    public function save_type(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cars = CarsType::all();
        if($cars->count() >= 1){
            $lastType = CarsType::orderBy('id_cars_type', 'desc')->first();
            $lastNumber = intval(substr($lastType->id_cars_type, 1)) + 1;
            $uniqueid = 'T' . str_pad($lastNumber, 2, '0', STR_PAD_LEFT);
        }else{
            $uniqueid = 'T01';
        }
        CarsType::create([
            'id_cars_type' => $uniqueid,
            'name' => $request->name,
        ]);
        return redirect()->route('cars_type')->with('success', 'Car type created successfully');
    }

    public function update_type(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_type' => 'required'
        ]);
        CarsType::where('id_cars_type', $request->id_type)->update(['name' => $request->name]);
        return redirect()->route('cars_type')->with('success', 'Car type has been updated');
        
    }

    public function destroy_type($id)
    {
        $type = CarsType::where('id_cars_type', $id)->firstOrFail();
        $type->delete();
        return redirect()->route('cars_type')->with('success', 'Car type has been deleted');
    }

    public function model()
    {
        $CarsModel = CarsModel::all();
        return view('admin/cars/model/model', ['CarsModel' => $CarsModel])->with('jsfile', 'cars_type.js');
    }

    public function save_model(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cars = CarsModel::all();
        if($cars->count() >= 1){
            $lastType = CarsModel::orderBy('id_cars_model', 'desc')->first();
            $lastNumber = intval(substr($lastType->id_cars_model, 1)) + 1;
            $uniqueid = 'M' . str_pad($lastNumber, 2, '0', STR_PAD_LEFT);
        }else{
            $uniqueid = 'M01';
        }
        CarsModel::create([
            'id_cars_model' => $uniqueid,
            'name' => $request->name,
        ]);
        return redirect()->route('cars_model')->with('success', 'Car model created successfully');
        
    }

    public function update_model(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id_model' => 'required'
        ]);
        CarsModel::where('id_cars_model', $request->id_model)->update(['name' => $request->name]);
        return redirect()->route('cars_model')->with('success', 'Car model has been updated');
    }

    public function destroy_model($id)
    {
        $model = CarsModel::where('id_cars_model', $id)->firstOrFail();
        $model->delete();
        return redirect()->route('cars_model')->with('success', 'Car model has been deleted');
    }
}
