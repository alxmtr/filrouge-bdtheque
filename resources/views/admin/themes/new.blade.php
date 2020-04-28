@extends('layouts.admin')

@section('title', "Ajouter un thème")


@section('content')
<div class="column">
  <h5 class="title is-5">Ajouter un thème</h5>
  <div class="box">
    <article class="media">
      <div class="media-content">
        <div class="content">
          <form action="{{ route('admin.theme.store') }}" method="post">
            {{ csrf_field() }}
            <label class="label">Intitulé du thème</label>
            <p class="control">
              <input class="input" type="text" name="name" placeholder="Intitulé du thème" required>
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
