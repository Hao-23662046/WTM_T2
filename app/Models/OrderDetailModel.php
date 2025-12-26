<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetailModel extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'order_detail_id';
    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'order_product_id',
        'order_product_quantity',
        'order_product_price',
    ];

    // Quan hệ ngược với đơn hàng (nếu muốn)
    public function product()
        {
            return $this->belongsTo(ProductModel::class, 'order_product_id', 'product_id');
        }

}
