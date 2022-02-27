<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bill extends Model
{
    use SoftDeletes;

    protected $table = 'bills';

    protected $fillable = ['number', 'first_name', 'last_name', 'telephone'];

    public function products()
    {
        return $this->hasMany(BoughtProduct::class);
    }
}
