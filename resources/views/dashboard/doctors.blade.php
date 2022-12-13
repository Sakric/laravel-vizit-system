<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css"/>
    <script src="https://kit.fontawesome.com/e5248e6090.js" crossorigin="anonymous"></script>


    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


</head>

<body>
<div class="h-screen flex">
    @include('dashboard.components.sidebar')

    <div id="main" class="w-full overflow-auto bg-gray-100 h-screen p-10">

        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
             class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 h-80">
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
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Sukurti naują daktarą</h3>
                        <form id="form-store" method="POST" class="space-y-6" action="/dashboard/doctors/new">
                            @csrf
                            <div>
                                <label for="email"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Įveskite
                                    vartotojo paštą</label>
                                <div class="flex">
                                     <span
                                         class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                     @
                                    </span>
                                    <input autocomplete="off" type="text" id="search" name="email"
                                           class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="elonmusk">
                                </div>
                                <div id="auto-test" class="flex flex-col gap-2 mt-2">
                                </div>
                            </div>
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



        <div class="flex mt-3 justify-between">
            <h1 class="font-bold text-3xl">Daktarai</h1>
            <button data-type="new"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button" data-modal-toggle="authentication-modal">
                Sukurti naują daktarą
            </button>

        </div>

        <div class="flex flex-wrap mt-5 gap-8">
            @foreach($doctors as $doctor)
                <div
                    class="w-72 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <img class="rounded-t-lg" src="/storage/{{$doctor->thumbnail }}" alt="{{$doctor->user->name}}"/>
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 id="name-{{$doctor->id}}" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$doctor->user->name}} {{$doctor->user->lastname}}</h5>
                        </a>
                        <p class="text-gray-500">{{$doctor->category->name}}</p>
                        <div class="flex justify-between flex-wrap mt-2">
                        <a href="/dashboard/doctors/edit/{{$doctor->id}}" type="button"
                           class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white transition rounded-lg bg-blue-700 hover:bg-white border-[1px] border-blue-700 hover:text-blue-700 text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Redaguoti
                        </a>
                            <a href="/dashboard/doctors/vouchers/{{$doctor->id}}" type="button"
                               class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-yellow-700 transition rounded-lg bg-yellow-600 hover:bg-white border-[1px] border-yellow-600 hover:text-yellow-600 text-white  dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Talonai
                            </a>
                        <a href="#" data-type="delete" type="button" data-modal-toggle="popup-modal" data-id="{{$doctor->id}}"
                           class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-700  transition rounded-lg bg-red-600 hover:bg-white border-[1px] border-red-600 hover:text-red-600 text-white dark:focus:ring-blue-800">
                            Naikinti
                        </a>

                        </div>
                        <a href="/dashboard/doctors/services/{{$doctor->id}}" type="button"
                           class="mt-2 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700  transition rounded-lg bg-teal-600 hover:bg-white border-[1px] border-teal-600 hover:text-teal-600 text-white dark:bg-teal-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Paslaugos
                        </a>
                        <a href="/dashboard/doctors/reservations/{{$doctor->id}}" type="button"
                           class="mt-2 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-purple-700  transition rounded-lg bg-purple-700 hover:bg-white border-[1px] border-purple-700 hover:text-purple-700 text-white dark:bg-teal-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                            Rezervacijos
                        </a>
                    </div>
                </div>

            @endforeach

        </div>
        @php
            $date = date("H:m");
            echo $date == '11:06';
        @endphp
    </div>
</div>


<script type="text/javascript">
    let route = "{{ url('autocomplete-search') }}";
    let search = document.getElementById(`search`);
    let test = document.getElementById(`auto-test`);
    let formStore = document.getElementById(`form-store`);
    const deleteLabel = document.getElementById('delete-label');
    const deleteForm = document.getElementById('delete-form');

    search.addEventListener('keyup', function (e) {
        callAPI(search.value)
    });
    const callAPI = async function (value) {
        try {
            if (value.length > 0) {
                const res = await fetch(`http://127.0.0.1:8000/autocomplete-search/${value}`);
                const data = await res.json()
                test.innerHTML = '';
                console.log(data);
                data.forEach((data, i) => {
                    if(data.role_id !== 1) return;
                    if (i < 3) {
                        let markup = `<a data-type="user-email" class="border border-[#40AACA] w-full bg-white pt-2 pb-2 rounded-lg content-center text-center border-b hover:bg-blue-200 cursor-pointer align-middle"> ${data.email}</a>`;
                        test.insertAdjacentHTML('beforeend', markup);
                    }
                });
            } else {
                test.innerHTML = '';
            }
        } catch (err) {
            throw err;
        }
    }

    const container = document.querySelector("body");

    container.onclick = function (event) {
        // Prevent default behavior of button

        // Store Target Element In Variable
        const element = event.target;

        // If Target Element Is a Button
        if (element.nodeName === 'A') {
            if(element.dataset.type === 'delete'){
                console.log('lol')
                let id = element.dataset.id;
                let name = document.getElementById(`name-${id}`).innerHTML.trim()
                deleteForm.action = `/dashboard/doctors/delete/${id}`;
                deleteLabel.innerHTML = `Ar tikrai norite trinti ${name} [ID: ${id}]`;
            }

            if (element.dataset.type === 'user-email') {
                search.value = element.innerHTML.trim();
                test.innerHTML = '';
                formStore.submit();
            }
        }
    }

</script>
</body>
</html>
