<?php

namespace App\Models;
use App\Models\Item;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddToCart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'quantity'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function item(){
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
}
