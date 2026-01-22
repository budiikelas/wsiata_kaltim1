<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = ['name'];

    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }
}
