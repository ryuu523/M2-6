<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispatch extends Model
{
    protected $fillable = ["event_id", "worker_id", "approval", "memo"];
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
