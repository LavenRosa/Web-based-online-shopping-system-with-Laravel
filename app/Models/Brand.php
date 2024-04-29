<?php

namespace App\Models;

use App\Models\Item;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    protected $table = 'brands';
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
