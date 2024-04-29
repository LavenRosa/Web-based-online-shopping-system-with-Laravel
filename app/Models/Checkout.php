<?php

namespace App\Models;

use App\Models\Checkout;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone',
        'address',
        'state',
        'township',
        'ordernotes',
        'payment',
        'status',
        'tracking_no'
    ];
    public function Order(){
        return $this->belongsTo('App\Models\Order');
    }
}
