<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'seats_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function Seats()
    {
        return $this->belongsTo(Seats::class, 'seats_id', 'id');
    }
}
