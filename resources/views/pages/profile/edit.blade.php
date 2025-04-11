@extends('layout.app')
@section('title', 'Perfil')
@section('content')
  @include('components.header')

  <form action="{{ route('profile.update') }}" method="POST"
    enctype="multipart/form-data">
    <div>
      <label for="profile_image">Imagem de Perfil</label>
      <input type="file" name="profile_image" accept="image/*">
    </div>
    <div>
      <label for="name">Nome</label>
      <input type="text" name="name" value="{{ $client->name }}">
    </div>

    <div>
      <label for="email">Email</label>
      <input type="email" name="email" value="{{ $user->email }}">
    </div>

    <div>
      <label for="password">Senha</label>
      <input type="text" name="password">
    </div>

    <div>
      <label for="birthday">Data de nascimento</label>
      <input type="date" name="birthday" value="{{ $client->birthday }}"
        required>
    </div>

    <div>
      <label for="address">Endereço</label>
      <textarea id="address" name="address">{{ $client->address }}</textarea>
    </div>

    <div>
      <button type="submit">Confirmar edição</button>
    </div>
  </form>
  @include('components.footer')
@endsection
