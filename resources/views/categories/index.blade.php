@extends('layouts.app')
@section('content')
<div class="container">
  @foreach($categories as $category)
  <div class="col-md-4">
    <h3>{{$category->name}}</h3>
    <p>{{$category->description}}</p>
    <a class="col-xs-12" href="{{url('/categories/'.$category->id.'/edit')}}">Editar</a>
    @include('categories.delete',['category'=>$category])
  </div>
  @endforeach
  <div class="class-col-x12">
    {{ $categories->links()}}
  </div>
</div>
@endsection
