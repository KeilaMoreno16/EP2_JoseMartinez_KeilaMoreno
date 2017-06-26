<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order_product;
use App\Product;
use App\Order;
use App\User;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        $users = User::all();
        return view('orders.index',['orders'=>$orders,'users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $id = DB::table('orders')->insertGetId(
        ['user_id' => $request->user_id, 'status' => 'pendiente']
      );
      $shopping_cart = \Session::get('cart.orderProduct');
      $orders = new Order_product();
      foreach ($shopping_cart as $product) {
        $orders->order_id = $id;
        $orders->product_id = $product->product_id;
        $orders->qty = $product->qty;
        $orders->save();
      }
      $total = 0;
      $ProductSize = 0;
      $shopping_cart = array();
      $products = Product::paginate(100);
      return view('products.index',[
        'shopping_cart'=>$shopping_cart,
        'total'=>$total,
        'productSize'=>$ProductSize,
        'products'=>$products
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
