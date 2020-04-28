@extends('layouts.main')

@section('title', $current_theme->name)


@section('content')
<div class="heading">
  <h1 class="title">Thème : {{ $current_theme->name }}</h1>
</div>

<div class="columns">
  <div class="column is-3">
    <aside class="menu">
      <p class="menu-label">
        Liste des thèmes
      </p>
      <ul class="menu-list">
      @foreach ($themes as $theme)
        <li>
          <a href="{{ route('theme.show', ['id' => $theme->id]) }}" title="">
            {{ $theme->name }}
          </a>
        </li>
      @endforeach
      </ul>
    </aside>
  </div>

  <div class="column">
    <div class="columns">
    @if (count($current_theme->comics) > 0)
    @foreach ($current_theme->comics as $comic)
      <div class="column has-text-centered comic">
        <a href="{{ route('comic.show', ['id' => $comic->id]) }}" title="">
          <figure>
            <img src="{{ asset('uploads/' . $comic->image) }}" alt="">
            <figcaption>{{ $comic->title }}</figcaption>
          </figure>
        </a>
      </div>
    @endforeach
    @else
      <div class="column">
        <p>Aucun résultat.</p>
      </div>
    @endif
    </div>

    {{ $current_theme->comics->links() }}
  </div>
</div>
@endsection

