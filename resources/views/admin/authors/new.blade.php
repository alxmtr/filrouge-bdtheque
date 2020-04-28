@extends('layouts.admin')

@section('title', "Ajouter un auteur")


@section('content')
<div class="column">
  <h5 class="title is-5">Ajouter un auteur</h5>
  <div class="box">
    <article class="media">
      <div class="media-content">
        <div class="content">
          <form action="{{ route('admin.author.store') }}" method="post">
            {{ csrf_field() }}
            <label class="label">Nom de l'auteur</label>
            <p class="control">
              <input class="input" type="text" name="name" placeholder="Nom de l'auteur" required>
            </p>
            <br />
            <div class="level-right">
              <div class="level-item">
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
