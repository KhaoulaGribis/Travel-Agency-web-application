<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'prix_unit',
        'photo',
        'date_retour',
        'date_depart',
        'nbr_place_dispo',
        'destination',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reserv::class, 'pkg_id');
    }

    public function getAvailablePlacesAttribute()
    {
        $reservedPlaces = $this->reservations()->sum('quantity');
        return $this->nbr_place_dispo - $reservedPlaces;
    }
}
