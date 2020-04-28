@extends('layouts.admin')

@section('title', "Edition d'un commentaire")


@section('content')
<div class="column">
  <h5 class="title is-5">Editer un commentaire</h5>
  <div class="box">
    <article class="media">
      <div class="media-content">
        <div class="content">
          <form action="{{ route('admin.comment.update', ['id' => $comment->id]) }}" method="post">
            {{ csrf_field() }}
            <p>
              <strong>{{ $comment->username }}</strong>
              <small>{{ $comment->com_date }}</small>
              (sur <a href="{{ route('comic.show', ['id' => $comment->comic->id]) }}" target="_blank">{{ $comment->comic->title }}</a>)
              <br>
            </p>
            <textarea class="textarea" name="message" cols="30" rows="10">{{ $comment->content }}</textarea>

            <br />
            <div class="level-right">
              <div class="level-item">
                <input type="hidden" name="_method" value="PUT">
                <button class="button is-success">Enregistrer</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </article>
  </div>
</div>
@endsection
