<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css"/>
    <script src="https://kit.fontawesome.com/e5248e6090.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/h1bwit55m2lwgfnclkq0nhtsj9o6s12cfaxh5s77ywf2y738/tinymce/6/tinymce.min.js"
            referrerpolicy="origin"></script>


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
        <h1 class="font-bold text-3xl">Redaguoti [{{$doctor->user->name}} {{$doctor->user->lastname}}] paslaugas</h1>


        <div class="flex justify-center align-middle h-screen items-center">
            <div class="w-full m-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden rounded-lg">
                <form method="POST" action="/dashboard/doctors/services/{{$doctor->id}}" enctype="multipart/form-data">
                    @csrf
                    <h1 class="mb-4 font-semibold text-2xl">Pasirinkite daktaro paslaugas</h1>
                    @php
                        $doctor_serivce_array = array();
                        foreach ($doctor->services as $key=>$entry) {
                            $doctor_serivce_array[] = $entry['id'];
                        }
                    @endphp

                    @foreach($services as $service)
                        <div class="flex items-center mb-4">
                            <input id="checkbox-{{$service->id}}" type="checkbox" name="input-{{$service->id}}" value="{{$service->id}}"  {{in_array($service->id, $doctor_serivce_array) ? 'checked' : ''}}
                                   class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-{{$service->id}}"
                                   class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{$service->name}}
                                [ {{$service->price}} € ]</label>
                        </div>
                    @endforeach

                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Išsaugoti pakeitimuas
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

</body>
</html>
