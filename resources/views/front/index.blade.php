@extends('layouts.master')

@section('content')
<div class="row">
<h1>Tous les posts</h1>
</div>


    <div class="row d-flex justify-content-between">
   
        @forelse($posts as $post)
        <div class="card mb-4" style="width:20rem;">
            @if(is_null($post->picture) == false)
                    <img class="card-img-top" src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">

            @endif
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('post', $post->id)}}">{{$post->title}}</a></h5>
                <p class="card-text">{{$post->description}}</p>
                <a href="#" class="btn btn-primary">{{$post->post_type}}</a>
            </div>
            </div>
            @empty
        @endforelse
        
    </div>
@endsection