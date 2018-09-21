<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{url('/')}}">Accueil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="{{route('stage')}}">Stage</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{route('formation')}}">Formation</a></li>
        <li class="nav-item active"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
        @if(Auth::check()) 
        <li class="nav-item active">
   
         <a class="nav-link" href="{{route('post.index')}}">{{ Auth::user()->name }}</a> 
    </li>
    <li class="nav-item active">
               
        <a class="nav-link"  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Déconnexion</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{csrf_field()}}
        </form>
    </li>
@else
<li><a href="{{route('login')}}">Login</a></li>
@endif
        </ul>
    </div>

    <form action="{{route('search')}}" methode="get">
        <input name="search" type="search"  >
        <button tyep="submit">Search</button>
    </form>
</nav>