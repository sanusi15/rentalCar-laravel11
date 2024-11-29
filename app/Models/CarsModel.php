<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarsModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cars_model',
        'name',
    ];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class, 'model');
    }
}
