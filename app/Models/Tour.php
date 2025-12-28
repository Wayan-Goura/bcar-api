<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover_image',
        'price',
        'image_1', 'desc_1',
        'image_2', 'desc_2',
        'image_3', 'desc_3',
        'image_4', 'desc_4',
    ];

    public function bookTours()
    {
        return $this->hasMany(BookTour::class);
    }
}
