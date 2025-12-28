<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'duration_hours',
        'description',
        'recommend_passenger',
        'max_passenger',
        'facilities',
    ];
    public function bookCars()
    {
        return $this->hasMany(BookCar::class);
    }
}
