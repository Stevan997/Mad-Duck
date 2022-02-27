<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;

    protected $table = 'bills';

    protected $fillable = ['serial_number', 'first_name', 'last_name', 'telephone', 'store_id'];

    public function products()
    {
        return $this->hasMany(BoughtProduct::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
