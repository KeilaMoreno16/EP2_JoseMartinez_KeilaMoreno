<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order_product extends Model
{
    public static function productsSize(){
      return count(\Session::get('cart.orderProduct'));
    }

    public static function total(){
      $total=0;
      $shopping_cart = \Session::get('cart.orderProduct');
      foreach ($shopping_cart as $product) {
        $total = $total + ($product->price * $product->qty);
      }
      return $total;
    }

    public static function actualizar(Product $prod){
      $shopping_cart = \Session::get('cart.orderProduct');
      foreach ($shopping_cart as $product) {
        if($product->name == $prod->name){
          $product->qty = $product->qty + $prod->qty;
          return 1;
        }
      }
    }

}
