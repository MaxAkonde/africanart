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

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function values()
    {
        return $this->belongsToMany(Value::class)->withPivot('attribute_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->withPivot('price');
    }

    public function getPrice()
    {
        if(!is_null($this->price)){
            $price = $this->price;
            $devise = ' FCFA';
            if($price > 900)
            {
                $price = intval($price);
                return number_format($price, 0, '.', ' ') . $devise;
            }
            return number_format($price, 0) . $devise;
        }
        
        return false;
    }
}
