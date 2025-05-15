<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['services'];

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class);
    }
}
