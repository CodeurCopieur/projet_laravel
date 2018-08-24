<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(isset($posts))
            @forelse($types as $type)
                <li class="nav-item">
                <a  class="nav-link" href="{{route($type)}}">{{$type}}</a>
                </li>
            @empty 
                <li>Aucun post type pour l'instant</li>
            @endforelse
            @endif
        </ul>
    </div>
</nav>