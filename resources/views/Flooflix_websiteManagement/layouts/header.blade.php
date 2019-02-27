<!-- Header -->
<!-- Banner -->
<header role="banner">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" role="navigation">
        <a class="navbar-brand" href="{{ route('home')}}" target="_blank"><img src="../../images/flooflix.png" class="img-fluid" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link padding-right-f" href="/GestionDuSite">ACCUEIL</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">ADMINISTRER</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/GestionDesUtilisateurs"><i class="fas fa-arrow-circle-right"></i> Gestion des utilisateurs</a>
                        <a class="dropdown-item" href="/GestionDesPages"><i class="fas fa-arrow-circle-right"></i> Gestion du contenu des pages</a>
                        <a class="dropdown-item" href="/GestionDesInformationsGenerales"><i class="fas fa-arrow-circle-right"></i> Gestion des informations générales</a>
                        <a class="dropdown-item" href="/GestionDesFilms"><i class="fas fa-arrow-circle-right"></i> Gestion des films</a>
                        <a class="dropdown-item" href="/GestionDesElementsVisuels"><i class="fas fa-arrow-circle-right"></i> Gestion des éléments visuels</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>