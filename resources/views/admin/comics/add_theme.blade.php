@extends('layouts.admin')

@section('title', "Ajouter un thème à une BD")


@section('content')
<div class="column">
  <h5 class="title is-5">
    Ajouter un thème à : 
    <a href="{{ route('comic.show', [$comic->id]) }}" title="{{ $comic->title }}" target="_blank">
      {{ $comic->title }}
    </a>
  </h5>
  <div class="box">
    <article class="media">
      <div class="media-content">
        <div class="content">
          <form action="{{ route('admin.comic.store_theme', ['id' => $comic->id]) }}" method="post">
            {{ csrf_field() }}
            <label class="label">Choisir un thème dans la liste</label>
            <p class="control">
              <span class="select">
                <select name="theme_id" required>
                  <option>Choisir un thème</option>
                @foreach ($themes as $theme)
                  <option value="{{ $theme->id }}">{{ $theme->name }}</option>
                @endforeach
                </select>
              </span>
            </p>
            <br />
            <div class="level-right">
              <div class="level-item">
                <button class="button is-success">Ajouter le thème</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </article>
  </div>
</div>
@endsection
