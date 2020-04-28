@extends('layouts.admin')

@section('title', 'Bandes dessinées')


@section('content')
<div class="column">
  <h5 class="title is-5">Bandes dessinées</h5>
  <a class="button is-info" href="{{ route('admin.comic.new') }}">
    Ajouter une BD
  </a>
  <br /><br />
@if (count($comics) > 0)
  @foreach ($comics as $comic)
  <div class="box">
    <article class="media">
      <figure class="media-left">
        <p class="image image-small">
          <img src="{{ asset('uploads/' . $comic->image) }}" alt="">
        </p>
      </figure>

      <div class="media-content">
        <div class="content">
          <p>
            <strong>{{ $comic->title }}</strong> par {{ $comic->author->name }}
          </p>
        @if (count($comic->themes) > 0)
          <p>
            Thèmes : 
          @foreach ($comic->themes as $theme)
            <a class="tag is-dark" href="{{ route('theme.show', ['id' => $theme->id]) }}" target="_blank">
              {{ $theme->name }}
            </a>
          @endforeach
          </p>
        @endif
          <p>{{ $comic->description }}</p>

          <div class="level-right comic-controls">
            <div class="level-item">
              <form action="{{ route('admin.comic.delete', [$comic->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="button is-danger btn-delete">Supprimer</button>
              </form>
            </div>
            <div class="level-item">
              <a class="button is-info" href="{{ route('admin.comic.add_theme', ['id' => $comic->id]) }}">
                Ajouter un thème à cette BD
              </a>
            </div>
          </div>
        </div>
      </div>
    </article>
    </div>
  @endforeach
    {{ $comics->links() }}
@else
  <p>Pas de bandes dessinées enregistrées.</p>
@endif
</div>
@endsection

