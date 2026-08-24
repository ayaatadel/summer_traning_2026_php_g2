<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use APP\Models\Category;
use APP\Models\Order_Item;

class Product extends Model
{
    //
    function category()
    {
        return $this->belongsTo(Category::class);
    }
    function order_items()
    {
        return $this->hasMany(Order_Item::class);
    }
}
