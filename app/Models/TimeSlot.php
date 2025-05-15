<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id', 
        'service_id', 
        'day_of_week', 
        'start_time', 
        'end_time',
        'status' 
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Add this if you need to format time accessors
    public function getStartTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }

    public function getEndTimeAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('H:i');
    }
}