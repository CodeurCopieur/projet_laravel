@extends('layouts.master')

@section('content')

	<a href="{{route('post.create')}}">Ajouter un livre</a>
	
	{{$posts->links()}}
	@include('back.post.partials.flash')

	<table>
		<tr>
			<th>Title</th>
			<th>post_type</th>
			<th>description</th>
			<th>date_debut</th>
			<th>date_fin</th>
			<th>prix</th>
			<th>max_eleves</th>
			<th>publication</th>
            <th>Modifier</th>
            <th>Voir</th>
            <th>Suppression</th>
		</tr>

		@forelse($posts as $post)
			<tr>
				<td>
					{{$post->title}}
				</td>

                <td>
					{{$post->post_type}}
				</td>
                <td>
					{{$post->description}}
				</td>
                <td>
					{{$post->date_debut}}
				</td>
                <td>
					{{$post->date_fin}}
				</td>
                <td>
					{{$post->prix}}
				</td>
                <td>
					{{$post->max_eleves}}
				</td>
                <td>
					{{$post->publication}}
				</td>

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



