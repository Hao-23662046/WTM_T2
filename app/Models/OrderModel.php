<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

    protected $fillable = [
        'order_customer',
        'order_date',
        'order_status',
        'order_note',
    ];

    // Quan hệ với chi tiết đơn hàng
    public function details()
    {
        return $this->hasMany(OrderDetailModel::class, 'order_id', 'order_id');
    }
}
