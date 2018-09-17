<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="{{route('stage')}}">Stage</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{route('formation')}}">Formation</a></li>
        
        <li class="nav-item active">
   
        {{--  <a class="nav-link" href="{{route('post.index')}}">{{ Auth::user()->name }}</a> --}}
    </li>
    <li class="nav-item active">
    {{-- renvoie true si vous êtes connecté --}}
                @if(Auth::check())
        <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
    </li>
@endif
        </ul>
    </div>
</nav>