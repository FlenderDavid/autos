<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'car_id',
        'type',
        'mileage',
        'price',
        'comment'
    ];
    
    public function car(){
        return $this->belongsTo(Car::class);
    }
    use HasFactory;
}
