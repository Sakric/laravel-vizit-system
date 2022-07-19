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
                        kategorija</h3>
                    <form method="POST" id="form-user" class="space-y-6" action="#">
                        @csrf
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pavadinimas</label>
                            <input type="text" name="name" id="form-name"
                                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                   placeholder="Pavadinimas" required="">
                        </div>

                        <button type="submit" id="form-button"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Sukurti kategoriją
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
        <h1 class="font-bold text-3xl">Kategorijos</h1>
        <div class="flex mt-3 justify-between">
            <div class="flex w-1/3">
                  <span
                      class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    Pavadinimas
                  </span>
                <input type="text" id="myInput" onkeyup="myFunction()"
                       class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="Šeimos gydytojai">
            </div>
            <button data-type="new"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button" data-modal-toggle="authentication-modal">
                Sukurti naują kategorija
            </button>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table id="myTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-4">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Pavadinimas
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Redaguoti</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Naikinti</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">{{$category->id}}</th>
                        <td id="name-{{$category->id}}" class="px-6 py-4">
                            {{$category->name}}
                        </td>
                        <td class="px-6 py-4">
                            <a type="button" data-type="edit" data-modal-toggle="authentication-modal" href="#"
                               data-id="{{$category->id}}"
                               class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Redaguoti</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" data-type="delete" type="button" data-modal-toggle="popup-modal"
                               data-id="{{$category->id}}"
                               class="font-medium text-red-500 dark:text-red-500 hover:underline">Naikinti</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
<script>
    const container = document.querySelector("body");
    const main = document.getElementById('main');
    const formName = document.getElementById('form-name');
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

        // If Target Element Is a Button
        if (element.nodeName === 'BUTTON') {
            if (element.dataset.type === 'new') {
                form.action = '/dashboard/categories/new';
                formName.value = '';
                formLabel.innerHTML = `Sukurti naują kategorija`;
                formButton.innerHTML = 'Sukurti naują kategorija'
            }
        }
        if (element.nodeName === 'A') {
            if (element.dataset.type === 'edit') {
                let id = element.dataset.id;
                let stringName = document.getElementById(`name-${id}`).innerHTML.trim()
                form.action = `/dashboard/categories/edit/${id}`
                formName.value = stringName;
                formLabel.innerHTML = `Redaguoti ${stringName}`;
                formButton.innerHTML = 'Redaguoti kategorija'
            }
            if (element.dataset.type === 'delete') {
                let id = element.dataset.id;
                let name = document.getElementById(`name-${id}`).innerHTML.trim()
                deleteForm.action = `/dashboard/categories/delete/${id}`;
                deleteLabel.innerHTML = `Ar tikrai norite trinti ${name} [ID: ${id}]`;
            }

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
