@extends('layouts.admin')

@section('title', 'Commentaires en attente')


@section('content')
<div class="column">
@if (Route::currentRouteName() === 'admin.pending_comments')
  <h5 class="title is-5">Commentaires en attente</h5>
@else
  <h5 class="title is-5">Commentaires validés</h5>
@endif
@if (count($comments) > 0)
  @foreach ($comments as $comment)
  <div class="box">
    <article class="media">
      <div class="media-content">
        <div class="content">
          <p>
            <strong>{{ $comment->username }}</strong>
            <small>{{ $comment->com_date }}</small>
            (sur <a href="{{ route('comic.show', ['id' => $comment->comic->id]) }}" target="_blank">{{ $comment->comic->title }}</a>)
            <br>
            {{ $comment->content }}
          </p>
          <div class="level-right">
            <div class="level-item">
              <form action="{{ route('admin.comment.delete', ['id' => $comment->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="button is-danger btn-delete">Supprimer</button>
              </form>
            </div>
            <div class="level-item">
              <a href="{{ route('admin.comment.edit', ['id' => $comment->id]) }}" class="button is-warning">
                Modifier
              </a>
            </div>
            @if (Route::currentRouteName() === 'admin.pending_comments')
            <div class="level-item">
              <form action="{{ route('admin.comment.approve', ['id' => $comment->id]) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="PATCH">
                <button class="button is-success">Valider</button>
              </form>
            </div>
            @endif
          </div>
        </div>
      </div>
    </article>
  </div>
  @endforeach
@else
  <p>Pas de résultats.</p>
@endif
</div>
@endsection

