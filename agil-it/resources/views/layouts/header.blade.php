<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('welcome') }}">
        <img src="{{asset('images/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
        Univers7
    </a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('afficherInscriptions')}}">Contacts</a>
            </li>
        </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('afficherLesEntreprises')}}">Entreprises</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('formulaireEntreprise')}}">Créer une entreprise</a>
        </li>
    </ul>
    @guest
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
        </ul>
    @endguest
    @auth
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit()">Déconnexion</a>
            </li>
            <form action="{{route('logout')}}" method="post" style="display: none;" id="logout-form">@csrf</form>
        </ul>
    @endauth
</nav>