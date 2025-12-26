<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    public $timestamps = false;

    protected $fillable = [
        'product_name',
        'product_img',
        'product_price',
        'product_category',
        'product_description',
    ];
}
