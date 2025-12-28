<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTour extends Model
{
    use HasFactory;

    protected $table = 'book_tours';

    protected $fillable = [
        'tour_name',
        'name',
        'email',
        'participants',
        'phone',
        'booking_date',
        'pickup_location',
        'room_no',
        'pickup_time',
        'message',
        'status',
        'price'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
