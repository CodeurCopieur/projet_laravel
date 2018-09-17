@extends('layouts.master')

@section('content')


   <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{asset('images/'.$post->picture->link)}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$post->title}}</h5>
    <p class="card-text">{{$post->description}}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">{{$post->date_debut}}</li>
    <li class="list-group-item">{{$post->date_fin}}</li>
    <li class="list-group-item">{{$post->prix}}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">{{$post->max_eleves}}</a>
    <a href="#" class="card-link">1 post</a>
  </div>
</div>



@endsection 