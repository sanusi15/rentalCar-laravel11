<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'cars_id',
        'make_id', 
        'model_id', 
        'year', 
        'color', 
        'licence_plate',
        'engine_size',
        'fuel_type', 
        'transmission', 
        'doors', 
        'seats', 
        'status', 
        'condition', 
        'daily_rate', 
        'weekly_rate',
        'mileage',
        'description',
        'image_url'
    ];

    protected $protected = [
        'created_at', 
        'updated_at'
    ];

    public function type(): BelongsTo
    {
        return $this->belongsTo(CarsType::class,  'make_id', 'id_cars_type');
    }

    public function model() :BelongsTo
    {
        return $this->belongsTo(CarsModel::class, 'model_id', 'id_cars_model');
        
    }

}
