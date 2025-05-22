<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'comment', 'vendor_id', 'type'];
    
    // Types of comments
    const TYPE_GENERAL = 'general';
    const TYPE_VENDOR = 'vendor';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vendor()
    {
        return $this->belongsTo(VendorTypeModel::class);
    }
}