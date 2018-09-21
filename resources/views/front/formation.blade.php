@extends('layouts.master')

@section('content')

<div class="container">
<h1>Les formations</h1>

{{$posts->links()}}

    <div class="card-deck" style="bottom: 1rem;">
   
    @forelse($posts as $post)
<div class="card-group" style="width: 20rem; bottom: 1em;">
  <div class="card">
  @if(count($post->picture) > 0)
  <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
  @endif
    <div class="card-body">
      <h5 class="card-title"><a href="{{route('post', $post->id)}}">{{$post->title}}</a></h5>
      <p class="card-text">{{$post->description}}</p>
    </div>
    <div class="card-footer">
      <small class="text-muted">{{$post->date_debut}}</small>
    </div>
  </div>
</div>

    @empty 
    <h1>Désolé aucun article</h1>
    @endif 
  </div>

  </div>
@endsection 