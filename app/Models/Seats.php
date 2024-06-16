<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Seats extends Model
{
    use HasFactory;
    protected $fillable = [
        'seats_name',
        'status',
    ];

    public function Reservation()
    {
        return $this->hasMany(Reservation::class, 'seats_id', 'id');
    }
}
