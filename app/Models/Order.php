<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkout_id',
        'item_id',
        'quantity',
        'price',
    ];
    public function Checkout(){
        return $this->belongsTo('App\Models\Checkout');
    }
    // public function Item(){
    //     return $this->belongsTo('App\Models\Item');
    // }
    public function Item(){
        return $this->belongsTo(Item::class);
    }

}
