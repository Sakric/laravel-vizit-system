const container = document.getElementById("tabs");
const profileTab = document.getElementById("profile_tab");
const VisitTab = document.getElementById("visit_tab");
const medicineTab = document.getElementById("medicine_tab");
let tabs = [profileTab, VisitTab, medicineTab]

const profileContent = document.getElementById("profile_content");
const visitContent = document.getElementById("visit_content");
const medicineContent = document.getElementById("medicine_content");



// Listen For Clicks Within Container
container.onclick = function (event) {
    // Prevent default behavior of button
    event.preventDefault()

    // Store Target Element In Variable
    const element = event.target.closest('A');

    // If Target Element Is a Button
    if (element?.nodeName === 'A') {
        tabs.forEach(tab => {
            tab.querySelector('a').classList.remove('border-[#35BCA3]', 'text-[#35BCA3]');
            tab.querySelector('a').classList.add('border-transparent');
            tab.querySelector('svg').classList.remove('text-[#35BCA3]');
        });
        element.classList.remove('border-transparent')
        element.classList.add('border-[#35BCA3]', 'text-[#35BCA3]')
        document.getElementById(`svg-${element.dataset.type}`).classList.add('text-[#35BCA3]')
        if (element.dataset.type === 'profile') {
            profileContent.classList.remove('hidden')
            visitContent.classList.add('hidden')
            medicineContent.classList.add('hidden')
        }
        if (element.dataset.type === 'visit') {
            profileContent.classList.add('hidden')
            visitContent.classList.remove('hidden')
            medicineContent.classList.add('hidden')
        }
        if (element.dataset.type === 'medicine') {
            profileContent.classList.add('hidden')
            visitContent.classList.add('hidden')
            medicineContent.classList.remove('hidden')
        }
    }
}
