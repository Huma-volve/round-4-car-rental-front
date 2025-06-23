<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'carModel', 'gasoline', 'steering', 'rental_price_per_day',
        'TypeCar', 'Capacity', 'image',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favourites()
    {
        return $this->hasMany(Favourite::class);
    }

    public function favouritedBy()
    {
        return $this->belongsToMany(User::class, 'favourites');
    }
}
