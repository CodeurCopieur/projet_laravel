@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h4>Titre : {{$post->title}}</h4>
        <p>Description : {{$post->description}}</p>
	    <p>Catégorie : {{$post->category->name?? 'aucun'}}</p>
        <p>Date de création : {{$post->date_debut->format('d-m-Y')}}</p>
        <p>Date de mise à jour : {{$post->date_fin->format('d-m-Y')}}</p>
        <p>Status : {{$post->publication}}</p>
    </div>
    <div class="col-md-6">
    @if(!empty($post->picture))
        <div class="col-md-3">
            <a href="#" class="thumbnail">
            <img src="{{asset('images/'.$post->picture->link)}}" alt="{{$post->picture->title}}" class="rounded float-left">
            </a>
        </div>
    @endif
    </div>
</div>
@endsection 
