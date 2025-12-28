<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCar extends Model
{
    use HasFactory;

    protected $table = 'book_cars';

    protected $fillable = [
        'car_name',
        'name',
        'email',
        'phone',
        'country',
        'passenger',
        'booking_date',
        'rental_duration',
        'pickup_location',
        'room_no',
        'pickup_time',
        'message',
        'status', // ✅ TAMBAHKAN INI
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

}
