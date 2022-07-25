<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

        <script src="https://kit.fontawesome.com/e5248e6090.js" crossorigin="anonymous"></script>


        <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
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
    <x-navbar/>

    <div class="w-full h-72 bg-gradient-to-r from-[#40AACA] to-[#35BCA3] flex items-center justify-center">
    </div>


    <div class="container mx-auto w-[95%] -mt-28 px-10 py-5 bg-white rounded-lg shadow-md">
        <p> <a class="text-[#35BCA3] hover:text-[#40AACA]" href="/doctors">dakatari</a> > {{$doctor->user->name}} {{$doctor->user->lastname}} </p>

        <h1 class="text-2xl mt-4 font-light">{{$doctor->category->name}}</h1>

        <h1 class="text-3xl mt-4 font-bold">{{$doctor->user->name}} {{$doctor->user->lastname}}</h1>

        <div class="flex w-full mt-5">
            <div class="flex flex-col w-2/3 pr-5 leading-loose">
                {!! $doctor->body !!}
            </div>
            <div class="flex w-1/3 flex-col" >
                <img style="width: 380px; height: 550px" class="rounded-lg" src="/storage/{{$doctor->thumbnail}}" alt="{{$doctor->name}}" />
                <h1 class="mt-5 text-2xl font-semibold text-[#35BCA3]">Gydytojo darbo laikas</h1>
                <div class="flex flex-col mt-2">
                    <p>Neporinėmis mėn. diemonis:</p>
                    <p>I-V 15:00 val. - 18:00 val.</p>
                    <p>Porinėmis mėn. diemonis:</p>
                    <p>I-V 8:00 val. - 11:00 val.</p>
                </div>
            </div>
        </div>


        <div id="accordion-arrow-icon" data-accordion="open" class="mt-5">
            <h2 id="accordion-arrow-icon-heading-3">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-arrow-icon-body-3" aria-expanded="false" aria-controls="accordion-arrow-icon-body-3">
                    <p class="text-2xl">Paslaugos</p>
                    <svg class="w-6 h-6 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </h2>
            <div id="accordion-arrow-icon-body-3" class="hidden" aria-labelledby="accordion-arrow-icon-heading-3">
                <div class="p-5 font-light border border-t-0 border-gray-200 dark:border-gray-700">
                    <h1 class="text-3xl text-[#35BCA3] font-semibold">{{$doctor->user->name}} {{$doctor->user->lastname}} paslaugos</h1>
                    <div class="w-[60vh] mt-5">
                        <div class="w-full h-[1px] bg-[#35BCA3]"></div>
                    @foreach($doctor->services as $services)
                        <div class="flex justify-between">
                            <p class="text-xl font-semibold p-2">{{$services->name}}</p>
                            <p class="text-xl font-semibold p-2">{{$services->price}}</p>
                        </div>
                        <div class="w-full h-[1px] bg-[#35BCA3]"></div>
                    @endforeach

                </div>
            </div>
        </div>



        @php
                //date_default_timezone_set('Europe/Warsaw');
                //$tomorrow  = mktime(date("m")  , date("d"), date("Y"));
                //$date = date("F j", $tomorrow);
                // = date("H:m", $tomorrow);

        setlocale(LC_ALL, 'lt_lt.UTF-8');

/* Output: vrijdag 22 december 1978 */
        $date_1 =  strftime("%B %e", mktime(0,1));
        $date_2 =  strftime("%B %e", mktime(0, 0, 0, date("m")  , date("d")+5, date("Y")));
        $iso8859_1_string = "\x5A\x6F\xEB";
        $utf8_string = utf8_encode($iso8859_1_string);
        $date = array();
        $a = -1;
       for ($i = 0; $i <= 7; $i++) {
           if( $i == 1 || $i == 3 || $i == 5 || $i == 7 ) {
               $a += 5;
           } else{
               $a += 1;
           }
           $date[] = strftime("%B %e", mktime(0, 0, 0, date("m")  , date("d")+$a, date("Y")));
        }
       $day = array();
       for ($i = 0; $i <= $a; $i++) {
           $value = strftime("%A %d/%m", mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));
           $value_day = ucfirst(substr($value, 0, 3));
           if($value_day == "še") $value_day = "Šeš";
           $value_date = substr($value, -5  );
           $day[] = $value_day .' '.  $value_date;
       }


        @endphp
        <div class="swiper mySwiper w-[720px] bg-gray-100 rounded-lg pb-3 mt-5">
            <form method="GET" id="myForm" action="/doctors/reservation/set/{{$doctor->id}}" class="swiper-wrapper">
                @csrf
                @for($i = 0; $i < 8 ; $i+= 2)
                <div class="swiper-slide flex flex-col gap-2">
                    <div class="flex justify-between px-5">
                        <i class="fa-solid fa-arrow-left-long fa-xl mt-3.5 {{$i != 0 ? '' : 'cursor-default'}} swiper-button-pre" style="color: {{$i != 0 ? '#35BCA3' : 'transparent'}};"></i>
                        <p class="text-gray-400 text-lg font-semibold">2022 {{$date[$i]}}d. - {{$date[$i+1]}}d.</p>
                        <i class="fa-solid fa-arrow-right-long fa-xl mt-3.5 {{$i != 6 ? '' : 'cursor-default'}} swiper-button-nex" style="color: {{$i != 6 ? '#35BCA3' : 'transparent'}};"></i>
                    </div>


                    <div class="flex justify-between w-full">
                        @for($j = 0; $j < 6; $j++)
                            <ul class="flex flex-col gap-3 w-1/6 px-5 rez-list">
                                <li id="day-{{$i}}-0" class="w-20 h-5 flex 24 justify-center text-gray-600 font-semibold" data-day="{{$i}}">{{array_shift($day)}}</li>
                            </ul>
                        @endfor

                    </div>
                </div>
                @endfor

            </form>


        </div>
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                pagination: {
                    el: ".swiper-pagination",
                    type: "fraction",
                },
                navigation: {
                    nextEl: ".swiper-button-nex",
                    prevEl: ".swiper-button-pre",
                },
            });


            let collection = document.getElementsByClassName("rez-list");
            const callAPI = async function (value) {
                try {
                    const res = await fetch(`http://127.0.0.1:8000/doctors-reservation/${value}`);
                    let data = await res.json()
                    console.log(data);

                    let b = 0;
                    let c = 0;
                    Array.from(collection).forEach(el => {

                        Array.from(el.children).forEach(et => {
                            // dabartine diena
                            let time_1 = et.innerHTML.slice(-2);
                            let time_2 = et.innerHTML.slice(-5, -3);
                            console.log(`${time_1}-${time_2}`)
                            let time = `${time_1}-${time_2}`
                            // isfiltruoja dabartine diena kad butu
                            let test = data.filter(datee => {
                                if(datee.date.slice(5,10) === time && datee.user_id === null) return datee;
                            });
                            if(test.length > 0){
                                let a = 0;
                                test.forEach(datee => {
                                    a++;
                                    c++;
                                    let markup = ` <li id="rez-0-0-0">
                                    <div data-id="${datee.id}" class="transition-all bg-white w-[85px] py-[8px] rounded-lg flex justify-center border-[2px] test cursor-pointer hover:bg-[#35BCA3]">
                                    <input name="rez" id="input-${datee.id}" disabled type="checkbox" value="${datee.id}" class="transition-all w-5 h-5 text-[#78f0da] bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                   <label id="label-${datee.id}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300 cursor-pointer">${datee.date.slice(-8,-3)}</label>
                                   </div>`
                                    el.insertAdjacentHTML('beforeend', markup);
                                });
                                if(a>b) b = a;

                            }
                        })

                    })
                    console.log('B =', b);
                    Array.from(collection).forEach(el => {
                        let c = b - (el.children.length - 1);
                        if(c > 0){
                        for (let i = 0; i < c ; i++) {
                            let markup = `<div class="bg-white w-[85px] h-10 rounded-lg border-2 opacity-60"></div>`;
                            el.insertAdjacentHTML('beforeend', markup)
                        }
                        }
                    });

                    let hover = document.getElementsByClassName("test");
                    const boxes = document.querySelectorAll('.test');


                    boxes.forEach(el => {
                        el.addEventListener('mouseover', function handleClick(event) {
                            if (event.target.nodeName === 'DIV') {
                                let id = event.target.dataset.id;
                                let label = document.getElementById(`label-${id}`);
                                label.classList.add('text-white');
                                label.classList.remove('text-gray-900');
                                let input = document.getElementById(`input-${id}`);
                                input.checked = true;
                                input.addEventListener('click', function handleClicksss(event) {

                                    let form = document.getElementById("myForm");
                                    form.submit()

                                });
                            }
                        });

                        el.addEventListener('click', function handleClicks(event) {
                                let id = event.target.closest("div").dataset.id;
                                let form = document.getElementById("myForm");
                                let input = document.getElementById(`input-${id}`);
                                input.disabled = false;
                                form.action = `${form.action}/${id}`
                                form.submit();
                        });

                        el.addEventListener('mouseleave', function handleClickk(event) {
                            if (event.target.nodeName === 'DIV') {
                                console.log("out", event.target);
                                let id = event.target.dataset.id;
                                let label = document.getElementById(`label-${id}`);
                                let input = document.getElementById(`input-${id}`);
                                input.checked = false;
                                label.classList.remove('text-white');
                                label.classList.add('text-gray-900');
                                // event.target.closest('div').classList.remove('bg-[#35BCA3]');
                            }
                        });
                    });


                } catch (err) {
                    throw err;
                }
            }
            callAPI(1)


        </script>

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
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="https://flowbite.com/" class="hover:underline">Flowbite™</a>. All Rights Reserved.
        </span>
            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd"></path></svg>
                </a>
            </div>
        </div>
    </footer>

    </body>

<script>
</script>
</html>
