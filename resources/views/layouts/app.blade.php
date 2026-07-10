<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Portfolio')</title>

    <!-- Lien vers les assets compiles par Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    <!-- ========== NAVIGATION ========== -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('accueil') }}" class="logo">Mon Portfolio</a>

            <!-- Bouton menu mobile -->
            <button class="menu-toggle" id="menuToggle" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="{{ route('accueil') }}">Accueil</a></li>
                <li><a href="{{ route('experiences.index') }}">Experiences</a></li>
                <li><a href="{{ route('competences.index') }}">Competences</a></li>
                <li><a href="{{ route('formations.index') }}">Formations</a></li>
                @auth
                    <li><a href="{{ route('admin.experiences.index') }}" class="admin-link">Admin</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="nav-form">
                            @csrf
                            <button type="submit" class="nav-button">Deconnexion</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="admin-link">Admin</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- ========== CONTENU PRINCIPAL ========== -->
    <main class="container">
        @if(session('success'))
            <div class="alert alert-success" id="flashMessage">
                {{ session('success') }}
                <button class="alert-close" onclick="this.parentElement.style.display='none'">x</button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- ========== FOOTER ========== -->
    <footer class="footer">
        <div class="container">
            <p>&copy; {{ date('Y') }} Mon Portfolio - Realise avec Laravel</p>
        </div>
    </footer>

</body>
</html>
