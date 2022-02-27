<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreType extends Model
{
    use SoftDeletes;

    protected $table = 'store_types';

    protected $fillable = ['name'];

    public function stores()
    {
        return $this->belongsTo(Store::class);
    }
}
