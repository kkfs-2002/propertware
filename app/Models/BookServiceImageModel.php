<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookServiceImageModel extends Model
{
    protected $table = 'book_service_image';

    protected $fillable = [
        'book_service_id',
        'attachment_image'
    ];

    public function bookService()
    {
        return $this->belongsTo(BookServiceModel::class, 'book_service_id');
    }
}