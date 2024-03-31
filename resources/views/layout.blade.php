<!DOCTYPE html>
<html>
<head>
    <title>PeriAct | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="{{ route('home') }}">PeriAct</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>
                    </li>
                    @endguest
                </ul>
                <ul class="navbar-nav" >
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('communes.create') }}">+Commune</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('associations.create') }}">+Association</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tuteurs.create') }}">+Tuteur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gestionnaires.create') }}">+Gestionnaire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('gestionnaires.create') }}">+Parent</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('enfants.create') }}">+Enfant</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('activites.create') }}">+Activite</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('creneaus.create') }}">+Creneau</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    
@yield('page-js-files')

@yield('page-js-script')    
</body>
</html>