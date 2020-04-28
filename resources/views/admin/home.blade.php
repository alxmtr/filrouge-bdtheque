@extends('layouts.admin')

@section('title', 'Accueil')


@section('content')
<div class="column">
  <h5 class="title is-5">Statistiques du site</h5>
  <br />
  <div class="columns">
    <div class="column has-text-centered">
      <h2>Bandes dessinées</h2>
    </div>

    <div class="column has-text-centered">
      <h2>Auteurs</h2>
    </div>

    <div class="column has-text-centered">
      <h2>Thèmes</h2>
    </div>

    <div class="column has-text-centered">
      <h2>Commentaires<br />en ligne</h2>
    </div>

    <div class="column has-text-centered">
      <h2>Commentaires<br />en attente</h2>
    </div>
  </div>
  <div class="columns">
    <div class="column has-text-centered">
      <h3 class="title is-3">{{ $comics }}</h3>
    </div>

    <div class="column has-text-centered">
      <h3 class="title is-3">{{ $authors }}</h3>
    </div>

    <div class="column has-text-centered">
      <h3 class="title is-3">{{ $themes }}</h3>
    </div>

    <div class="column has-text-centered">
      <h3 class="title is-3">{{ $online_comments }}</h3>
    </div>

    <div class="column has-text-centered">
      <h3 class="title is-3">{{ $pending_comments }}</h3>
    </div>
  </div>
</div>
@endsection

