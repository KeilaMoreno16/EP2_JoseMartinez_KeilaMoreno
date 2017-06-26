@extends('layouts.app')
@section('content')
{!!Form::open(['url'=> '/categories/', 'method' => 'POST', 'class'=> 'inline-block'])!!}

  Nombre de la descripción :
  {{ Form:: text('name','',['class'=>'form-control']) }}


  Descripción de la categoria:
  {{ Form:: textarea('description','',['class'=>'form-control']) }}


<input type="submit" class="btn btn-success" name="" value="Guardar">
{!! Form::close() !!}

@endsection
