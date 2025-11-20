<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'owner_id',
        'brand',
        'model',
        'year',
        'status'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
