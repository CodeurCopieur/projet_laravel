@extends('layouts.master')

@section('content')
<div class="container">
<h1>Resultat de votre recherche</h1>


    <div class="card-deck" style="bottom: 1rem;">
   
        @forelse($posts as $post)
        <div class="card-group" style="width: 20rem; bottom: 1em;">
  <div class="card">
            @if(is_null($post->picture) == false)
            <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">

            @endif
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('post', $post->id)}}">{{$post->title}}</a></h5>
                <p class="card-text">{{$post->description}}</p>
            </div>

            <div class="card-footer">
                 <small class="text-muted">{{$post->post_type}}</small>
            </div>

            </div>

              </div>

            @empty
        @endforelse
        
    </div>
    </div>

@endsection