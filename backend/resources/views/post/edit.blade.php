@extends('layout.app')
@section('title', 'Modifier cette memorie')
@section('heading', 'Modifier cette memorie')
@section('link_text', 'Aller aux memories')
@section('link', '/post')

@section('content')

<div class="my-3 w-5/6 mx-auto text-white">
  <div class="">
    <div class="p-4">
      <div class="card-header bg-primary">
        <h3 class="uppercase border-b-2 border-sky-600">Modifier la memorie</h3>
      </div>
      <div class="card-body p-4">
        <form action="/post/{{ $post->id }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="my-2">
            <input type="text" name="title" id="title" class="bg-transparent p-2.5 border" placeholder="Title" value="{{ $post->title }}" required>
          </div>

          <div class="my-2">
            <select name="type" id="type" required class="bg-transparent p-2.5 border">
              <option value="Série" class="bg-gray-900">Série</option>
              <option value="Film" class="bg-gray-900">Film</option>
            </select>
          </div>

          <div class="my-2">
            <input type="file" name="file" id="file" accept="image/*" class="bg-transparent border p-2.5">
          </div>

          <div class="my-2">
            <input type="text" name="episode" id="episode" placeholder="Episodes vus" class="bg-transparent border p-2.5" value="{{ $post->episode }}" required required>
          </div>

          <div class="my-2">
            <input type="date" name="date_ajout" id="date_ajout" class="bg-transparent border p-2.5" value="{{ $post->date_ajout }}" required>
          </div>



          <img src="{{ asset('storage/images/'.$post->image) }}" class="img-fluid img-thumbnail" width="150">

          <div class="my-2">
            <select name="statut" id="statut" class="bg-transparent border p-2.5 w-1/2">
              <option value="En cours" class=" bg-gray-900">En cours</option>
              <option value="Terminé" class="bg-gray-900">Terminé</option>
              <option value="A voir" class="bg-gray-900">À voir</option>
            </select>
          </div>

          <div class="flex items-center gap-4">
            <div class="my-2">
              <input type="submit" value="Modifier" class="bg-sky-600 py-2.5 px-5 rounded-full hover:bg-sky-700 cursor-pointer">
            </div>

            <a href="@yield('link')" class="bg-red-600 hover:bg-red-700 no-underline text-white font-bold py-2.5 px-5 rounded-full">Annuler</a>

          </div>



        </form>
      </div>
    </div>
  </div>
</div>
@endsection