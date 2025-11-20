<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
}
