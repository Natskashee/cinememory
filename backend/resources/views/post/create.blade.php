@extends('layout.app')

@section('title', 'Ajouter une nouvelle memorie')
@section('heading', 'Créer une nouvelle memorie')
@section('link_text', 'Aller aux memories')
@section('link', '/post')

@section('content')
<div class="flex justify-center items-center my-3 min-h-[80vh]" style="background-image: url('/images/wave-haikei (1).svg');">
  <div class="w-full lg:w-8/12">
    <div class="flex forms h-[500px] border border-sky-600 rounded-lg shadow-lg">
      <div class="h-full w-1/2 bg-center rounded-l-lg bg-cover" style="background-image: url('/images/Spider-Man No Way Home.jpg');">
      </div>

      <div class="bg-daintree-900 rounded-r-lg">
        <div class="text-white px-4 py-2 w-1/2">
          <h3 class="font-bold text-lg">@yield('heading')</h3>
        </div>
        <div class="p-4">
          <form action="/post" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="my-2">
              <input type="text" name="title" id="title" class="border bg-transparent text-white border-daintree-300 rounded-full py-2 px-3 w-full @error('title') border-red-500 @enderror" placeholder="Titre" value="{{ old('title') }}">
              @error('title')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="my-2">
              <select name="type" id="type" class="border border-daintree-300 bg-transparent text-white rounded-full py-2 px-3 w-full @error('type') border-red-500 @enderror" placeholder="type" value="{{ old('type') }}">
                <option value="Série" class="bg-daintree-900">Série</option>
                <option value="Film" class="bg-daintree-900">Film</option>
              </select>
              @error('type')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="my-2">
              <input type="file" name="file" id="file" accept="image/*" class="border border-daintree-300 text-white bg-transparent rounded-full py-2 px-3 w-full @error('file') border-red-500 @enderror">
              @error('file')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="my-2">
              <input type="text" name="episode" id="episode" class="border bg-transparent text-white border-daintree-300 rounded-full py-2 px-3 w-full @error('episode') border-red-500 @enderror" placeholder="Episode" value="{{ old('episode') }}">
              @error('episode')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="my-2">
              <input type="date" name="date_ajout" id="date_ajout" class="border bg-transparent text-white border-daintree-300 rounded-full py-2 px-3 w-full @error('date_ajout') border-red-500 @enderror" placeholder="Date d'ajout" value="{{ old('date_ajout') }}">
              @error('date_ajout')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>


            <div class="my-2">
              <select name="statut" id="statut" rows="6" class="border border-daintree-300 bg-transparent text-white rounded-full py-2 px-3 w-full @error('statut') border-red-500 @enderror" placeholder="Post statut">
                <option value="En cours" class="bg-daintree-900">En cours</option>
                <option value="Terminé" class="bg-daintree-900">Terminé</option>
                <option value="A voir" class="bg-daintree-900">À voir</option>
              </select>
              @error('statut')
              <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
              @enderror
            </div>

            <div class="py-6">
              <input type="submit" value="Ajouter une memorie" class="bg-sky-600 hover:bg-sky-700 cursor-pointer text-white py-2 px-4 rounded-full">
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection


<script>
document.addEventListener('DOMContentLoaded', function() {
  gsap.registerPlugin(ScrollTrigger);

  const formContainer = document.querySelector('.forms');

  gsap.from(formContainer, {
    opacity: 0,
    y: 50,
    duration: 1,
    ease: 'power3.out'
  });

  const formInputs = document.querySelectorAll('.forms input, .forms select, .forms textarea');

  formInputs.forEach((input, index) => {
    gsap.from(input, {
      opacity: 0,
      y: 50,
      duration: 0.8,
      ease: 'power3.out',
      scrollTrigger: {
        trigger: input,
        start: 'top 80%',
        toggleActions: 'play none none none'
      },
      delay: index * 0.2
    });
  });
});


</script>