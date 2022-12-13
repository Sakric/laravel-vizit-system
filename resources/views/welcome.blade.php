<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
        <script src="https://kit.fontawesome.com/e5248e6090.js" crossorigin="anonymous"></script>


        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"
              integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="
              crossorigin=""/>
        <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
                integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="
                crossorigin=""></script>

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            /*body {*/
            /*    margin: 0;*/
            /*    font-family: 'Nunito', sans-serif;*/
            /*}*/
            header {
                background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.3),  rgba(0, 0, 0, 0.3)), url('../public/img/header.webp');
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
                color: white;
                height: 95vh;
            }

            .hero{
                background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.3),  rgba(0, 0, 0, 0.3)), url('../public/img/header_2.jpg');
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    </head>
    <body>
    <x-navbar/>

    <header class="flex items-center justify-center bg-[url('/img/header.webp')]">
        <div class="w-1/2 h-1/2 bg-[#329D9C]/40 flex items-center justify-center flex-col gap-8 font-sans">
            <h2 class="text-white text-[5vh] text-center">Vizito Sistema </h2>
            <h1 class="text-white text-[4vh] text-center">Tavo Gydimas Prasideda Čia</h1>
            <button class="inline-flex items-center py-2 px-3 text-lg font-medium text-center text-white border-[#35BCA3] bg-[#35BCA3] border-[2px] hover:bg-[#3CAFA6] rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Žiurėti gydytojus
            </button>
        </div>

    </header>

    <div class="flex flex-wrap">
        <div class="sm:w-1/2 lg:w-1/4 w-full h-96 bg-[#40AACA] flex items-center justify-center flex-col gap-4 text-white">
            <span class="text-4xl text-black bg-white w-16 h-16 flex items-center justify-center rounded-full" >
            <i class="fa-solid fa-stethoscope"></i>
            </span>
            <h1 class="text-2xl">Geriausias Gydymas</h1>
            <p class="w-2/3 text-center ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown</p>
        </div>
        <div class="sm:w-1/2 lg:w-1/4 w-full  h-96 bg-[#3BB1B8] flex items-center justify-center flex-col gap-4 text-white">
            <span class="text-4xl text-black bg-white w-16 h-16 flex items-center justify-center rounded-full" >
            <i class="fa-solid fa-phone"></i>
            </span>
            <h1 class="text-2xl">Skubi Pagalba</h1>
            <p class="w-2/3 text-center ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown</p>
        </div>
        <div class="sm:w-1/2 lg:w-1/4 w-full  h-96 bg-[#3CAFA6] flex items-center justify-center flex-col gap-4 text-white">
            <span class="text-4xl text-black bg-white w-16 h-16 flex items-center justify-center rounded-full" >
                <i class="fa-solid fa-user-doctor"></i>
            </span>
            <h1 class="text-2xl">Poliklinikos Personalas</h1>
            <p class="w-2/3 text-center ">Lorem Ipsum is simply dummy text of the printing ad typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown</p>
        </div>
        <div class="sm:w-1/2 lg:w-1/4 w-full  h-96 bg-[#35BCA3] flex items-center justify-center flex-col gap-4 text-white">
            <span class="text-4xl text-black bg-white w-16 h-16 flex items-center justify-center rounded-full" >
            <i class="fa-solid fa-truck-medical"></i>
            </span>
            <h1 class="text-2xl">Kvalifikuoti Specialistai</h1>
            <p class="w-2/3 text-center ">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown</p>
        </div>
    </div>

    <div class="flex bg-white flex-col w-full">
        <div class="flex w-full flex-col p-10 gap-3 content ">
            <h1 class="text-3xl font-semibold text-center text-[#35BCA3]">Naujienos</h1>
        </div>
    </div>

        <div class="flex flex-wrap px-10 gap-10 justify-center">

            @foreach($pages as $page)


                <div class="max-w-[20rem] bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700" bis_skin_checked="1">
                    <a href="/post/{{$page->id}}">
                        <img class="rounded-t-lg" src="/storage/{{$page->thumbnail }}" alt="{{$page->name}}">
                    </a>
                    <div class="p-5" bis_skin_checked="1">
                        <a href="/post/{{$page->id}}">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$page->name}}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 new-body">{!! substr(strip_tags($page->body), 0, 120) !!}{{strlen(strip_tags($page->body)) > 120 ? "..." : "" }}</p>
                        <a href="/post/{{$page->id}}" class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-[#35BCA3] transition rounded-lg bg-[#35BCA3] hover:bg-white border-[1px] border-[#35BCA3] hover:text-[#35BCA3] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Skaityti daugiau
                            <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>

        <script>
            const newsBody = document.getElementsByClassName("new-body");
            Array.from(newsBody).forEach(function(element) {
                console.log(element);
                element.value = "";
            });
        </script>





    <div class="flex bg-white h-96">
        <div class="flex flex-col w-1/2 p-20 gap-3">
            <h1 class="text-3xl font-semibold text-[#35BCA3]">Apie vizito sistema</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
        <div class="w-1/2 flex items-center justify-center  ">
            <img src="img/test.jpg" class="w-2/4" alt="Apie vizita header">
        </div>
    </div>

    <div class="flex items-center justify-center w-full flex-col gap-8 h-96 hero text-white bg-[url('/img/header_2.jpg')]">
        <h1 class="text-4xl">Vizito sistema turi profesionalius specialistus</h1>
        <p class="text-xl">Rinkitis spaicialistus iš ivairiu lauku</p>
        <button class="bg-[#205072] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
            Žiurėti gydytojus
        </button>

    </div>


    <div class="flex bg-white h-96">
        <div class="w-1/2 flex items-center justify-center">
            <div id="map" class="h-[300px] w-[600px]"></div>
        </div>
        <div class="flex flex-col w-1/2 p-20 gap-3">
            <h1 class="text-3xl font-semibold text-[#35BCA3]">Raskite mus</h1>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
        </div>
    </div>


    <script>
        var map = L.map('map').setView([55.685603, 21.158520], 16);
        L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            maxZoom: 25,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
        }).addTo(map);

        var marker = L.marker([55.685603, 21.158520]).addTo(map);
        marker.bindPopup("<b>Meidco Poliklinika</b><br>Adresas.").openPopup();
    </script>


    @if(session()->has('success_login'))
        <div id="login-success" class="shadow-xl transition ease-in-out delay-300 fixed bg-gradient-to-r from-[#40AACA] to-[#35BCA3] text-white py-2 px-4 rounded-xl bottom-3 right-3 text-lg">
            <p>{{session('success_login')}}</p>
        </div>
    @endif
    <script>

        function hideLogin() {
            document.getElementById("login-success").classList.add("opacity-0");
            setTimeout(function (){
                document.getElementById("login-success").classList.add("hidden")
            }, 1000);
        }
        if(document.getElementById("login-success")){
            setTimeout(hideLogin, 5000);
        }
    </script>

    </body>
</html>
