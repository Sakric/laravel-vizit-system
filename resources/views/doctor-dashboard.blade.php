<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>

    <script src="https://kit.fontawesome.com/e5248e6090.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>

    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


</head>
<body>
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="authentication-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 id="form-label" class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sukurti naują
                    vaistą</h3>
                <form method="POST" id="doctor-medicine" class="space-y-6" action="/doctor/new/medicine">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pavadinimas</label>
                        <input type="text" name="name" id="form-name"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                               placeholder="Pavadinimas" required="">
                    </div>

                    <div>
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Aprašymas</label>
                        <textarea type="text" name="description" id="form-description"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                  placeholder="Aprašymas..." required=""></textarea>
                    </div>

                    <button type="submit" id="form-button"
                            class="transition text-white border-[#35BCA3] bg-[#35BCA3] border-[2px] hover:bg-white hover:text-[#35BCA3] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Sukurti vaistą
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="popup-modal" tabindex="-1"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-toggle="popup-modal">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="p-6 text-center">
                <svg class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 id="delete-label" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Ar tikrai
                    norite trinti Lukas Martinkus [ID: 1]</h3>
                <form method="POST" id="delete-form" action="#">
                    @csrf
                    @method('DELETE')
                    <button data-modal-toggle="popup-modal" type="submit"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Naikinti
                    </button>
                    <button data-modal-toggle="popup-modal" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Atšaukti
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>



<div id="draw" class="fixed h-full w-[380px] bg-white z-40 transition p-4 overflow-y-auto -translate-x-[380px]">
    <h5 class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
        <svg class="w-5 h-5 mr-2" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                  clip-rule="evenodd"></path>
        </svg>
        Info
    </h5>
    <button type="button" id="draw-button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                  clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="p-5 mb-4 bg-gray-50 rounded-lg border border-gray-100 dark:bg-gray-800 dark:border-gray-700">
        <time id="draw-time" class="text-lg font-semibold text-gray-900 dark:text-white">January 13th, 2022</time>
        <ol id="vis-times" class="mt-3 divide-y divider-gray-200">
            {{--            <li>--}}
            {{--                <a href="#" class="block items-center p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">--}}
            {{--                    <div class="text-gray-600 dark:text-gray-400">--}}
            {{--                        <div class="text-base font-medium text-gray-900"> Susitikimas su Lukas Martinkus 10:20</div>--}}
            {{--                        <div class="text-sm font-normal">"Man reikia pagalbos"</div>--}}
            {{--                    </div>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li>--}}
            {{--                <a href="#" class="block items-center p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">--}}
            {{--                    <div class="text-gray-600 dark:text-gray-400">--}}
            {{--                        <div class="text-base font-medium text-gray-900"> Susitikimas su Marta Saulėgraža 10:20</div>--}}
            {{--                        <div class="text-sm font-normal">"Sakauda nugara, negaliu užmigt nakti"</div>--}}
            {{--                    </div>--}}
            {{--                </a>--}}
            {{--            </li>--}}
            {{--            <li>--}}
            {{--                <a href="#" class="block items-center p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">--}}
            {{--                    <div class="text-gray-600 dark:text-gray-400">--}}
            {{--                        <div class="text-base font-medium text-gray-900"> Susitikimas su Marta Saulėgraža 10:20</div>--}}
            {{--                        <div class="text-sm font-normal">"Sakauda nugara, negaliu užmigt nakti"</div>--}}
            {{--                    </div>--}}
            {{--                </a>--}}
            {{--            </li>--}}

            <li>
                <div class="text-gray-600 dark:text-gray-400">
                    <div class="w-full text-base text-lg font-medium text-gray-900 mx-auto">Neturite jokių rezervacijų
                        šiai dienai
                    </div>
                </div>
            </li>
        </ol>
    </div>
</div>

<div id="backdrop" class="hidden bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-30"></div>
<x-navbar/>





<div class="w-full h-72 bg-gradient-to-r from-[#40AACA] to-[#35BCA3] flex items-center justify-center">
    <h1 class="text-white text-5xl -mt-28">Daktaro skydelis</h1>
</div>


<div class="container mx-auto w-[70%] -mt-28 px-10 py-5 bg-white rounded-lg shadow-md">
    <div class="flex flex-col">

        <div class="border-b border-gray-200 dark:border-gray-700">
            <ul id="tabs"
                class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400">
                <li id="profile_tab" class="mr-2">
                    <a href="#" data-type='profile'
                       class="inline-flex p-4 text-[#35BCA3] rounded-t-lg border-b-2 border-[#35BCA3] hover:border-[#35BCA3] active dark:text-blue-500 dark:border-blue-500 group">
                        <svg id="svg-profile" aria-hidden="true"
                             class="mr-2 w-5 h-5 text-[#35BCA3]  group-hover:text-[#35BCA3] dark:text-gray-500 dark:group-hover:text-gray-300"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>>
                        </svg>
                        Rezervacijos
                    </a>
                </li>
                <li id="visit_tab" class="mr-2">
                    <a href="#" data-type='visit'
                       class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-[#35BCA3] hover:border-[#35BCA3] dark:hover:text-[#35BCA3] group">
                        <svg id="svg-visit" aria-hidden="true"
                             class="mr-2 w-5 h-5 text-gray-400 group-hover:text-[#35BCA3] dark:text-gray-500 dark:group-hover:text-gray-300"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
                        </svg>
                        Vaistai
                    </a>
                </li>
                <li id="medicine_tab" class="mr-2 hidden" >
                    <a data-type='medicine' href="#"
                       class="inline-flex p-4 rounded-t-lg border-b-2 border-transparent hover:text-[#35BCA3] hover:border-[#35BCA3] dark:hover:text-gray-300 group">
                        <svg id="svg-medicine" aria-hidden="true"
                             class="mr-2 w-5 h-5 text-gray-400 group-hover:text-[#35BCA3] dark:text-gray-500 dark:group-hover:text-gray-300"
                             fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z"></path>
                        </svg>
                        Vaistai
                    </a>
                </li>
            </ul>
        </div>

        <div id="profile_content" class="mt-5 w-full">
            <div class="w-full flex justify-center">

                <h1 class="mt-1 text-3xl font-semibold text-[#35BCA3] mx-auto mb-5">Vizitų kalendorius</h1>
            </div>

            <div class="w-full text-[#eee] flex justify-center content-center">
                <div class="w-[45rem] bg-gray-100 shadow-md">
                    <div
                        class="w-full h-[12rem] bg-gradient-to-r from-[#40AACA] to-[#35BCA3] flex justify-between content-center py-[2rem] text-center shadow-md rounded-lg">
                        <i class="fas fa-angle-left prev text-[2.5rem] cursor-pointer my-auto ml-3"></i>
                        <div class="date">
                            <h1 class="text-[3rem] font-semibold mb-[0.5rem]"></h1>
                            <p class="text-[1.5rem]"></p>
                        </div>
                        <i class="fas fa-angle-right next text-[2.5rem] cursor-pointer my-auto mr-3"></i>
                    </div>
                    <div class="w-full flex content-center bg-gray-200 pl-1">
                        <div
                            class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md bg-gradient-to-r from-[#40AACA] to-[#35BCA3] rounded-lg">
                            Sek
                        </div>
                        <div
                            class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md bg-gradient-to-r from-[#40AACA] to-[#35BCA3] rounded-lg">
                            Pir
                        </div>
                        <div
                            class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md bg-gradient-to-r from-[#40AACA] to-[#35BCA3] rounded-lg">
                            Ant
                        </div>
                        <div
                            class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md bg-gradient-to-r from-[#40AACA] to-[#35BCA3] rounded-lg">
                            Tre
                        </div>
                        <div
                            class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md bg-gradient-to-r from-[#40AACA] to-[#35BCA3] rounded-lg">
                            Ket
                        </div>
                        <div
                            class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md bg-gradient-to-r from-[#40AACA] to-[#35BCA3] rounded-lg">
                            Pen
                        </div>
                        <div
                            class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md bg-gradient-to-r from-[#40AACA] to-[#35BCA3] rounded-lg">
                            Šes
                        </div>
                    </div>
                    <div class="w-full flex flex-wrap p-[0.2rem] days rounded-b-l bg-gray-200"></div>
                </div>
            </div>
            <!-- drawer component -->


        </div>


        <div id="visit_content" class="mt-5 w-full hidden">
            <div class="w-full flex justify-center flex-col">
                <h1 class="mt-1 text-3xl font-semibold text-[#35BCA3] mx-auto">Rekomendaciniai nereceptiniai vastai</h1>

                <div class="mt-5">
                    <button type="button" data-type="new"
                       data-modal-toggle="authentication-modal" class="hover:cursor-pointer transition text-white border-[#35BCA3] bg-[#35BCA3] border-[2px] hover:bg-white hover:text-[#35BCA3] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Sukurti naują rekomendacinį nereceptinį vaistą
                    </button>
                </div>

                <div class="overflow-x-auto relative shadow-md sm:rounded-lg mt-5">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                ID
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Pavadinimas
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Aprašymas
                            </th>
                            <th scope="col" class="py-3 px-6">
                            </th>
                            <th scope="col" class="py-3 px-6">
                            </th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($medicines as $medicine)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$medicine->id}}
                                </th>
                                <td class="py-4 px-6" id="name-{{$medicine->id}}">
                                    {{$medicine->name}}
                                </td>
                                <td class="py-4 px-6">
                                    {{substr($medicine->description, 0, 10)}}{{strlen($medicine->description) > 10 ? '...' : ''}}
                                </td>
                                <td class="py-4 px-6 hidden" id="description-{{$medicine->id}}">
                                    {{$medicine->description}}
                                </td>
                                <td class="py-4 px-6">
                                    <a type="button" data-type="edit" data-modal-toggle="authentication-modal" href="#"
                                       data-id="{{$medicine->id}}"
                                       class="mt-2 inline-flex items-center py-1.5 px-3 text-sm font-medium text-center text-white bg-blue-700  transition rounded-lg bg-teal-600 hover:bg-white border-[1px] border-teal-600 hover:text-teal-600 text-white dark:bg-teal-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Redaguoti
                                    </a>
                                </td>
                                <td class="py-4 px-6">
                                    <a href="#" data-type="delete" type="button" data-modal-toggle="popup-modal"
                                       data-id="{{$medicine->id}}"
                                       class="mt-2 inline-flex items-center py-1.5 px-3 text-sm font-medium text-center text-white bg-red-600  transition rounded-lg bg-red-600 hover:bg-white border-[1px] border-red-600 hover:text-red-600 text-white dark:bg-red-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Naikinti
                                    </a>
                                </td>
                        @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div id="medicine_content" class="mt-5 w-full hidden">
            <div class="w-full flex justify-center">
                <h1 class="mt-1 text-3xl font-semibold text-[#35BCA3] mx-auto">Mano Vaistai</h1>
            </div>
        </div>
    </div>
</div>

<div id="alert-additional-content-3"
     class="container p-4 mb-4 border border-green-300 rounded-lg bg-green-50 dark:bg-green-200 sm:w-[600px] md:w-[900px] w-[400px] mt-5 mx-auto"
     role="alert">
    <div class="flex items-center">
        <svg aria-hidden="true" class="w-5 h-5 mr-2 text-green-700 dark:text-green-800" fill="currentColor"
             viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                  clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Info</span>
        <h3 class="text-lg font-medium text-green-700 dark:text-green-800">Rezervuotis pas gydytoją</h3>
    </div>
    <div class="mt-2 mb-4 text-sm text-green-700 dark:text-green-800">
        Norėdami užsirezervuoti vizitą pas gydytoją turiti nueiti i gydytojų puslapį ir jame isirinkti jums tinkamą
        specialistą.
    </div>
    <div class="flex">
        <button type="button"
                class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 mr-2 text-center inline-flex items-center dark:bg-green-800 dark:hover:bg-green-900">
            <svg aria-hidden="true" class="-ml-0.5 mr-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                <path fill-rule="evenodd"
                      d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                      clip-rule="evenodd"></path>
            </svg>
            Peržiūrėti gydytojus
        </button>
    </div>
</div>


<footer class="p-4 bg-gray-100 mt-10 sm:p-6 dark:bg-gray-800">
    <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="/img/logo.png" class="mr-3 h-8" alt="FlowBite Logo">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Medico</span>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                        <a href="https://flowbite.com/" class="hover:underline">Flowbite</a>
                    </li>
                    <li>
                        <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Follow us</h2>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                        <a href="https://github.com/themesberg/flowbite" class="hover:underline ">Github</a>
                    </li>
                    <li>
                        <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                    </li>
                </ul>
            </div>
            <div>
                <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                <ul class="text-gray-600 dark:text-gray-400">
                    <li class="mb-4">
                        <a href="#" class="hover:underline">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/"
                                                                                        class="hover:underline">Flowbite™</a>. All Rights Reserved.
        </span>
        <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                          clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                          clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path
                        d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                </svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z"
                          clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                          clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</footer>

@if(session()->has('message'))
    <div id="message" class="shadow-xl transition ease-in-out delay-300 fixed bg-gradient-to-r from-[#40AACA] to-[#35BCA3] text-white py-2 px-4 rounded-xl bottom-3 right-3 text-lg">
        <p>{{session('message')}}</p>
    </div>
@endif
<script>

    function hideLogin() {
        document.getElementById("message").classList.add("opacity-0");
        setTimeout(function (){
            document.getElementById("message").classList.add("hidden")
        }, 1000);
    }
    if(document.getElementById("message")){
        setTimeout(hideLogin, 5000);
    }
</script>


</body>
<script src="{{ asset('js/userProfile.js')}}"></script>
<script>
    let doctor_id = {{auth()->user()->id}}
</script>
<script src="{{ asset('js/calendar.js')}}"></script>

<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
<script>
    const containerForm = document.querySelector("body");
    const main = document.getElementById('main');
    const formName = document.getElementById('form-name');
    const formDescription = document.getElementById('form-description');
    const formButton = document.getElementById('form-button');
    const formLabel = document.getElementById('form-label');
    const form = document.getElementById('doctor-medicine');
    const deleteLabel = document.getElementById('delete-label');
    const deleteForm = document.getElementById('delete-form');


    // Listen For Clicks Within Container
    containerForm.onclick = function (event) {
        // Prevent default behavior of button

        // Store Target Element In Variable
        const element = event.target;

        // If Target Element Is a Button
        if (element.nodeName === 'BUTTON') {
            if (element.dataset.type === 'new') {
                form.action = '/doctor/new/medicine';
                formName.value = '';
                formLabel.innerHTML = `Sukurti naują vaistą`;
                formButton.innerHTML = 'Sukurti naują vaistą'
            }
        }
        if (element.nodeName === 'A') {
            if (element.dataset.type === 'edit') {
                console.log("PAVYKO")
                let id = element.dataset.id;
                let stringName = document.getElementById(`name-${id}`).innerHTML.trim()
                let stringPrice = document.getElementById(`description-${id}`).innerHTML.trim()
                form.action = `/doctor/update/medicine/${id}`
                formName.value = stringName;
                formDescription.value = stringPrice;
                formLabel.innerHTML = `Redaguoti ${stringName}`;
                formButton.innerHTML = 'Redaguoti vaistą'
            }
            if (element.dataset.type === 'delete') {
                let id = element.dataset.id;
                let name = document.getElementById(`name-${id}`).innerHTML.trim()
                deleteForm.action = `/doctor/delete/medicine/${id}`;
                deleteLabel.innerHTML = `Ar tikrai norite trinti ${name} [ID: ${id}]`;
            }

        }
    }
</script>


</html>
