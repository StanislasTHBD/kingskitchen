<nav class="navbar navbar-expand-lg bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">Kings-Kitchen</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!--
                <li class="nav-item">
                    <a class="nav-link"  href="{{ route('recettes.index') }}">Liste des recettes</a>
                </li>
                -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Liste des recettes
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('recettes.index') }}">Toutes Recettes</a></li>
                        <li><hr class="dropdown-divider"></li>
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="{{route('recettes.viewByCategory',['id'=>$category->id])}}">{{$category->nom}}</a></li>
                        @endforeach

                    <!--
                        <li><a class="dropdown-item" href="#">Apéritif</a></li>
                        <li><a class="dropdown-item" href="#">Entrées</a></li>
                        <li><a class="dropdown-item" href="#">Plats</a></li>
                        <li><a class="dropdown-item" href="#">Desserts</a></li>
                        <li><a class="dropdown-item" href="#">Boissons</a></li>
                    -->

                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('recettes.create') }}">Créer une recette</a></li>
                    </ul>
                </li>

                <!--
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('recettes.create') }}">Créer une recette</a>
                </li>
                -->
            </ul>

            <ul class="navbar-nav me">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administration
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('category.index') }}">Voir les catégories</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="">Créer un Tag</a></li>
                        </ul>
                    </li>

            </ul>
            <ul class="navbar-nav me-2">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Inscription</a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
