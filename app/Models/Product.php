<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'name',
                            'price',
                            'toppings'];
    public function stores(){
        return $this -> belongsToMany(Store::class, 'store_products');
    }    

    public function toppings(){
        return $this -> belongsToMany(Topping::class, 'product_toppings');
    }
}


