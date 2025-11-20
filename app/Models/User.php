<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['owner_id', 'brand', 'model', 'year', 'status'];

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
