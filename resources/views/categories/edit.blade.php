@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
  {!!Form::open(['url'=> '/categories/'.$category->id ,'method' => 'PATCH', 'class'=> 'inline-block','files' => true])!!}
    Nombre de categoria:
    {{ Form:: text('name',$category->name,['class'=>'form-control']) }}

    Descripción del categoria:
    {{ Form:: textarea('description',$category->description,['class'=>'form-control']) }}

  
  <input type="submit" class="btn btn-success" name="" value="Guardar">
  {!! Form::close() !!}
  @else
  <img src="/images/errors/401.png" width="100%" height="100%" >
  <a href="../categories/">Regresar</a>
@endif
@endsection
