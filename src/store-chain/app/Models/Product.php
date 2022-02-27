<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $fillable = ['product_number', 'name', 'store_id', 'product_type_id', 'price', 'quantity'];

    public function type()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
