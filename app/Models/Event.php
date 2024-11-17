<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ["title", "place", "date"];
    public function dispatchs()
    {
        return $this->hasMany(Dispatch::class);
    }
}
