let draw = document.getElementById('draw');
let backdrop = document.getElementById('backdrop')
let draw_visits = document.getElementById('vis-times');
const months = ['Sausis', 'Vasaris', 'Kovas', 'Balandis', 'Gegužė', 'Birželis', 'Liepa', 'Rugpjūtis', 'Rugsėjis', 'Spalis', 'Lapkritis', 'Gruodis'];

document.getElementById('draw-button').addEventListener('click', function (e) {
    draw.classList.toggle('-translate-x-[380px]')
    backdrop.classList.toggle('hidden');
})
backdrop.addEventListener('click', function (e) {
    draw.classList.toggle('-translate-x-[380px]')
    backdrop.classList.toggle('hidden');
})

let none_markup = `
            <li>
                <div class="text-gray-600 dark:text-gray-400">
                    <div class="w-full text-base text-lg font-medium text-gray-900 mx-auto">Neturite jokių rezervacijų šiai dienai</div>
                </div>
            </li>
`

let vis_data = [];

const date = new Date();

const test = async function (days) {
    try {
        Array.from(days.children).forEach(function (element) {
            element.addEventListener('click', async function (e) {
                let markup = '';
                console.log(e.target.id);
                let date_month = e.target.id.slice(5,7);
                let date_day = e.target.id.slice(8,10);
                if(Number(date_month[0]) === 0) {
                    date_month = date_month[1];
                }
                document.getElementById('draw-time').innerHTML = `${months[date_month - 1]} ${date_day} diena`;
                // let date_month =
                draw.classList.toggle('-translate-x-[380px]')
                backdrop.classList.toggle('hidden');
                console.log(vis_data);
                vis_data.forEach((data) => {
                    if (data.date.slice(0, 10) === e.target.id) {
                        markup += `
            <li>
                <a href="/doctor/reservation-${data.id}-doctor-${data.doctor_id}" class="block items-center p-3 sm:flex hover:bg-gray-100 dark:hover:bg-gray-700">
                    <div class="text-gray-600 dark:text-gray-400">
                        <div class="text-base font-medium text-gray-900">Susitikimas su ${data.name} ${data.lastname}</div>
                        <div class="text-base font-medium text-gray-900">Laikas: ${data.date.slice(11, 16)}</div>
                        <div class="text-sm font-normal">"${data.comment ? data.comment : 'Nėra komentaro.'}"</div>
                    </div>
                </a>
            </li>
                    `
                    }
                })
                draw_visits.innerHTML = '';
                if (markup.length > 0) {
                    draw_visits.insertAdjacentHTML('afterbegin', markup)

                } else {
                    draw_visits.insertAdjacentHTML('afterbegin', none_markup)
                }
            })
        });
    } catch (err) {
        throw err;
    }
}


const  renderCalendar = () => {
    date.setDate(1);

    const monthDays = document.querySelector(".days");
    const lastDay = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDate();

    const prevLastDay = new Date(
        date.getFullYear(),
        date.getMonth(),
        0
    ).getDate();

    const firstDayIndex = date.getDay();



    const lastDayIndex = new Date(
        date.getFullYear(),
        date.getMonth() + 1,
        0
    ).getDay();
    const nextDays = 7 - lastDayIndex - 1;

    const custom_days = ['', 'Pirmadienis', 'Antradienis', 'Trečiadienis', 'Ketvirtadienis', 'Penktadienis', 'Šesštadienis', 'Sekmadienis'];

    document.querySelector(".date h1").innerHTML = months[date.getMonth()];

    document.querySelector(".date p").innerHTML = `${custom_days[new Date().getDay()]} ${new Date().getDate()} / ${new Date().getFullYear()}`

    let days = "";

    for (let x = firstDayIndex; x > 0; x--) {

        days += `<div class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md transition hover:bg-[#3BB1B8] cursor-pointer bg-[#40AACA] rounded-lg opacity-60" id="${date.getFullYear()}-${(date.getMonth()).toString().padStart(2, '0')}-${(prevLastDay - x + 1).toString().padStart(2, '0')}">${prevLastDay - x + 1}</div>`;

    }

    for (let i = 1; i <= lastDay; i++) {
        if (
            i === new Date().getDate() &&
            date.getMonth() === new Date().getMonth()
        ) {
            days += `<div class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md transition hover:bg-[#3BB1B8] cursor-pointer bg-[#35BCA3] rounded-lg" id="${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}">${i}</div>`;
        } else {
            days += `<div class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md transition hover:bg-[#3BB1B8] cursor-pointer bg-[#40AACA] rounded-lg" id="${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${i.toString().padStart(2, '0')}"> ${i}</div>`;
        }
    }

    for (let j = 1; j <= nextDays; j++) {
        days += `<div class="text-[1.4rem] m-[0.3rem] w-[calc(40.2rem_/_7)] h-[5rem] flex justify-center items-center shadow-md transition hover:bg-[#3BB1B8] cursor-pointer opacity-60 bg-[#40AACA] rounded-lg" id="${date.getFullYear()}-${(date.getMonth() + 2).toString().padStart(2, '0')}-${(j).toString().padStart(2, '0')}">${j}</div>`;
    }
    monthDays.innerHTML = days;

    test(monthDays);


};

document.querySelector(".prev").addEventListener("click", () => {
    date.setMonth(date.getMonth() - 1);
    renderCalendar();
    callAPI(doctor_id);
});

document.querySelector(".next").addEventListener("click", () => {
    date.setMonth(date.getMonth() + 1);
    renderCalendar();
    callAPI(doctor_id);
});

renderCalendar();




const callAPI = async function (value) {
    try {

        const res = await fetch(`http://127.0.0.1:8000/doctor-search/${value}`);
        const data = await res.json()
        console.log(data);
        vis_data = data;
        data.forEach((data, i) => {
            let element = document.getElementById(data.date.slice(0, 10));
            if (element !== null) {
                element.classList.add('bg-[#FFAC1C]');
            }

        });
    } catch (err) {
        throw err;
    }
}
const callAPIgetUser = async function (value) {
    try {

        const res = await fetch(`http://127.0.0.1:8000/user-search/${value}`);
        const data = await res.json()
        console.log(data);
        return data;
    } catch (err) {
        throw err;
    }
}
callAPI(doctor_id);
// callAPIgetUser(1);

