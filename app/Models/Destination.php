<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'location',
        'latitude',
        'longitude',
        'ticket_price',
        'rating',
        'operational_hours',
        'thumbnail',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'destination_id', 'user_id')->withTimestamps();
    }
}

