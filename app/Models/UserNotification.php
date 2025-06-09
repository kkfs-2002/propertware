<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $table = 'user_notifications';

    protected $fillable = [
        'user_id',
        'service_request_id',
        'type',
        'title',
        'message',
        'status',
        'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    // Status constants
    const STATUS_APPROVED = 0;
    const STATUS_REJECTED = 1;

    // Computed attribute for status label
    protected $appends = ['status_label'];

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case self::STATUS_APPROVED: return 'APPROVED';
            case self::STATUS_REJECTED: return 'REJECTED';
            default: return 'UNKNOWN';
        }
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function serviceRequest()
    {
        return $this->belongsTo(BookServiceModel::class, 'service_request_id');
    }

    // Scope for unread notifications
    public function scopeUnread($query)
    {
        return $query->where('is_read', 0);
    }
}