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
                        paslaugą</h3>
                    <form method="POST" id="form-user" class="space-y-6" action="#">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pavadinimas</label>
                            <input type="text" name="name" id="form-name"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   placeholder="Pavadinimas" required="">
                        </div>

                        <div>
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kaina</label>
                            <input type="number" name="price" id="form-price"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   placeholder="10" required="">
                        </div>

                        <button type="submit" id="form-button"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Sukurti paslaugą
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

    <div id="main" class="w-full overflow-auto bg-gray-100 h-screen p-10">
        <h1 class="font-bold text-3xl">Žinutės</h1>


        <div class="bg-white p-5 mt-5 rounded-lg" id="accordion-flush" data-accordion="collapse"
             data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white"
             data-inactive-classes="text-gray-500 dark:text-gray-400">

            @foreach($messages as $message)
                <h2 id="accordion-flush-heading-{{$message->id}}">
                    <button type="button"
                            class="flex items-center justify-between w-full py-5 font-medium text-left text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400"
                            data-accordion-target="#accordion-flush-body-{{$message->id}}" aria-expanded="false"
                            aria-controls="accordion-flush-body-{{$message->id}}" data-type="open-message" data-id="{{$message->id}}" >
                        <div class="flex w-full justify-between pr-5">
                            <span>{!! !$message->read ? '<span id="new-'. $message->id . '" class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">Naujas</span>' : "" !!} <span id="name-{{$message->id}}">{{$message->subject}} [{{$message->name}} {{$message->lastname}}]</span></span>
                            <span>{{$message->created_at}}</span>
                        </div>
                        <svg data-accordion-icon="" class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </h2>
                <div id="accordion-flush-body-{{$message->id}}" class="hidden" aria-labelledby="accordion-flush-heading-{{$message->id}}">
                    <div class="py-5 font-light border-b border-gray-200 dark:border-gray-700">
                        <ul class="pl-5 text-gray-500 list-disc dark:text-gray-400 mb-5">
                            <li><p class="font-semibold">Siuntejas: {{$message->name}} {{$message->lastname}}</p></li>
                            <li><p class="font-semibold">Paštas: {{$message->email}}</p></li>
                            <li><p class="font-semibold">Telefonas: {{$message->phone}}</p></li>
                        </ul>

                        <p class="mb-2 text-gray-500 dark:text-gray-400 font-semibold">{{$message->comment}}</p>

                        <div class="w-full flex justify-end">
                            <a href="#" data-type="delete" type="button" data-modal-toggle="popup-modal" data-id="{{$message->id}}"
                               class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-700  transition rounded-lg bg-red-600 hover:bg-white border-[1px] border-red-600 hover:text-red-600 text-white dark:focus:ring-blue-800">
                                Naikinti žinute
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach



    </div>
</div>
</div>
</body>
<script>
    const messages = document.getElementById("accordion-flush");
    console.log(messages);




    const container = document.querySelector("body");
    const main = document.getElementById('main');
    const formName = document.getElementById('form-name');
    const formPrice = document.getElementById('form-price');
    const formButton = document.getElementById('form-button');
    const formLabel = document.getElementById('form-label');
    const form = document.getElementById('form-user');
    const deleteLabel = document.getElementById('delete-label');
    const deleteForm = document.getElementById('delete-form');


    // Listen For Clicks Within Container
    container.onclick = function (event) {
        // Prevent default behavior of button

        // Store Target Element In Variable
        const element = event.target;
        console.log(element)
        const elem_but = element.closest("BUTTON");

        // If Target Element Is a Button
        if (element.nodeName === 'A') {

            if (element.dataset.type === 'edit') {
                let id = element.dataset.id;
                let stringName = document.getElementById(`name-${id}`).innerHTML.trim()
                let stringPrice = document.getElementById(`price-${id}`).innerHTML.trim()
                form.action = `/dashboard/services/edit/${id}`
                formName.value = stringName;
                formPrice.value = stringPrice;
                formLabel.innerHTML = `Redaguoti ${stringName}`;
                formButton.innerHTML = 'Redaguoti paslaugą'
            }
            if (element.dataset.type === 'delete') {
                console.log("NAIKINTI");

                let id = element.dataset.id;
                let name = document.getElementById(`name-${id}`).innerHTML.trim()
                deleteForm.action = `/dashboard/messages/delete/${id}`;
                deleteLabel.innerHTML = `Ar tikrai norite trinti "${name}" [ID: ${id}]`;
            }

        }

        if (elem_but.nodeName === 'BUTTON') {
            if (elem_but.dataset.type === 'open-message') {

                let newButton = document.getElementById(`new-${elem_but.dataset.id}`);
                console.log(newButton);
                if(newButton){
                    newButton.remove();
                    test(elem_but.dataset.id);
                }

            }
            if (element.dataset.type === 'new') {
                form.action = '/dashboard/services/new';
                formName.value = '';
                formLabel.innerHTML = `Sukurti naują paslaugą`;
                formButton.innerHTML = 'Sukurti naują paslaugą'
            }
        }

    }

    const test = async function (id) {
        try {
        console.log("siunciu api");
        const url=`/messages/render/read/${id}`;
        const res = await fetch(`/messages/render/read/${id}`);
        const data = await res.json()
        console.log(data);
        } catch (err) {
            throw err;
        }
    }

    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</html>
