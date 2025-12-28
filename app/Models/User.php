<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin', // optional tapi disarankan
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'is_admin' => 'boolean',
    ];

    public function bookCars()
{
    return $this->hasMany(BookCar::class);
}

    public function bookTours()
    {
        return $this->hasMany(BookTour::class);
    }

}
