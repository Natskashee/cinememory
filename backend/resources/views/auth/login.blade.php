<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Connexion</title>
</head>

<body class="bg-daintree-900 overflow-hidden">
    
    <div>
        <div class="flex h-screen justify-center items-center flex-col gap-6">
        <h1 class="text-white text-2xl font-bold">Cine<span class="text-sky-600">memory</span></h1>

            <div class="lg:w-2/3 w-4/5 h-[70vh] flex">
                <div class="w-full h-auto hidden sm:block lg:w-1/2 bg-cover  bg-right rounded-l-lg" style="background-image: url('/images/The Last of Us II.jpg')"></div>
                <div class="w-full lg:w-1/2 bg-daintree-800 p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl font-bold text-white text-center">Connexion</h3>
                    <form method="POST" action="{{ route('login') }}" class="px-8 pt-6 pb-8 mb-4  rounded">
                        @csrf
                        <div class="mb-4">
                            <label for="email" class="block mb-2  text-white text-sm">{{ __('Email Address') }}</label>
                            <input id="email" type="email" class="block bg-transparent text-white w-full p-3 mt-2 mb-4 leading-tight border border-sky-600  rounded-full appearance-none focus:outline-none focus: focus:border-sky-700 @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block mb-2 bg-transparent text-white text-sm">{{ __('Password') }}</label>
                            <input id="password" type="password" class="block w-full bg-transparent text-white p-3 mt-2 mb-4 leading-tight border border-sky-600 rounded-full appearance-none focus:outline-none focus: focus:border-sky-700 @error('password') border-red-500 @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center">
                                <input class="mr-2 leading-tight" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="text-sm text-white" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="mb-6 text-center">
                            <button type="submit" class="w-full px-4 py-2 font-bold text-white bg-sky-600 rounded-full hover:bg-sky-700 focus:outline-none focus:shadow-outline-sky focus:bg-sky-700">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="inline-block mt-2 text-sm text-sky-600 align-baseline hover:text-sky-700" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>


<style>
    @font-face {
        font-family: 'Graphik LCG';
        src: url('/fonts/GraphikLCG-Regular.woff2') format('woff2'),
            url('/fonts/GraphikLCG-Regular.woff') format('woff');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Signatra DEMO';
        src: url('/fonts/SignatraDEMO.woff2') format('woff2'),
            url('/fonts/SignatraDEMO.woff') format('woff');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Candle Mustard';
        src: url('/fonts/CandleMustard.woff2') format('woff2'),
            url('/fonts/CandleMustard.woff') format('woff');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Metropolis';
        src: url('/fonts/Metropolis-Regular.woff2') format('woff2'),
            url('/fonts/Metropolis-Regular.woff') format('woff');
        font-weight: normal;
        font-style: normal;
        font-display: swap;
    }

    @font-face {
        font-family: 'Metropolis Bold';
        src: url('/fonts/Metropolis-Bold.woff2') format('woff2'),
            url('/fonts/Metropolis-Bold.woff') format('woff');
        font-weight: bold;
        font-style: normal;
        font-display: swap;
    }

    body {
        font-family: 'Metropolis';
    }


    .title {
        font-family: 'Candle Mustard';
    }
</style>