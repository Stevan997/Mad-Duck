<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoughtProduct extends Model
{
    use SoftDeletes;

    protected $table = 'bought_products';

    protected $fillable = ['bill_id', 'product_id', 'quantity', 'price', 'serial_number'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }
}
