<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookServiceModel extends Model
{
      protected $table = 'book_service';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'service_type_id',
        'category_id',
        'sub_category_id',
        'amc_free_service_id',
        'description',
        'special_instructions',
        'pet',
        'available_date',
        'status',
        'admin_notes',
        'estimated_response_time',
        'approved_at'
    ];

    // Status constants (0: approved, 1: rejected, 2: pending [optional])
 // In BookServiceModel.php
const STATUS_PENDING = 0;
const STATUS_APPROVED = 1;
const STATUS_REJECTED = 2;
const STATUS_ASSIGNED = 3;
const STATUS_USERAPPROVED = 4;

public function getStatusLabelAttribute()
{
    switch ($this->status) {
        case self::STATUS_APPROVED: return 'APPROVED';
        case self::STATUS_REJECTED: return 'REJECTED';
        case self::STATUS_USERAPPROVED: return 'USER APPROVED';
        case self::STATUS_ASSIGNED: return 'ASSIGNED';
        default: return 'PENDING';
    }

}   // Relationships
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function serviceType()
    {
        return $this->belongsTo(ServiceTypeModel::class, 'service_type_id');
    }
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategoryModel::class, 'sub_category_id');
    }
    public function amcFreeService()
    {
        return $this->belongsTo(AmcFreeServiceModel::class, 'amc_free_service_id');
    }
    public function images()
    {
        return $this->hasMany(BookServiceImageModel::class, 'book_service_id');
    }

    public static function getBookService($user_id, $request)
    {
        $query = self::query()
            ->with(['serviceType', 'category', 'subCategory', 'amcFreeService', 'images'])
            ->where('user_id', $user_id)
            ->orderBy('id', 'desc');

        if ($request->has('status') && $request->status !== null && $request->status !== '') {
            $query->where('status', $request->status);
        }

        return $query->paginate(20);
    }
}