@extends('layouts.master')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h1>Créer un post: </h1>
			<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
                <div class="form">
                    <div class="form-group">
				        <label for="title">Titre :</label>
						<input class="form-control" type="text" name="title" value="{{old('title')}}" placeholder="Title" />
						@if($errors->has('title')) 
							<span class="error">{{$errors->first('title')}}</span>
						@endif
					</div>

					
					<div class="form-group">
						<label>Description</label>
						<textarea class="form-control" rows="3" name="description" placeholder="Description">{{old('description')}}</textarea>
						@if($errors->has('description')) 
							<span class="error">{{$errors->first('description')}}</span>
						@endif
                	</div>
				
                
				<label class="my-1 mr-2" for="post_type">Type de poste</label>
				<select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="post_type">
				<option selected>Sélectionner un type de poste</option>
				<option value="1">Stage</option>
				<option value="2">Formation</option>
				</select>


				<div class="form-group">
					<label>Date de début</label>
					<input class="form-control" type="date" name="date_debut"  placeholder="Date" />
					<label>Date de fin</label>
					<input class="form-control" type="date" name="date_fin"  placeholder="Date" />
				</div>

				<div class="form-group">
					<label for="title">Prix :</label>
					<input class="form-control" type="text" name="prix" value="{{old('prix')}}" placeholder="Prix" />
					@if($errors->has('prix')) 
						<span class="error">{{$errors->first('prix')}}</span>
					@endif
				</div>
				

				<div class="form-group">
					<label for="title">Nombre élève :</label>
					<input class="form-control" type="text" name="max_eleves" value="{{old('max_eleves')}}" placeholder="Nombre élève" />
					@if($errors->has('max_eleves')) 
						<span class="error">{{$errors->first('max_eleves')}}</span>
					@endif
				</div>
				

				<div class="form-group">
					<label for="category">Categories :</label>
					<select class="custom-select" name="category_id">
						<!-- <option>Sélectionner une catégorie</option> -->
						<option value="0" {{ is_null(old('category_id'))? 'selected' : '' }}>Sélectionner une catégorie</option>
							@foreach($categories as $id => $name)
								<option {{ old('category_id')==$id? 'selected' : '' }} value="{{$id}}">{{$name}}</option>
							@endforeach
					</select>
				</div>

				<div class="form-group">
		                <h2>File :</h2>
		                <input class="file" type="file" name="picture" >
		               {{--  @if($errors->has('picture')) <span class="error bg-warning text-warning">{{$errors->first('picture')}}</span> @endif --}}
		            </div>

				<div class="form-group">
					<div class="col-md-6">
						<div class="input-radio">
							<h2>Status</h2>
							<input class="form-check-input" type="radio" @if(old('status')=='publier') checked @endif name="publication" value="publier" checked> publier<br>
							<input class="form-check-input" type="radio" @if(old('status')=='nonpublier') checked @endif name="publication" value="nonpublier" > dépublier<br>
						</div>
					</div>
				</div>       	
            </div>
			<button class="btn btn-primary" type="submit">Ajouter le livre</button>
			</form>
		</div>
	</div>
</div>
@endsection 