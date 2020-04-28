<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>BDthèque - @yield('title')</title>

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
        <a class="nav-item" href="{{ route('home')}}" title="Accueil">
          Toutes les BD
        </a>
      </div>

      <div class="nav-right">
        <form class="nav-item" action="{{ route('home') }}" method="get">
          <p class="control has-addons">
            <input class="input" type="text" name="search" placeholder="Rechercher..." required>
            <button type="submit" class="button is-primary">
              <i class="fa fa-search icon is-small"></i>
            </button>
          </p>
        </form>
      </div>

      <span class="nav-toggle">
        <span></span>
        <span></span>
        <span></span>
      </span>
    </div>
  </nav>

  <main class="section">
    <div class="container">
      @yield('content')
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
