<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Administration - @yield('title')</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bulma.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
</head>
<body>
@if (isset($errors) && count($errors) > 0)
  <div class="notify notification is-danger">
    <button class="delete"></button>
    @foreach ($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
  </div>
@endif

@if (Session::has('success_message'))
  <div class="notify notification is-primary">
    <button class="delete"></button>
    {{ session('success_message') }}
  </div>
@endif
  <nav class="nav">
    <div class="container">
      <div class="nav-left">
        <span class="nav-item is-brand">BDthèque</span>
        @if (!Auth::guest())
        <a class="nav-item" href="{{ route('home')}}" target="_blank" title="Accueil">
          Voir le site
        </a>
        @else
        <a class="nav-item" href="{{ route('home')}}" title="Accueil">
          Retour au site
        </a>
        @endif
      </div>

    @if (!Auth::guest())
      <div class="nav-right">
        <a href="{{ route('admin.logout') }}" class="nav-item">Se déconnecter</a>
      </div>
    @endif

      <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </div>
  </nav>

  <main class="section">
    <div class="container">
    @if (!Auth::guest())
      <div class="heading">
        <h1 class="title">
          Administration
        </h1>
      </div>
      
      <div class="columns">
        <div class="column is-3">
          <aside class="menu">
            <p class="menu-label">
              Menu
            </p>
            <ul class="menu-list">
              <li><a href="{{ route('admin.home') }}">Statistiques du site</a></li>
              <li><a href="{{ route('admin.comics') }}">Gérer les bandes dessinées</a></li>
              <li>
                <a href="{{ route('admin.pending_comments') }}">Commentaires en attente</a>
              </li>
              <li>
                <a href="{{ route('admin.comments') }}">Commentaires validés</a>
              </li>
              <li><a href="{{ route('admin.theme.new') }}">Ajouter un thème</a></li>
              <li><a href="{{ route('admin.author.new') }}">Ajouter un auteur</a></li>
            </ul>
          </aside>
        </div>

        @yield('content')
      </div>
    @else
      @yield('content')
    @endif
    </div>
  </main>

  <footer class="footer">
    <div class="container">
      <div class="content has-text-centered">
        <p>&copy; <strong>BDthèque</strong> 2017</p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
