@extends('layouts.app')
@section('content')
@if(Auth::user()->admin())
  <div class="container">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Nombre del usuario</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
          @foreach($orders as $order)
            <tr>
              @foreach($users as $user)
               @if($user->id == $order->user_id)
                 <td>{{$user->name}}</td>
                 <td>{{$order->status}}</td>
               @endif
              @endforeach
            </tr>
          @endforeach
      </tbody>
    </table>
    <div class="class-col-x12">
      {{ $orders->links()}}
    </div>
  </div>
@else
  <img src="/images/errors/401.png" width="100%" height="100%" >
  <a href="../../products/">Regresar</a>
@endif
@endsection
