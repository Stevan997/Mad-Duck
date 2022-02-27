<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    protected $table = 'stores';

    protected $fillable = ['name', 'store_type_id'];

    public function type()
    {
        return $this->belongsTo(StoreType::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
