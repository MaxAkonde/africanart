<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getPrice()
    {
        $price = $this->price;
        $devise = ' FCFA';
        if($price > 900)
        {
            $price = floatval($price);
            return number_format($price, 2, '.', ' ') . $devise;
        }
        return number_format($price, 0) . $devise;
    }
}
