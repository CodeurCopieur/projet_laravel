@extends('layouts.master')

@section('content')

<p><a href="{{route('post.create')}}"><button type="button" class="btn btn-primary btn-lg">Ajouter un livre</button></a></p>

	
	{{$posts->links()}}
	@include('back.post.partials.flash')

	<table class="table">
		<tr>
			<th scope="col">Title</th>
			<th scope="col">Type de Post</th>
			<th scope="col">description</th>
			<th scope="col">date_debut</th>
			<th scope="col">date_fin</th>
			<th scope="col">prix</th>
			<th scope="col">max_eleves</th>
			<th scope="col">publication</th>
			<th scope="col">categorie</th>
            <th scope="col">Modifier</th>
            <th scope="col">Voir</th>
            <th scope="col">Suppression</th>
		</tr>

		@forelse($posts as $post)
			<tr>
				<td>{{$post->title}}</td>
                <td>{{$post->post_type}}</td>
                <td>{{$post->description}}</td>
                <td>{{$post->date_debut->format('d-m-Y')}}</td>
                <td>{{$post->date_fin->format('d-m-Y')}}</td>
                <td>{{$post->prix}}</td>
                <td>{{$post->max_eleves}}</td>
                <td>{{$post->publication}}</td>
				<td>{{$post->category_id}}</td>

				<td><a href="{{route('post.edit', $post->id)}}">Edit</a></td>
				<td><a href="{{route('post.show', $post->id)}}">Show</a></td>
				<td>
					<form class="delete" method="POST" action="{{route('post.destroy', $post->id)}}">
                		{{ method_field('DELETE') }}
                		{{ csrf_field() }}
                		<input class="btn" type="submit" value="delete" >
            		</form>
				</td>
			</tr>
		@empty
			<li>Empty</li>
		@endforelse

	</table>
@endsection 

@section('scripts')
    @parent
    <script src="{{asset('js/confirm.js')}}"></script>
@endsection



