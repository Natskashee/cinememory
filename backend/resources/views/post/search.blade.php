@extends('layout.app')
@section('title', 'Accueil')
@section('heading', 'All Posts')
@section('link_text', 'Aller aux memories')
@section('link', '/post')

@section('content')
<div class="text-white pl-24 min-h-[80vh]">
    <h1 class="border-b-2 border-sky-600 w-5/6">Résultats de la recherche</h1>

    @if ($posts->isEmpty())
    <p>Aucune memorie trouvée.</p>
    @else
    <div class="flex mt-5 w-5/6 flex-wrap gap-5">
        @foreach ($posts as $post)

        <div class="flex w-full post-card">
            <div class="card-box-2 rounded-l-lg" style="background-image: url('{{ asset('storage/images/'.$post->image) }}')">
            </div>
            <div class="px-8 flex flex-col justify-between w-4/5 bg-daintree-800 rounded-r-lg">
                <ul class="flex flex-col pt-3">
                    <span class="flex justify-between">
                        <li>Nom :</li>
                        {{$post->title}}
                    </span>

                    <span class="flex justify-between">
                        <li>Type : </li>
                        {{$post->type}}
                    </span>

                    <span class="flex justify-between">
                        <li>Statut : </li>
                        {{$post->statut}}
                    </span>

                    <span class="flex justify-between">
                        <li>Episode(s) vu(s) : </li>
                        {{$post->episode}}
                    </span>

                    <span class="flex justify-between">
                        <li>Date d'ajout : </li>
                        {{$post->date_ajout}}
                    </span>



                </ul>

                <div class="flex gap-3 justify-center">
                    <a href="/post/{{$post->id}}/edit" class="no-underline text-white">
                        <button class="py-2 px-4 bg-sky-500 hover:bg-sky-600 rounded-full">Modifier</button>
                    </a>

                    <form action="/post/{{$post->id}}" class="bg-red-500 hover:bg-red-600 py-2 px-4 rounded-full" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="">
                            Supprimer
                        </button>
                    </form>

                </div>
            </div>
        </div>

        @endforeach
    </div>
    @endif
</div>

@endsection

<style>

</style>