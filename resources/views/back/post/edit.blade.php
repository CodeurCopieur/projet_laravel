@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Modifier le Post </h1>
			<form action="{{route('post.update', $post->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				@method('put')
				<div class="form-group">
				<label>Titre</label>
				<input class="form-control" type="text" name="title" value="{{$post->title}}"placeholder="Title" />
				</div>
				@if($errors->has('title')) 
					<span class="error">{{$errors->first('title')}}</span>
				@endif

				

				<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" rows="3" name="description">{{$post->description}}</textarea>
				</div>
				@if($errors->has('description')) 
					<span class="error">{{$errors->first('description')}}</span>
				@endif


				<div class="form-group">
				<label>Prix</label>
				<input class="form-control" type="text" name="prix" value="{{$post->prix}}"placeholder="Prix" />
				</div>
				@if($errors->has('title')) 
					<span class="error">{{$errors->first('prix')}}</span>
				@endif

				<div class="form-group">
				<label>Nombre d'élève</label>
				<input class="form-control" type="text" name="max_eleves" value="{{$post->max_eleves}}"placeholder="Nombre d'élève" />
				</div>
				@if($errors->has('title')) 
					<span class="error">{{$errors->first('max_eleves')}}</span>
				@endif
				
				<label for="category">Categories :</label>
                    <select class="custom-select" id="category" name="category_id">
                        <option value="0" {{is_null($post->category_id)? 'selected' : ''}}>Pas de Catégorie</option>
                        @foreach($categories as $id => $name)
                            <option value="{{$id}}" {{!is_null($post->category_id) && $post->category_id === $id ? 'selected' : ''}}>{{$name}}</option>
                        @endforeach
                    </select><br/>

				<div class="form-group">
				<label>Date de début</label>
				<input class="form-control" type="date" name="date_debut" value="{{$post->date_debut->format('Y-m-d')}}"placeholder="Title" />
				<label>Date de fin</label>
				<input class="form-control" type="date" name="date_fin" value="{{$post->date_fin->format('Y-m-d')}}"placeholder="Title" />
				</div>
				</div>

			
				<div class="form-group">
	            		<h2>Status</h2>
			            <input type="radio" name="publication" value="publier" {{($post->publication == 'publier')  ? 'checked' : ''}}>Publier<br>
			            <input type="radio" name="publication" value="nonpublier" {{($post->publication == 'nonpublier') ? 'checked' : ''}}>Dépulier<br>

				</div>
		            <div class="custom-file">
					{{--<label >File :</label>--}}
					<input class="file" type="file" name="picture" >
		            </div>
            	

				<button type="submit" value="Modifier le livre">Modifier</button>
			</form>
		</div>
	</div>
</div>
@endsection 