@extends('layouts.master')

@section('content')


   <div class="card" style="width: 18rem;">
   @if(count($post->picture) > 0)
  <img class="card-img-top" src="{{asset('images/'.$post->picture->link)}}" alt="Card image cap">
  @endif
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text">{{$post->description}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Date début : {{$post->date_debut}}</li>
    <li class="list-group-item">Date fin : {{$post->date_fin}}</li>
    <li class="list-group-item">Prix : {{$post->prix}}</li>
  </ul>
  <div class="card-body">
  <p class="card-text">Nombre d'élève : {{$post->max_eleves}}</p>
    <a href="#" class="card-link">1 post</a>
  </div>
</div>



@endsection 