<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reserv extends Model
{

    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'contact_number', 'gender', 'departure_city', 'quantity','coupon', 'message', 'photo','pkg_id','clt_id'
    ];


    public function client()
    {
        return $this->belongsTo(Client::class,'clt_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'pkg_id');
    }
}

