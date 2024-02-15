<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body class="text-white flex bg-gray-800">
    <div class="sidebar fixed pt-4 bg-gray-900 flex flex-col h-screen shadow-lg w-1/6">
        <h1 align="center" class="text-green-500 font-bold text-xl title"> <span class="text-white">Cine</span>memory</h1>

        <nav class="pt-9">
            <ul class="flex flex-col gap-6">
                <a class="flex gap-4 pl-4 bg-gray-800 py-3 rounded-l-full">
                    <svg fill="currentcolor" class="h-6" version="1.1" id="lni_lni-grid-alt" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64" xml:space="preserve">
                        <g>
                            <path d="M21.7,3.4H9c-3.4,0-6.2,2.8-6.2,6.2v12.7c0,3.4,2.8,6.2,6.2,6.2h12.7c3.4,0,6.2-2.8,6.2-6.2V9.7C28,6.2,25.2,3.4,21.7,3.4z
		 M23.5,22.4c0,1-0.8,1.8-1.8,1.8H9c-1,0-1.8-0.8-1.8-1.8V9.7c0-1,0.8-1.8,1.8-1.8h12.7c1,0,1.8,0.8,1.8,1.8V22.4z"></path>
                            <path d="M55,3.4H42.3c-3.4,0-6.2,2.8-6.2,6.2v12.7c0,3.4,2.8,6.2,6.2,6.2H55c3.4,0,6.2-2.8,6.2-6.2V9.7C61.2,6.2,58.4,3.4,55,3.4z
		 M56.8,22.4c0,1-0.8,1.8-1.8,1.8H42.3c-1,0-1.8-0.8-1.8-1.8V9.7c0-1,0.8-1.8,1.8-1.8H55c1,0,1.8,0.8,1.8,1.8V22.4z"></path>
                            <path d="M21.7,35.3H9c-3.4,0-6.2,2.8-6.2,6.2v12.7c0,3.4,2.8,6.2,6.2,6.2h12.7c3.4,0,6.2-2.8,6.2-6.2V41.6
		C28,38.1,25.2,35.3,21.7,35.3z M23.5,54.3c0,1-0.8,1.8-1.8,1.8H9c-1,0-1.8-0.8-1.8-1.8V41.6c0-1,0.8-1.8,1.8-1.8h12.7
		c1,0,1.8,0.8,1.8,1.8V54.3z"></path>
                            <path d="M55,35.3H42.3c-3.4,0-6.2,2.8-6.2,6.2v12.7c0,3.4,2.8,6.2,6.2,6.2H55c3.4,0,6.2-2.8,6.2-6.2V41.6
		C61.2,38.1,58.4,35.3,55,35.3z M56.8,54.3c0,1-0.8,1.8-1.8,1.8H42.3c-1,0-1.8-0.8-1.8-1.8V41.6c0-1,0.8-1.8,1.8-1.8H55
		c1,0,1.8,0.8,1.8,1.8V54.3z"></path>
                        </g>
                    </svg>
                    <span>Accueil</span>
                </a>
                <li class="flex gap-4 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59 59" fill="currentcolor" class="h-6">
                        <title>compare arrows</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <g id="compare_arrows" data-name="compare arrows">
                                    <path d="M46.5,17H2.5a2.5,2.5,0,0,1,0-5h44a2.5,2.5,0,0,1,0,5Z" />
                                    <path d="M14.5,29a2.49,2.49,0,0,1-1.77-.73l-12-12a2.52,2.52,0,0,1,0-3.54l12-12a2.5,2.5,0,0,1,3.54,3.54L6,14.5,16.27,24.73a2.52,2.52,0,0,1,0,3.54A2.49,2.49,0,0,1,14.5,29Z" />
                                    <path d="M56.5,47h-44a2.5,2.5,0,0,1,0-5h44a2.5,2.5,0,0,1,0,5Z" />
                                    <path d="M44.5,59a2.49,2.49,0,0,1-1.77-.73,2.52,2.52,0,0,1,0-3.54L53,44.5,42.73,34.27a2.5,2.5,0,1,1,3.54-3.54l12,12a2.52,2.52,0,0,1,0,3.54l-12,12A2.49,2.49,0,0,1,44.5,59Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span>En cours</span>
                </li>
                <li class="flex gap-4 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentcolor" class="h-6" viewBox="0 0 59 59">
                        <title>check circle</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <g id="check_circle" data-name="check circle">
                                    <path d="M29.5,59A29.5,29.5,0,1,1,59,29.5,29.53,29.53,0,0,1,29.5,59Zm0-54A24.5,24.5,0,1,0,54,29.5,24.53,24.53,0,0,0,29.5,5Z" />
                                    <path d="M26.37,39.24a2.49,2.49,0,0,1-1.77-.73l-7.22-7.22a2.5,2.5,0,0,1,3.53-3.54l5.46,5.46L38.09,21.49A2.5,2.5,0,1,1,41.62,25L28.14,38.51A2.49,2.49,0,0,1,26.37,39.24Z" />
                                </g>
                            </g>
                        </g>
                    </svg>

                    <span>Terminés</span>
                </li>
                <li class="flex gap-4 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6" fill="currentcolor" viewBox="0 0 59 59">
                        <title>confetti</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <g id="confetti">
                                    <path d="M2.5,59A2.5,2.5,0,0,1,.21,55.49L15.55,20.75A2.49,2.49,0,0,1,19.6,20L39,39.4a2.51,2.51,0,0,1,.69,2.23,2.47,2.47,0,0,1-1.45,1.82L3.51,58.79A2.58,2.58,0,0,1,2.5,59ZM18.65,26.11,7.39,51.61l25.5-11.26Z" />
                                    <path d="M33.06,28.44a2.49,2.49,0,0,1-1.77-.73,2.52,2.52,0,0,1,0-3.54l19.05-19a2.5,2.5,0,1,1,3.53,3.53l-19,19.05A2.49,2.49,0,0,1,33.06,28.44Z" />
                                    <path d="M56.5,26.74A2.49,2.49,0,0,1,54.73,26,4.77,4.77,0,0,0,48,26a2.5,2.5,0,1,1-3.54-3.53,9.78,9.78,0,0,1,13.82,0,2.5,2.5,0,0,1-1.77,4.26Z" />
                                    <path d="M52.48,37.25a2.18,2.18,0,0,1-.61-.08L41.54,34.59a2.5,2.5,0,0,1,1.22-4.85l10.33,2.58a2.5,2.5,0,0,1-.61,4.93Z" />
                                    <path d="M34.76,15.28A2.5,2.5,0,0,1,33,11a4.77,4.77,0,0,0,0-6.74A2.5,2.5,0,0,1,36.52.73a9.78,9.78,0,0,1,0,13.82A2.45,2.45,0,0,1,34.76,15.28Z" />
                                    <path d="M26.84,19.35a2.52,2.52,0,0,1-2.43-1.89L21.83,7.13a2.5,2.5,0,0,1,4.85-1.22l2.58,10.33a2.49,2.49,0,0,1-1.82,3A2.06,2.06,0,0,1,26.84,19.35Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span>A voir</span>

                </li>
                <li class="flex gap-4 pl-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49.16 59" class="h-6" fill="currentcolor">
                        <title>account</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <g id="account">
                                    <path d="M42.32,59H6.85a6.85,6.85,0,0,1-5.4-2.61A6.62,6.62,0,0,1,.18,50.74a25.08,25.08,0,0,1,48.81,0,6.62,6.62,0,0,1-1.28,5.65A6.83,6.83,0,0,1,42.32,59ZM24.58,36.43A20,20,0,0,0,5,51.88a1.68,1.68,0,0,0,.33,1.41A1.89,1.89,0,0,0,6.85,54H42.32a1.88,1.88,0,0,0,1.47-.71,1.64,1.64,0,0,0,.33-1.41A20,20,0,0,0,24.58,36.43Z" />
                                    <path d="M24.58,26.62A13.31,13.31,0,1,1,37.89,13.31,13.32,13.32,0,0,1,24.58,26.62ZM24.58,5a8.31,8.31,0,1,0,8.31,8.31A8.32,8.32,0,0,0,24.58,5Z" />
                                </g>
                            </g>
                        </g>
                    </svg>
                    <span>Profile</span>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container pl-72 pt-5">
        <section class="">
            <h1 class="uppercase">Mes séries en cours</h1>
            <div class="new-cards pt-5 flex gap-5 flex-wrap">
                <div class="card h-full w-[250px] bg-center bg-cover rounded-lg shadow-lg" style="background-image: url('/images/Swarm.jpg');">

                </div>

                <div class="card flex justify-between" style="background-image: url('/images/wednesday.jpeg');">
                    <span class="bg-yellow-400 text-black w-fit h-fit">il y a 2 jours</span>
                    <span class="bg-green-600 h-fit w-fit">Eps : 6 / 8 </span>
                </div>

                <div class="card" style="background-image: url('/images/YOU 4.webp');">

                </div>

                <div class="card" style="background-image: url('/images/TWD.jpg');">

                </div>

                <div class="card" style="background-image: url('/images/Kimetsu no yaiba 3.jpeg');">

                </div>

                <div class="card border-2 flex items-center border-dashed justify-center text-5xl">
                    &plus;
                </div>


            </div>

        </section>

        <section class="h-auto">
            <h1 class="uppercase pt-5">Mes coups de coeur</h1>

            <div class="new-cards h-auto pt-5 gap-5 flex flex-wrap">
                <div class="card" style="background-image: url('/images/The Office.jpeg');"></div>
                <div class="card" style="background-image: url('/images/Normal People.jpg');"></div>
                <div class="card" style="background-image: url('/images/No Exit 2022.jpg');"></div>
                <div class="card" style="background-image: url('/images/Euphoria 2.jpeg');"></div>
                <div class="card" style="background-image: url('/images/Azur et asmar.jpg');"></div>
                <div class="card" style="background-image: url('/images/Elite 3.jpg');"></div>
                <div class="card" style="background-image: url('/images/LCDP 5.jpg');"></div>
            </div>
        </section>


        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    Se déconnecter
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
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

    .sidebar nav ul li {
        cursor: pointer;
    }


    .card {
        height: 50vh;
        width: 250px;
        background-position: center;
        background-size: cover;
        border-radius: 0.5rem;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        cursor: pointer;
    }
</style>