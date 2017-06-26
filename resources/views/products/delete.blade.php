@if(Auth::user()->admin())
  {!!Form::open(['url'=> '/products/'.$product->id,'method' => 'DELETE', 'class'=> 'inline-block'])!!}
  <input type="submit" class="btn btn-link red-text no-padding no-marging no-transform" name="" value="Delete">
  {!! Form::close() !!}
@endif
