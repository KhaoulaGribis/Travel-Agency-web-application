<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{

    protected $fillable = [
        'code', 'discount', 'max_user','pourcentage','expires_at', 'package_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    use HasFactory;
}
