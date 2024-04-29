<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Order;
use App\Models\Category;
use App\Models\AddToCart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'image',
        'detail',
        'brand_id',
        'arrival_date'
    ];
    public function Category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }
    public function addtocart(){
        return $this->hasMany(AddToCart::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
    public static function search($search)
    {
        $searchs = explode(' ', $search);
        $query = self::query();
        foreach ($searchs as $term) {
            $query->where(function ($q) use ($term) {
                $q->where('name', 'LIKE', '%' . $term . '%');
                    //->orWhere('categor', 'LIKE', '%' . $term . '%');
            });
        }

        return $query->get();
    }

}
