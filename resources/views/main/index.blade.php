@extends('layouts.app');

@section('content')
  <div class="col-xs-12">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <input type="text" class="form-control" placeholder="¿Qué estas pensando?">
      <div class="col-md-9"></div>
      <div class="col-md-3">
        <input type="submit" class="form-control btn btn primary" value="Publicar">
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
@endsection
