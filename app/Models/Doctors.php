<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function services(){
        return $this->belongsToMany(Service::class, 'service_doctor', 'doctor_id', 'service_id');
    }

}
