<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinBuilder extends Model
{
    use HasFactory;
    public function customer()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }
}
