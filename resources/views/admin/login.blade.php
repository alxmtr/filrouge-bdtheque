@extends('layouts.admin')

@section('title', 'Connexion')


@section('content')
<div class="login-form">
  <h1 class="title has-text-centered">Administration</h1>
  <form action="" method="post">
    {{ csrf_field() }}
    <label for="login" class="label">Identifiant</label>
    <p class="control has-icon">
      <input type="text" name="login" class="input is-medium" placeholder="Identifiant">
      <i class="fa fa-user"></i>
    </p>
    <label for="password" class="label">Mot de passe</label>
    <p class="control has-icon">
      <input type="password" name="password" class="input is-medium" placeholder="Mot de passe">
      <i class="fa fa-lock"></i>
    </p>
    <p class="control">
      <button type="submit" class="button login-btn is-primary is-medium">
        Se connecter
      </button>
    </p>
  </form>
</div>
@endsection

