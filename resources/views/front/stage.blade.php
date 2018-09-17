@extends('layouts.master')

@section('content')
<article class="row">
    <div class="col-md-12">
    {{$posts->links()}}
    @forelse($posts as $post)
    <h1><a href="{{route('post', $post->id)}}">{{$post->title}}</a></h1>
        <div class="col-xs-6 col-md-12">
            <a href="#" class="thumbnail">
            <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
            </a>
        </div>
    <h2>Description :</h2>
    {{$post->description}}    
    @empty 
    <h1>Désolé aucun article</h1>
    @endif 
    </div>
</article>

</ul>
@endsection 
