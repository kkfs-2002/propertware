<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\AmcContract;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'contract_id',
        'service_type',
        'amount',
        'bank_name',
        'account_number',
        'slip',
        'status',
        'rejection_reason',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contract()
    {
        return $this->belongsTo(AmcContract::class, 'contract_id');
    }
}
