@extends('layouts.main')

@section('title', $comic->title)

@section('content')
<div class="wrapper">
  <article class="media">
    <figure class="media-left">
      <img src="{{ asset('uploads/' . $comic->image) }}" alt="">
    </figure>
    <div class="media-content">
      <div class="content">
        <h1>{{ $comic->title }}</h1>
        <p>Auteur : {{ $comic->author->name }}</p>
        @if (count($comic->themes) > 0)
          <p>
            Thèmes : 
          @foreach ($comic->themes as $theme)
            <a class="tag is-dark" href="{{ route('theme.show', ['id' => $theme->id]) }}">
              {{ $theme->name }}
            </a>
          @endforeach
          </p>
        @endif
        <h3>Résumé</h3>
      @if (strlen($comic->description) === 0)
        <p style="font-style: italic">aucune description</p>
      @else
        <p>{{ $comic->description }}</p>
      @endif
      </div>
    </div>
  </article>
  <br />
  <div id="comments">
    <div class="media-content">
      <h2 class="heading">Commentaires</h2>
    @if (count($comic->comments) > 0)
      @foreach ($comic->comments as $comment)
        <div class="box">
          <article class="media">
            <div class="media-content">
              <div class="content">
                <p>
                  <strong>{{ $comment->username }}</strong>
                  <small>{{ $comment->com_date }}</small>
                  <br>
                  {{ $comment->content }}
                </p>
              </div>
            </div>
          </article>
        </div>
      @endforeach
    @else
      <p style="font-style: italic;">Aucun commentaire</p>
    @endif
    </div>
    <br />

    <h2 class="heading">Ajouter un commentaire</h2>
    <div class="media">
      <div class="media-content">
        <form action="{{ route('comment.store', ['id' => $comic->id]) }}" method="post">
          <input type="hidden" name="comic_id" value="{{ $comic->id }}">
          {{ csrf_field() }}
          <p class="control">
            <label class="label" for="username">Pseudo</label>
            <input class="input" type="text" name="username"
                   placeholder="Votre nom" required>
          </p>
          <p class="control">
            <label class="label" for="message">Message</label>
            <textarea class="textarea" name="message" placeholder="Votre commentaire..." required></textarea>
          </p>
          <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <button class="button is-primary" type="submit">Envoyer</button>
              </div>
            </div>
          </nav>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
