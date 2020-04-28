@extends('layouts.admin')

@section('title', 'Ajouter une BD')


@section('content')
<div class="column">
  <h5 class="title is-5">Ajouter une bande dessinée</h5>

  <div class="box">
    <div class="media">
      <div class="media-content">
        <div class="content">
          <form action="{{ route('admin.comic.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label class="label">Titre</label>
            <p class="control">
              <input class="input" type="text" name="title" placeholder="Titre de la bande dessinée" required>
            </p>
            <label class="label">Auteur</label>
            <p class="control">
              <span class="select">
                <select name="author" required>
                  <option value="0">Choisir un auteur</option>
                  @foreach ($authors as $author)
                  <option value="{{ $author->id }}">{{ $author->name }}</option>
                  @endforeach
                </select>
              </span>
            </p>
            <label class="label">Résumé</label>
            <p class="control">
              <textarea class="textarea" name="description"  placeholder="Le résumé de la bande dessinée" required></textarea>
            </p>
            <label class="label">Image de couverture (jpg, png)</label>
            <p class="control">
              <input type="file" name="image" required>
            </p>
            <div class="level-right">
              <div class="level-item">
                <button class="button is-success">Enregistrer</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

