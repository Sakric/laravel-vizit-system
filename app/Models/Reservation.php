<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $guarded = [];
//    public $date = false;

    public $timestamps = true;
//    protected $casts = [
//        'date' => 'date hh:mm:ss'
//    ];

    public function doctor(){
        return $this->belongsTo(Doctors::class, 'doctor_id');
    }
}
