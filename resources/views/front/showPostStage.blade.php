@extends('layouts.master')

@section('content')
<article class="row">
    <div class="col-md-12">
    @if(count($post)>0)
    <h1>{{$post->title}}</h1>
    @if(count($post->picture) > 0)
        <div class="col-xs-6 col-md-12">
            <a href="#" class="thumbnail">
            <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}">
            </a>
        </div>
    @endif
    <h2>Description :</h2>
    {{$post->description}}    
    
    @else 
    <h1>Désolé aucun article</h1>
    @endif 
    </div>
</article>

</ul>
@endsection 
