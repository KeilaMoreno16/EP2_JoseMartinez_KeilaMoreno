@extends('layouts.app')
@section('content')
<div class="container">
  <center>
    @if(!Auth::user()->admin())
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#carrito">Carrito</button>
    @endif
  </center>

  @foreach($products as $product)
  <div class="col-md-4">
    <img class="col-xs-12" src="/images/products/{{$product->image}}" />;
    <h3>{{$product->name}}</h3>
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    {!!Form::open(['url'=> '/shopping_carts/','method' => 'POST', 'class'=> 'inline-block'])!!}
      <input type="hidden" name="product_id" value="{{$product->id}}">
      <input type="hidden" name="product_name" value="{{$product->name}}">
      <input type="hidden" name="product_price" value="{{$product->price}}">
      <input type="hidden" name="product_description" value="{{$product->description}}">
      @if(!Auth::user()->admin())
        <label>cantidad:</label>
        <input type="number" name="qty">
        <input type="submit" name="" value="Agregar al carrito" class="col-xs-12 btn btn-success">
      @endif
    {!! Form::close() !!}
     @if(Auth::user()->admin())
       <a class="col-xs-12" href="{{url('/products/'.$product->id.'/edit')}}">Editar</a>
       @include('products.delete',['product'=>$product])
     @endif
  </div>
  @endforeach
  <div class="class-col-x12">
    {{ $products->links()}}
  </div>
</div>
<div id="carrito" class="modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Carrito de Compras</h4>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Producto</th>
              <th>Cantidad</th>
              <th>Subtotal</th>
            </tr>
          </thead>
          <tbody>
            @if($shopping_cart!=null)
              @foreach($shopping_cart as $product)
                <tr>
                  <td>{{$product->name}}</td>
                  <td>{{$product->qty}}</td>
                  <td>{{$product->price * $product->qty}}</td>
                </tr>
              @endforeach
              <tfoot>
                <tr>
                  <td>Total a pagar</td>
                  <td></td>
                  <td>{{$total}}</td>
                </tr>
              </tfoot>
            @endif
          </tbody>
        </table>
        @if($shopping_cart!=null)
          <div class="form-group">
            <label for="dir">Address:</label>
            <input type="text" class="form-control" value="{{Auth::user()->addresses}}" disabled>
          </div>
          <div class="form-group">
            <label for="dir">Phone:</label>
            <input type="text" class="form-control" value="{{Auth::user()->phone}}" disabled>
          </div>
          <div class="form-group">
            <label for="dir">Name:</label>
            <input type="text" class="form-control" value="{{Auth::user()->name}}">
          </div>
          {!!Form::open(['url'=> '/orders/','method' => 'POST', 'class'=> 'inline-block'])!!}
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <input type="submit" name="" value="Realizar compra" class="form-control btn btn-success">
          {!! Form::close() !!}
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
