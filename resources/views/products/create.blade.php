@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
  {!!Form::open(['url'=> '/products/', 'method' => 'POST', 'class'=> 'inline-block'])!!}
    Nombre del producto:
    {{ Form:: text('name','',['class'=>'form-control']) }}


    Descripción del producto:
    {{ Form:: textarea('description','',['class'=>'form-control']) }}

    Precio del producto:
    {{ Form:: text('price','',['class'=>'form-control']) }}

    Categoria del producto:
    {{ Form:: select('category_id',$categories,['class'=>'form-control']) }}

  <input type="submit" class="btn btn-success" name="" value="Guardar">
  {!! Form::close() !!}
  @else
  <img src="/images/errors/401.png" width="100%" height="100%" >
  <a href="../products/">Regresar</a>
@endif
@endsection
