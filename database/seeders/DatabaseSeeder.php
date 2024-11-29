<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarsModel;
use App\Models\CarsType;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::factory()->create([
            'name' => 'Sanusi',
            'username' => 'sanusi123',
            'is_admin' => 1,
            'password' => bcrypt('password'),
            'email' => 'test@example.com',
        ]);


        // Car::factory(50)->recycle([
        //     CarsType::factory(4)->create(),
        //     CarsModel::factory(4)->create()
        // ])->create();

        $carTypes = CarsType::factory(4)->create();
        $carModels = CarsModel::factory(4)->create();

        // Membuat 50 mobil dengan menggunakan carTypes dan carModels yang sudah dibuat
        Car::factory(50)->create([
            'make_id' => $carTypes->random()->id_cars_type, // Menggunakan tipe mobil secara acak
            'model_id' => $carModels->random()->id_cars_model, // Menggunakan model mobil secara acak
        ]);

        
       
    }
}
