@extends('layout.app')

@section('title', 'En cours')
@section('heading', 'Créer une nouvelle memorie')
@section('link_text', 'Aller aux memories')
@section('link', '/post')

@section('content')

<div class="border-b-2 border-sky-600 w-5/6 ml-24 pt-6">
    <h1 class="text-white flex gap-4 uppercase">
        Mes séries et films en cours
    </h1>
</div>

<div class="flex justify-center flex-wrap mt-6 w-full bg-center bg-cover" style="background-image: url('/images/polygon-scatter-haikei.svg');">
    @foreach($posts as $post)
    @if($post -> statut === "En cours")
    <div class="pr-4 mb-4">
        <div class="card-box shadow post-card" data-post-id="{{ $post->id }}" data-post-title="{{ $post->title }}" data-post-episode="{{ $post->episode }}" data-post-date_ajout="{{ $post->date_ajout }}" data-post-image="{{ asset('storage/images/'.$post->image) }}" data-post-type="{{ $post->type }}" data-post-created-at="{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}" data-post-statut="{{ $post->statut }}" style="background-image: url('{{ asset('storage/images/'.$post->image) }}')">
            <span class="text-right bg-yellow-500 p-1 mx-2 rounded-full">{{$post->episode}}</span>
        </div>
    </div>

    @endif
    @endforeach

    <a href="{{route('post.create')}}" class="w-fit bg-transparent">
        <div class="card-box border-2 underline text-blue-500 flex items-center border-dashed justify-center text-5xl">
            &plus;
        </div>
    </a>

</div>

<div class="flex justify-center my-5 text-sky-700">
    {{ $posts->links() }}
</div>

@endsection

<style>
    .in-progress-li{
        background-color:#0284C7;
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        border-top-left-radius: 9999px;
        border-bottom-left-radius: 9999px;
    }

</style>