@extends('layout.app-index')
@section('title', 'Accueil')
@section('heading', 'All Posts')
@section('link_text', 'nouvelle memorie')
@section('link', '/post/create')

@section('content')

<style>
    @keyframes slideIn {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(0);
        }
    }

    @keyframes slideOut {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(100%);
        }
    }
</style>

@if(session('message'))
<div class="flex justify-end">
    <div class="bg-daintree-900 fixed top-8 p-5 border-l-4 flex justify-between text-white rounded-lg w-1/3 items-center mt-10 mx-auto border-l-sky-600 alert-{{ session('status') }} alert-dismissible fade show" role="alert" style="animation: slideIn 1s forwards;">

        <strong class="flex gap-4">{{ session('message') }}
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6" fill="gold" viewBox="0 0 59 59">
                    <g id="Layer_2" data-name="Layer 2">
                        <g id="Layer_1-2" data-name="Layer 1">
                            <g id="check_circle" data-name="check circle">
                                <path d="M29.5,59A29.5,29.5,0,1,1,59,29.5,29.53,29.53,0,0,1,29.5,59Zm0-54A24.5,24.5,0,1,0,54,29.5,24.53,24.53,0,0,0,29.5,5Z" />
                                <path d="M26.37,39.24a2.49,2.49,0,0,1-1.77-.73l-7.22-7.22a2.5,2.5,0,0,1,3.53-3.54l5.46,5.46L38.09,21.49A2.5,2.5,0,1,1,41.62,25L28.14,38.51A2.49,2.49,0,0,1,26.37,39.24Z" />
                            </g>
                        </g>
                    </g>
                </svg></span>
        </strong>
        <button type="button" data-bs-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none'">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 cursor-pointer" fill="white" viewBox="0 0 55 55">
                <title>close</title>
                <g id="Layer_2" data-name="Layer 2">
                    <g id="Layer_1-2" data-name="Layer 1">
                        <g id="close">
                            <path d="M2.5,55a2.49,2.49,0,0,1-1.77-.73,2.52,2.52,0,0,1,0-3.54l50-50a2.5,2.5,0,0,1,3.54,3.54l-50,50A2.49,2.49,0,0,1,2.5,55Z" />
                            <path d="M52.5,55a2.49,2.49,0,0,1-1.77-.73l-50-50A2.5,2.5,0,0,1,4.27.73l50,50a2.52,2.52,0,0,1,0,3.54A2.49,2.49,0,0,1,52.5,55Z" />
                        </g>
                    </g>
                </g>
            </svg>
        </button>
    </div>
</div>

<audio autoplay>
    <source src="/audios/message.mp3" type="audio/mp3">
</audio>
@endif

<div class="border-b-2 border-sky-600 w-5/6 ml-24 pt-6">
    <h1 class="text-white flex gap-4 uppercase">
        Mes séries et films en cours
    </h1>
</div>

<div class="flex justify-center flex-wrap mt-6 w-full">
    <div class="flex justify-center items-center flex-wrap gap-5">

        @foreach($postsEnCours as $post)
        <div class="card-box shadow post-card" data-post-id="{{ $post->id }}" data-post-title="{{ $post->title }}" data-post-episode="{{ $post->episode }}" data-post-date_ajout="{{ $post->date_ajout }}" data-post-image="{{ asset('storage/images/'.$post->image) }}" data-post-type="{{ $post->type }}" data-post-created-at="{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}" data-post-statut="{{ $post->statut }}" style="background-image: url('{{ asset('storage/images/'.$post->image) }}')">
            <span class="text-right bg-yellow-500 p-1 mx-2 rounded-full">{{$post->episode}}</span>
        </div>
        @endforeach

        <a href="@yield('link')">
            <div class="card-box border-2 underline text-blue-500 flex items-center border-dashed justify-center text-5xl">
                &plus;
            </div>
        </a>

    </div>

</div>

<a href="{{route ('post.in-progress' )}}" class="flex justify-center my-5 items-center">
    <span class="bg-sky-600 p-2 px-8 cursor-pointer rounded-full hover:bg-sky-700">Voir tout</span>
</a>

<div class="popup fixed z-[999] top-0 left-0 h-screen w-full justify-center items-center" style="background-color:rgba(0,0,0,0.55);">

    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 absolute top-5 right-8 close cursor-pointer" fill="white" viewBox="0 0 55 55">
        <title>close</title>
        <g id="Layer_2" data-name="Layer 2">
            <g id="Layer_1-2" data-name="Layer 1">
                <g id="close">
                    <path d="M2.5,55a2.49,2.49,0,0,1-1.77-.73,2.52,2.52,0,0,1,0-3.54l50-50a2.5,2.5,0,0,1,3.54,3.54l-50,50A2.49,2.49,0,0,1,2.5,55Z" />
                    <path d="M52.5,55a2.49,2.49,0,0,1-1.77-.73l-50-50A2.5,2.5,0,0,1,4.27.73l50,50a2.52,2.52,0,0,1,0,3.54A2.49,2.49,0,0,1,52.5,55Z" />
                </g>
            </g>
        </g>
    </svg>
    <div class="popup-content flex  h-[500px] bg-daintree-800 lg:w-1/2 text-white rounded-lg">

    </div>
</div>

<div class="flex justify-center items-center">

    <svg xmlns="http://www.w3.org/2000/svg" class="h-24" viewBox="-120.045 -61.56275 1040.39 369.3765">
        <path d="M396.5 246.251v-.4c.4-.5 1.1-.8 1.7-.7 2.9-.1 5.7-.1 8.6 0 .6 0 1.3.2 1.7.7v.4z" fill="#d1effa" />
        <path d="M408.5 245.851c-4-.1-8-.1-12 0-5.5-.3-11-.5-16.5-.9-14.6-1.1-29.1-3.3-43.3-6.6-49.1-11.4-92.2-34.3-129.8-67.6-3.5-3.1-6.8-6.3-10.2-9.5-.8-.7-1.5-1.7-1.9-2.7-.6-1.4-.3-2.9.7-4s2.6-1.5 4-.9c.9.4 1.8.8 2.6 1.3 35.9 22.2 75.1 38.4 116.2 48 13.8 3.2 27.7 5.7 41.7 7.5 20.1 2.5 40.4 3.4 60.6 2.7 10.9-.3 21.7-1.3 32.5-2.7 25.2-3.2 50.1-8.9 74.2-16.9 12.7-4.2 25.1-9 37.2-14.6 1.8-1 4-1.3 6-.8 3.3.8 5.3 4.2 4.5 7.5-.1.4-.3.9-.5 1.3-.8 1.5-1.9 2.8-3.3 3.8-11.5 9-23.9 16.9-37 23.5-24.7 12.5-51.1 21.4-78.3 26.5-15.7 2.8-31.5 4.5-47.4 5.1zm-148.1-202.7c2.5-1.5 5.1-3.1 7.8-4.5 7-3.6 14.8-5.4 22.7-5 5.7.3 10.9 1.9 14.9 6.1 3.8 3.9 5.2 8.7 5.6 13.9.1 1.1.1 2.2.1 3.4v51.8c0 4.5-.6 5.1-5.1 5.1h-12.2c-.8 0-1.6 0-2.4-.1-1.2-.1-2.2-1.1-2.4-2.3-.2-1.1-.2-2.2-.2-3.3v-46.3c.1-1.9-.1-3.7-.6-5.5-.8-3.1-3.6-5.3-6.8-5.5-5.9-.4-11.8.8-17.2 3.3-.8.2-1.3 1-1.2 1.8v52.6c0 1 0 1.9-.2 2.9 0 1.4-1.1 2.4-2.5 2.4-1.5.1-3 .1-4.6.1h-10.6c-3.7 0-4.5-.9-4.5-4.6v-47.3c0-1.7-.1-3.5-.5-5.2-.7-3.4-3.6-5.8-7-6-6-.4-12.1.8-17.5 3.4-.8.2-1.3 1.1-1.1 1.9v53.3c0 3.7-.8 4.5-4.5 4.5H197c-3.5 0-4.4-1-4.4-4.4v-69.4c0-.8.1-1.6.3-2.4.4-1.2 1.6-1.9 2.8-1.9h12.5c1.8 0 2.9 1.1 3.5 2.8.5 1.4.8 2.7 1.3 4.2 1 0 1.6-.7 2.3-1.1 5.5-3.4 11.3-6.3 17.8-7.5 5-1 10-1 15 0 4.7 1 8.9 3.8 11.6 7.8.2.3.4.5.6.7-.1.1 0 .1.1.3z" fill="#00a8e1" />
        <path d="M467.7 92.951c.6-2 1.2-3.9 1.8-5.9 4.6-15.5 9.2-30.9 13.8-46.4l.6-1.8c.5-1.8 2.2-2.9 4-2.9h15.2c3.8 0 4.6 1.1 3.3 4.7l-6 15.9c-6.7 17.4-13.4 34.9-20.1 52.3-.2.6-.5 1.2-.7 1.8-.7 2.1-2.8 3.5-5 3.3-4.4-.1-8.8-.1-13.2 0-3.1.1-4.9-1.3-6-4.1-2.5-6.6-5.1-13.3-7.6-19.9-6-15.7-12.1-31.4-18.1-47.2-.6-1.2-1-2.6-1.3-3.9-.3-2 .4-3 2.4-3 5.7-.1 11.4 0 17 0 2.4 0 3.5 1.6 4.1 3.7 1.1 3.8 2.2 7.7 3.4 11.5 4.1 13.9 8.1 27.9 12.2 41.8-.1.1 0 .1.2.1z" fill="#232f3e" />
        <path d="M112.6 46.951c.7-.2 1.3-.6 1.7-1.2 1.8-1.8 3.7-3.5 5.7-5.1 5.2-4 11.7-6 18.2-5.5 2.6.1 3.5.9 3.7 3.4.2 3.4.1 6.9.1 10.3.1 1.4 0 2.7-.2 4.1-.4 1.8-1.1 2.5-2.9 2.7-1.4.1-2.7 0-4.1-.1-6.7-.6-13.2.7-19.5 2.8-1.4.5-1.4 1.5-1.4 2.6v48c0 .9 0 1.7-.1 2.6-.1 1.3-1.1 2.3-2.4 2.3-.7.1-1.5.1-2.2.1h-13c-.7 0-1.5 0-2.2-.1-1.3-.1-2.3-1.2-2.4-2.5-.1-.8-.1-1.6-.1-2.4v-68c0-4.6.5-5.1 5.1-5.1h9.6c2.6 0 3.8.9 4.5 3.4.7 2.5 1.3 5 1.9 7.7zm467.8 101.4c6.6.2 13.1.6 19.5 2.3 1.8.5 3.5 1.1 5.2 1.9 2.3.9 3.8 3.1 4.1 5.5.4 2.8.5 5.7.3 8.6-1.3 17.1-6.6 33.6-15.4 48.3-3.2 5.3-7.1 10.1-11.6 14.3-.9.9-2 1.6-3.2 2-1.9.5-3.1-.5-3.2-2.4.1-1 .3-2 .7-3 3.5-9.4 6.9-18.7 9.6-28.4 1.6-5.3 2.7-10.7 3.4-16.2.2-2 .3-4 .1-6-.1-3.4-2.3-6.3-5.6-7.3-3.1-1-6.3-1.6-9.6-1.8-9.2-.4-18.4 0-27.5 1.2l-12.1 1.5c-1.3.1-2.5 0-3.2-1.2-.7-1.2-.4-2.4.3-3.6.8-1.1 1.8-2.1 3-2.8 7.4-5.3 15.7-8.5 24.5-10.6 6.8-1.4 13.7-2.1 20.7-2.3z" fill="#00a8e1" />
        <path d="M538.5 74.951v36c-.2 2-1.1 2.9-3.1 3-5.4.1-10.7.1-16.1 0-2 0-2.9-1-3.1-2.9-.1-.6-.1-1.3-.1-1.9v-69.2c.1-3.1.9-4 4-4h14.4c3.1 0 4 .9 4 4z" fill="#232f3e" />
        <path d="M151.6 74.751v-35.5c.1-2.4 1-3.3 3.4-3.4 5.2-.1 10.4-.1 15.6 0 2.3 0 3 .7 3.2 3 .1.9.1 1.7.1 2.6v66.6c0 1.1-.1 2.2-.2 3.3-.1 1.3-1.1 2.2-2.4 2.3-.6.1-1.1.1-1.7.1h-13.9c-.5 0-.9 0-1.4-.1-1.4-.1-2.6-1.2-2.7-2.6-.1-.8-.1-1.6-.1-2.4.1-11.1.1-22.5.1-33.9zm11.6-74.7c1.6-.1 3.2.2 4.7.7 5.4 1.8 8.2 6.5 7.7 12.6-.4 5.2-4.3 9.4-9.5 10.2-2.2.4-4.5.4-6.7 0-5.7-1.1-9.9-5.3-9.5-12.5.6-7.1 5.3-11 13.3-11z" fill="#00a8e1" />
        <path d="M527.4.051c2-.2 4 .2 5.9 1 3.9 1.5 6.6 5.1 6.8 9.3.8 9.1-5.3 13.7-13.4 13.5-1.1 0-2.2-.2-3.3-.4-6.2-1.5-9.4-6.3-8.8-13.2.5-5.5 4.8-9.6 10.7-10.1.7-.1 1.4-.2 2.1-.1z" fill="#232f3e" />
        <path d="M76.7 66.551c-.4-5.2-1.8-10.3-3.9-15-4.1-8.6-10.4-14.9-20-17.1-11-2.4-20.9 0-29.9 6.7-.6.6-1.3 1.1-2.1 1.5-.2-.1-.4-.2-.4-.3-.3-1-.5-2-.8-3-.8-2.5-1.8-3.4-4.5-3.4-3 0-6.1.1-9.1 0-2.3-.1-4.4.2-6 2 0 35 0 70.1.1 105 1.3 2.1 3.3 2.5 5.6 2.4 3.6-.1 7.2 0 10.8 0 6.3 0 6.3 0 6.3-6.2v-28.5c0-.7-.3-1.5.4-2.1 5 3.9 11.1 6.3 17.4 6.9 8.8.9 16.8-1.3 23.5-7.3 4.9-4.5 8.5-10.3 10.4-16.7 2.7-8.2 2.9-16.5 2.2-24.9zm-23.9 20.7c-.7 3.1-2.3 5.9-4.6 8-2.6 2.2-5.8 3.5-9.2 3.5-5.1.3-10.1-.8-14.6-3.2-1.1-.5-1.8-1.6-1.7-2.8v-18.1c0-6 .1-12 0-18-.1-1.4.7-2.6 2-3.1 5.5-2.6 11.2-3.8 17.2-2.6 4.2.6 7.8 3.3 9.5 7.2 1.5 3.2 2.4 6.7 2.6 10.2.6 6.4.6 12.8-1.2 18.9z" fill="#00a8e1" />
        <path d="M800.1 82.151s0-.1 0 0c0-.1 0-.1 0 0zm.1-13.4v.4c-.4-.4-.6-1-.4-1.5v-.8s0-.1.1-.1h-.1v-1h.2c0-.1-.1-.1-.1-.2-.2-1.9-.6-3.8-1.1-5.6-3.7-13.2-12-21.9-25.5-25.3-6.3-1.5-12.7-1.7-19.1-.7-13.5 2-23.2 9.2-27.9 22-4.6 12.2-4.5 25.6.1 37.8 4 11.1 12 18.1 23.5 21 6.1 1.5 12.5 1.9 18.8 1 21-2.5 29.7-18.4 31.1-32.2h-.1v-1.4c-.1-.6-.2-1.1.4-1.5v.2c0-.1.1-.3.2-.4v-11.5c0-.1-.1-.1-.1-.2zm-24 19c-.6 2.1-1.5 4-2.8 5.8-2.2 3.1-5.7 5.1-9.5 5.4-1.9.2-3.8.2-5.7-.2-4.2-.8-7.7-3.6-9.4-7.5-1.5-3.1-2.4-6.5-2.7-9.9-.5-5.9-.6-11.8.8-17.6.5-2.3 1.5-4.6 2.7-6.6 2.2-3.6 6-5.9 10.2-6.2 1.9-.2 3.8-.2 5.7.2 4 .8 7.3 3.4 9.1 7.1 1.7 3.5 2.7 7.4 2.9 11.3.1 1.8.2 3.6.1 5.4.3 4.4-.2 8.7-1.4 12.8zm-151.3-87H611c-3.8 0-4.5.7-4.5 4.5v32.4c0 .7.3 1.4-.2 2.1-.9-.1-1.4-.7-2.1-1.1-10.4-6.1-21.3-7.2-32.3-2.1-7.7 3.6-12.5 10.1-15.6 17.8-3 7.4-3.7 15.2-3.5 23.1 0 7.4 1.7 14.7 5 21.3 3.8 7.3 9.3 12.9 17.3 15.3 10.9 3.4 21.1 1.7 30.4-5.2.7-.4 1.1-1.1 2-1.3.5 1.1.9 2.3 1.1 3.5.4 1.6 1.8 2.7 3.5 2.7h2.4c3.6 0 7.1.1 10.6 0 2.8 0 3.6-.9 3.7-3.8V4.551c-.1-3.1-.9-3.8-3.9-3.8zm-18.3 73.6v18.2c.2 1.2-.5 2.3-1.6 2.8-4.8 2.7-10.3 3.8-15.7 3-4.6-.5-8.6-3.3-10.7-7.4-1.6-3.2-2.5-6.6-2.8-10.1-.8-6.3-.3-12.7 1.2-18.8.5-1.7 1.1-3.3 2-4.9 2.1-3.9 6.1-6.4 10.5-6.7 5.3-.5 10.6.5 15.4 2.7 1.2.4 1.9 1.6 1.8 2.9-.2 6.2-.1 12.2-.1 18.3z" fill="#232f3e" />
        <path d="M348 81.251c7.5 1.4 15.2 1.5 22.7.3 4.4-.6 8.6-1.9 12.5-4 4.5-2.6 7.8-6.2 9.2-11.2 3.5-12.6-1.9-25.3-15-30-6.4-2.1-13.2-2.8-19.9-1.9-15.8 1.8-26.1 10.5-30.8 25.6-3.3 10.3-2.9 20.8-.2 31.2 3.5 13.3 12.3 21.2 25.6 24 7.6 1.7 15.3 1.4 22.9.2 4-.7 8-1.7 11.8-3.2 2.3-.9 3.5-2.3 3.4-4.9-.1-2.4 0-4.9 0-7.4 0-3-1.2-3.9-4.1-3.2-2.9.7-5.7 1.3-8.6 1.9-6.2 1.3-12.6 1.3-18.8.2-8.5-1.7-14-9-13.5-18 .9.1 1.9.2 2.8.4zm-2.5-15.3c.3-2.4 1-4.7 1.9-6.9 3-7.3 9.3-9.8 15.7-9.4 1.8.1 3.6.5 5.3 1.2 2.6 1.1 4.3 3.5 4.6 6.3.3 1.7.2 3.5-.3 5.2-1.2 3.6-4.1 5.1-7.6 5.8-2.1.5-4.3.7-6.5.5-3.9 0-7.9-.3-11.8-.9-1.5-.2-1.5-.2-1.3-1.8z" fill="#00a8e1" />
        <path d="M685.3 82.251c5.8-.4 11.6-1.5 16.8-4.3 5.3-2.6 9-7.5 10.1-13.3.7-3.6.7-7.4-.1-11-2.1-9-7.8-14.6-16.4-17.5-4.8-1.5-9.9-2.1-14.9-1.9-16.8.4-29.6 8.9-34.8 25.7-3.5 11.1-3 22.4.4 33.5 3.5 11.4 11.5 18.3 22.9 21.4 4.9 1.2 10 1.7 15 1.5 7.3-.1 14.6-1.5 21.5-4.1 2.9-1.1 3.6-2.1 3.6-5.2v-7.2c-.1-2.9-1.3-3.9-4.2-3.2-2.2.6-4.3 1.1-6.5 1.6-6.7 1.6-13.7 1.9-20.5.7-6.8-1.3-11.4-5.2-13.2-12-.5-2-.9-4-1.1-6.1.5 0 1 0 1.4.2 6.6 1.2 13.3 1.7 20 1.2zm-20.9-16c.7-3.9 1.6-7.7 4-10.9 3.7-4.9 8.8-6.3 14.6-5.7.5 0 .9.2 1.4.2 7 1.1 8.7 6.7 7.4 12.1-1 4-4.3 5.5-8 6.2-2 .4-4.1.6-6.2.5-4.1-.1-8.1-.4-12.1-1-.9-.1-1.3-.5-1.1-1.4z" fill="#232f3e" />
    </svg>



    <svg xmlns="http://www.w3.org/2000/svg" class="h-14" viewBox="-121.5087 -26.884 1053.0754 161.304">
        <path d="M102.327 107.277a52.047 52.047 0 01-10.14-1.967c-12.334-3.712-21.276-13.362-24.7-26.654-1.613-6.263-1.55-4.694-1.671-41.492l-.113-34.275h14.124V35.6c0 21.47.111 33.712.324 35.623 1.224 10.973 7.802 18.439 19.474 22.102 5.713 1.793 10.3 1.875 15.856.283 10.05-2.88 16.037-9.165 18.026-18.925.605-2.967.62-3.86.62-37.417V2.889h15v33.636c0 36.423-.006 36.59-1.654 42.714-3.625 13.482-12.93 23.015-25.777 26.413-5.821 1.54-13.489 2.183-19.37 1.625zm357.01-.014c-5.86-.564-11.693-2.29-15.736-4.657-2.73-1.598-6.647-5.225-8.35-7.731-1.563-2.299-3.328-6.134-3.952-8.586-.888-3.49-1.23-8.633-.835-12.55.655-6.502 2.462-10.956 5.987-14.763 4.428-4.783 9.316-7.563 17.34-9.864 4.81-1.378 8.594-2.025 20.386-3.48 15.676-1.936 17.396-2.194 19.26-2.891 2.2-.823 4.004-2.633 4.913-4.93.617-1.558.703-2.28.707-5.972.004-3.553-.103-4.547-.691-6.45-2.085-6.747-6.985-10.519-15.356-11.821-12.124-1.886-22.47.305-28.301 5.993-3.29 3.21-5.572 9.243-5.58 14.753l-.003 1.575h-14.7l.006-.675c.025-2.86 1.231-9.068 2.463-12.675 2.838-8.307 9.861-15.504 18.311-18.763 7.238-2.791 16.773-4.013 25.71-3.294 12.024.967 18.379 3.376 24.16 9.157 4.299 4.299 6.333 7.972 7.86 14.194.433 1.769.512 5.692.666 33.206.172 30.88.18 31.212.8 32.4 1.492 2.859 5.145 3.585 9.199 1.83l1.125-.488v13.135l-2.475.411c-3.04.506-9.71.52-11.872.024-3.677-.841-6.742-3.164-8.3-6.287-.879-1.764-1.64-4.961-1.648-6.925-.003-.715-.123-1.255-.267-1.2-.144.055-1.065 1.112-2.045 2.35-5.472 6.906-10.692 10.771-17.578 13.02-6 1.958-13.746 2.672-21.204 1.954zm13.212-12.756c11.327-1.932 19.7-7.867 23.978-16.997 2.197-4.689 2.47-6.392 2.621-16.346.073-4.826.07-8.775-.006-8.775-.076 0-.73.26-1.452.577-2.799 1.231-10.14 2.647-21.863 4.217-19.231 2.575-28.347 7.094-30.482 15.111-.548 2.06-.528 6.548.04 8.73 1.767 6.78 7.913 12.098 15.764 13.639 2.257.442 8.381.359 11.4-.156zm82.178 10.97c-8.978-1.07-13.952-4.828-15.748-11.901-.983-3.87-1.04-6.185-1.046-41.862l-.006-35.925h-17.4v-12.6h52.2v12.6h-20.4l.009 33.525c.009 31.84.106 36.163.884 39.053.745 2.764 2.791 4.32 6.355 4.834 1.805.26 10.394-.079 12.326-.486l.825-.174v12.853l-5.448.198c-6.456.233-9.896.202-12.552-.114zM.112 68.215C.234 28.1.149 30.078 2.014 23.889 6.32 9.594 18.264 1.517 37.046.198c5.683-.4 13.61.062 18.106 1.054l.675.148v13.677l-2.775-.42c-1.63-.247-5.374-.434-9.075-.454-5.492-.03-6.701.053-9.427.643-9.379 2.027-15.268 6.499-18.074 13.725-1.409 3.629-1.772 6.67-1.68 14.085l.08 6.583 17.026.077 17.025.078v13.495h-33.9v42H0l.112-36.675zM160.527 54.04V3.189h14.688l.08 6.638.082 6.639 1.038-1.614c1.469-2.283 5.444-6.168 8.236-8.048 4.42-2.978 9.943-5.175 15.303-6.087 2.729-.465 10.9-.433 14.573.056 14.433 1.922 23.877 9.552 27.143 21.931 1.811 6.864 1.744 5.234 1.868 45.36l.113 36.825h-14.394l-.12-34.575c-.129-37.26-.117-36.974-1.737-42.375-2.113-7.046-6.787-11.84-13.567-13.917-4.713-1.442-12.105-1.454-17.252-.028-9.523 2.639-16.669 10.098-19.702 20.566-1.659 5.723-1.65 5.517-1.651 39.204l-.001 31.125h-14.7v-50.85zm93.9 0V3.189h14.7v101.7h-14.7zm27 0V3.189h13.489l.08 6.952.08 6.952 1.681-2.227c5.43-7.193 11.642-11.51 19.163-13.317 9.538-2.292 19.182-1.434 26.887 2.39 5.367 2.663 8.988 6.12 11.529 11.003.671 1.29 1.262 2.347 1.312 2.347.05 0 .716-.94 1.48-2.09 4.927-7.41 12.756-12.305 22.86-14.297 3.227-.636 10.745-.71 14.389-.142 8.205 1.279 13.925 4.052 18.42 8.93 4.889 5.306 7.48 12.487 8.131 22.535.157 2.427.289 19.77.292 38.539l.006 34.125h-14.7V69.406c0-22.641-.112-36.403-.31-38.025-.992-8.107-4.194-13.609-9.333-16.032-2.8-1.321-4.926-1.864-8.92-2.277-12.344-1.278-21.635 3.75-25.98 14.061-1.248 2.962-1.806 4.91-2.61 9.107-.639 3.333-.654 4.028-.763 36.024l-.11 32.625h-14.659l-.091-37.575-.091-37.575-.677-2.55c-1.413-5.328-4.196-9.517-7.67-11.547-3.819-2.231-8.693-3.132-14.011-2.588-7.075.722-11.613 2.726-16.044 7.085-4.49 4.417-7.205 10.352-8.727 19.075-.43 2.466-.508 6.82-.615 34.25l-.122 31.425h-14.368v-50.85zm303 0V3.189h14.4v101.7h-14.4zm71.4 50.419c-5.985-.861-11.23-2.472-16.35-5.02-25.681-12.778-36.363-43.598-24.104-69.55 10.415-22.05 35.043-33.982 59.049-28.609 20.089 4.497 35.499 20.246 39.912 40.792.824 3.832 1.136 12.564.603 16.824-.731 5.84-2.479 11.591-5.155 16.962-2.874 5.767-5.77 9.644-10.865 14.542-7.69 7.393-16.335 11.752-27.34 13.786-3.407.63-12.21.783-15.75.273zm12.837-20.427c3.113-.618 7.293-2.686 9.282-4.593 1.968-1.886 3.751-4.633 4.556-7.015.343-1.018.625-1.96.625-2.092 0-.133-9.063-.242-20.14-.242h-20.139l.182 1.125c.292 1.807 2.189 5.308 3.881 7.164 2.604 2.855 5.988 4.723 10.266 5.666 2.51.554 8.663.546 11.487-.013zm58.263-29.992V3.189h14.388l.08 6.646.082 6.646 1.547-2.082C748.128 7.534 756.068 2.71 765.272.884c3.777-.75 12.485-.67 17.16.159 14.217 2.518 22.807 10.045 25.788 22.596 1.64 6.91 1.606 5.996 1.726 45.025l.112 36.225h-14.731V71.154c0-36.07-.05-37.484-1.515-42.753-2.245-8.075-7.585-13.115-15.769-14.882-2.847-.614-9.543-.704-12.416-.167-11.59 2.169-19.761 10.335-22.938 22.92-1.281 5.08-1.362 7.389-1.362 38.779v29.838h-14.4z" fill="#472d8e" />
    </svg>


    <svg xmlns="http://www.w3.org/2000/svg" class="h-24" viewBox="-153.6 -69.1855 1331.2 415.113">
        <path fill="#d81f26" d="M140.803 258.904c-15.404 2.705-31.079 3.516-47.294 5.676L44.051 119.724v151.073C28.647 272.418 14.594 274.58 0 276.742V0h41.08l56.212 157.021V0h43.511zm85.131-157.558c16.757 0 42.431-.811 57.835-.811v43.24c-19.189 0-41.619 0-57.835.811v64.322c25.405-1.621 50.809-3.785 76.482-4.596v41.617l-119.724 9.461V0h119.724v43.241h-76.482zm237.284-58.104h-44.862V242.15c-14.594 0-29.188 0-43.239.539V43.242h-44.862V0H463.22zm70.266 55.132h59.187v43.24h-59.187v98.104h-42.433V0h120.808v43.241h-78.375zm148.641 103.507c24.594.539 49.456 2.434 73.51 3.783v42.701c-38.646-2.434-77.293-4.863-116.75-5.676V0h43.24zm109.994 49.457c13.783.812 28.377 1.623 42.43 3.242V0h-42.43zM1024 0l-54.863 131.615L1024 276.742c-16.217-2.162-32.432-5.135-48.648-7.838l-31.078-79.994-31.617 73.51c-15.678-2.705-30.812-3.516-46.484-5.678l55.672-126.75L871.576 0h46.482l28.377 72.699L976.705 0z" />
    </svg>


    <svg xmlns="http://www.w3.org/2000/svg" class="h-24" viewBox="-32.385 -17.8 280.67 106.8">
        <path fill="#1CE783" d="M132.3 71.2h17.2V0h-17.2zm-30.2-20.3c0 2.5-2.1 4.6-4.6 4.6h-10c-2.5 0-4.6-2.1-4.6-4.6V22.2H65.7v30.1c0 12.3 7.9 18.8 19.5 18.8H102c10.7 0 17.2-7.7 17.2-18.8V22.2H102c.1 0 .1 27.8.1 28.7zm96.7-28.7v28.7c0 2.5-2.1 4.6-4.6 4.6h-10c-2.5 0-4.6-2.1-4.6-4.6V22.2h-17.2v30.1c0 12.3 7.9 18.8 19.5 18.8h16.8c10.7 0 17.2-7.7 17.2-18.8V22.2zM34 22.2H23c-3.9 0-5.8 1-5.8 1V0H0v71.1h17.1V42.5c0-2.5 2.1-4.6 4.6-4.6h10c2.5 0 4.6 2.1 4.6 4.6v28.7h17.2v-31c0-13-8.7-18-19.5-18z" />
    </svg>

</div>

<div class="border-b-2 border-sky-600 w-5/6 ml-24 pt-6">
    <h1 class="text-white flex gap-4 uppercase">
        A voir
    </h1>
</div>


<div class="A-voir swiper mySwiper relative pt-8 bg-cover bg-center" style="background-image: url('/images/wave-haikei (1).svg');">
    <div class="swiper-wrapper">
        @foreach($postsAVoir as $post)
        <div class="card-box shadow post-card swiper-slide" data-post-id="{{ $post->id }}" data-post-title="{{ $post->title }}" data-post-episode="{{ $post->episode }}" data-post-date_ajout="{{ $post->date_ajout }}" data-post-image="{{ asset('storage/images/'.$post->image) }}" data-post-type="{{ $post->type }}" data-post-created-at="{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}" data-post-statut="{{ $post->statut }}" style="background-image: url('{{ asset('storage/images/'.$post->image) }}')">
            <span class="text-right bg-yellow-500 p-1 mx-2 rounded-full">{{$post->episode}}</span>
        </div>
        @endforeach

        <a href="@yield('link')" class="w-fit swiper-slide bg-transparent">
            <div class="card-box border-2 underline text-blue-500 flex items-center border-dashed justify-center text-5xl">
                &plus;
            </div>
        </a>

    </div>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 59" fill="white" class="swiper-button-prev absolute top-[50%] left-0 h-12 z-50 rotate-180 cursor-pointer">
        <g id="Layer_2" data-name="Layer 2">
            <g id="Layer_1-2" data-name="Layer 1">
                <g id="arrow_forward_ios" data-name="arrow forward ios">
                    <path d="M2.5,59a2.49,2.49,0,0,1-1.77-.73,2.52,2.52,0,0,1,0-3.54L26,29.5.73,4.27A2.5,2.5,0,0,1,4.27.73l27,27a2.52,2.52,0,0,1,0,3.54l-27,27A2.49,2.49,0,0,1,2.5,59Z" />
                </g>
            </g>
        </g>
    </svg>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 59" fill="white" class="swiper-button-next top-[50%] absolute right-0 h-12 z-50 cursor-pointer">
        <g id="Layer_2" data-name="Layer 2">
            <g id="Layer_1-2" data-name="Layer 1">
                <g id="arrow_forward_ios" data-name="arrow forward ios">
                    <path d="M2.5,59a2.49,2.49,0,0,1-1.77-.73,2.52,2.52,0,0,1,0-3.54L26,29.5.73,4.27A2.5,2.5,0,0,1,4.27.73l27,27a2.52,2.52,0,0,1,0,3.54l-27,27A2.49,2.49,0,0,1,2.5,59Z" />
                </g>
            </g>
        </g>
    </svg>

</div>

<a href="{{route('post.to-see')}}" class="flex justify-center my-5 items-center">
    <span class="bg-sky-600 p-2 px-8 cursor-pointer rounded-full hover:bg-sky-700">Voir tout</span>
</a>

<div class="border-b-2 border-sky-600 w-5/6 ml-24 pt-6">
    <h1 class="text-white flex gap-4 uppercase">
        Terminés
    </h1>
</div>


<div class="pt-8">
    <div class="flex justify-center items-center flex-wrap gap-5">
        @foreach($postsTermines as $post)

        <div class="card-box shadow post-card" data-post-id="{{ $post->id }}" data-post-title="{{ $post->title }}" data-post-episode="{{ $post->episode }}" data-post-date_ajout="{{ $post->date_ajout }}" data-post-image="{{ asset('storage/images/'.$post->image) }}" data-post-type="{{ $post->type }}" data-post-created-at="{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}" data-post-statut="{{ $post->statut }}" style="background-image: url('{{ asset('storage/images/'.$post->image) }}')">
            <span class="text-right bg-yellow-500 p-1 mx-2 rounded-full">{{$post->episode}}</span>
        </div>
        @endforeach

        <a href="@yield('link')" class="w-fit swiper-slide bg-transparent">
            <div class="card-box border-2 underline text-blue-500 flex items-center border-dashed justify-center text-5xl">
                &plus;
            </div>
        </a>

    </div>

</div>

<a href="{{route('post.completed')}}" class="flex justify-center my-5 items-center">
    <span class="bg-sky-600 p-2 px-8 cursor-pointer rounded-full hover:bg-sky-700">Voir tout</span>
</a>

<div class="text-center pt-8">
    <h1 class="font-bold text-4xl text-gray-600">On fait les comptes ! </h1>
    <div class="flex justify-center gap-5 p-6 text-2xl font-bold text-gray-200">
        <div class="flex flex-col border-4 h-40 w-40 rounded-full border-sky-600 p-6">
            <span class="count-animation" data-count="{{$seriesCount}}"></span>
            <span>Séries Terminées</span>
        </div>

        <div class="flex flex-col border-4 h-40 w-40 rounded-full border-sky-600 p-6">
            <span class="count-animation" data-count="{{$seriesprogressCount}}"></span>
            <span>Séries en cours</span>
        </div>

        <div class="flex flex-col border-4 h-40 w-40 rounded-full border-sky-600 p-6">
            <span class="count-animation" data-count="{{$filmsCount}}"></span>
            <span>Films vus</span>
        </div>
    </div>

</div>

<div class="border-b-2 border-sky-600 w-5/6 ml-24 pt-6">
    <h1 class="text-white flex gap-4 uppercase">
        Trailers
    </h1>
</div>

<div class="flex flex-wrap h-fit justify-center pt-5 pb-10 bg-center bg-cover" style="background-image:url('/images/polygon-scatter-haikei.svg')";>
    <div class="w-4/5 flex flex-wrap">
        <iframe class="w-1/2 rounded-tl-lg" height="315" src="https://www.youtube.com/embed/ilKGhD_WoDk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <iframe class="w-1/2 rounded-tr-lg" height="315" src="https://www.youtube.com/embed/uv4Z89Cn2pM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <iframe class="w-1/2 rounded-bl-lg" height="315" src="https://www.youtube.com/embed/0xvw5oX028I" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <iframe class="w-1/2 rounded-br-lg" height="315" src="https://www.youtube.com/embed/G8YArer2Z9k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
</div>

@endsection

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        const postCards = document.querySelectorAll('.post-card');
        const popup = document.querySelector('.popup');
        const close = document.querySelector('.close');
        const clicksoundCard = document.querySelector('.click-card');


        postCards.forEach(function(card) {
            card.addEventListener('click', function() {
                const postId = this.getAttribute('data-post-id');
                const postTitle = this.getAttribute('data-post-title');
                const postImage = this.getAttribute('data-post-image');
                const postType = this.getAttribute('data-post-type');
                const postCreatedAt = this.getAttribute('data-post-created-at');
                const postStatut = this.getAttribute('data-post-statut');
                const postEpisode = this.getAttribute('data-post-episode');
                const postDateAjout = this.getAttribute('data-post-date_ajout');

                // Injecter les informations du post dans la pop-up
                const popupContent = document.querySelector('.popup-content');
                popupContent.innerHTML = `
                <div class="w-1/2 h-full bg-cover bg-center rounded-l-lg" style="background-image: url('${postImage}')"></div>
        <div class="w-1/2 h-full flex justify-between py-5 flex-col pl-5">
            <div>
                <h6>Nom : ${postTitle} </h6>
                <h6>Type : ${postType} </h6>
                <h6>Statut : ${postStatut} </h6>
                <h6>Episode(s) vu(s) : ${postEpisode} </h6>
                <h6>Date d'ajout : ${postDateAjout} </h6>
            </div>

            <div class="flex gap-3">
                <a href="/post/${postId}/edit" class="no-underline text-white">
                    <button class="py-2 px-4 bg-sky-500 hover:bg-sky-600 rounded-full">Modifier</button>
                </a>

                <form action="/post/${postId}" class="bg-red-500 hover:bg-red-600 py-2 px-4 rounded-full" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="">
                        Supprimer
                    </button>
                </form>

            </div>


        </div>
    </div>

            `;

                postCards.forEach(function(card) {
                    card.addEventListener('click', function() {
                        popup.style.display = "flex";
                        clicksoundCard.play();
                    });
                });

                close.addEventListener('click', () => {
                    popup.style.display = "none";
                })

            });
        });
    });
</script>

<style>
    .popup {
        display: none;
    }

    .swiper {
        width: 83.33%;
        height: 100%;
    }

    .swiper-slide {
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .index-li {
        background-color: #0284C7;
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
        border-top-left-radius: 9999px;
        border-bottom-left-radius: 9999px;
    }
</style>

