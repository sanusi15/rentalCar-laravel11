<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarsType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_cars_type',
        'name',
    ];
}
