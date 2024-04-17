const months = document.querySelector("#roller-months-container");
const days = document.querySelector("#roller-days-container");
const deadlines = document.querySelector("#roller-deadlines-container");
const nowContainer = document.querySelector("#roller-now-container");
const monthContainer = document.querySelector("#roller-month-container");
const roller = document.querySelector(".deadline-roller");
const rollerContainer = document.querySelector(".deadline-roller-container");
const resetButton = document.querySelector('#reset-today');

const dayWidth = 40;
;

// Calculate the total days of the current year
const currentYear = new Date().getFullYear();
const januaryFirst = new Date(currentYear, 0, 1);
const decemberLast = new Date(currentYear, 11, 31);
const today = new Date();

const yearDays =
    Math.ceil((decemberLast - januaryFirst) / (1000 * 60 * 60 * 24)) + 1;

let counter = 1;
let monthDay = 1;
let monthsList = [];
let currentMonth = -1;

while (counter <= yearDays) {
    const day = document.createElement("div");
    day.classList.add("dayBlock");
    const month = document.createElement("div");
    const deadline = document.createElement("div");

    const date = new Date(currentYear, 0, counter);
    if(today.toDateString() === date.toDateString()) {
        deadline.style.borderBottom = "8px solid green"
       }

    const hasDeadline = deadlinesList.find((deadline) => {
        const deadlineDate = new Date(deadline.date);
        return deadlineDate.toDateString() === date.toDateString();
    });
    let currentDeadlines = deadlinesList.filter(
        (d) => new Date(d.date).toDateString() === date.toDateString()
    );

    let deadlineHTML = "";
    if (hasDeadline) {
        deadline.style.borderTop = "8px solid red";

        deadlineHTML = `<button data-popover-target="popover-${counter}" type="button" class="absolute" style="width:${dayWidth}px; height:64px;"></button>
        <div data-popover id="popover-${counter}" role="tooltip" class="absolute z-50 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">`;

        currentDeadlines.forEach((d) => {
            deadlineHTML += `
            <h4 class="font-bold text-md px-3 py-1">
            <a href="/deadlines/${d.id}">
            ${d.name}
            </a>
            </h4>
            <hr />
            `;

            // `
            //     <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
            //         <h3 class="font-semibold text-gray-900 dark:text-white">${d.name}</h3>
            //     </div>
            //     <div class="px-3 py-2">
            //         <p>${d.description}</p>
            //     </div>`
        });
        deadlineHTML += `<div data-popper-arrow></div>
        </div>`;
        deadline.innerHTML = deadlineHTML;
    }

    if (date.getDate() === 1) {
        monthDay = 1;
        currentMonth = date.getMonth();
        const monthNames = [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ];
        const monthName = monthNames[currentMonth];
        month.innerHTML = `<p class="uppercase ms-2  tracking-widest text-gray-800" >${monthName}</p>`;
        monthsList.push({ month: month, monthIndex: currentMonth });
    }

    day.innerHTML = `${monthDay}`;
    day.style.display = "inline-block";
    day.style.textAlign = "center";
    day.style.paddingTop = "30px";
    day.style.minWidth = `${dayWidth}px`;
    day.style.minHeight = "100%";
    day.style.color = "#444";
    day.style.background = "linear-gradient(to right, #DDD, white)";

    month.style.display = "inline-block";
    month.style.overflow = "visible";
    month.style.width = `${dayWidth}px`;
    month.style.minHeight = "100%";
    month.style.color = "#000";

    month.classList.add("month");

    deadline.style.display = "inline-block";
    deadline.style.overflow = "visible";
    deadline.style.width = `${dayWidth}px`;
    deadline.style.minHeight = "100%";
    deadline.style.color = "#000";

    days.appendChild(day);
    months.appendChild(month);
    deadlines.appendChild(deadline);

    counter++;
    monthDay++;
}

const rollatore = document.querySelector("#roller-days-container");
function calculateScrollDelta(element, container) {
    const elementRect = element.getBoundingClientRect();
    const containerRect = container.getBoundingClientRect();

    const delta = {
        x: elementRect.left - containerRect.left,
        y: elementRect.top - containerRect.top,
    };

    return delta;
}

// Funzione per determinare se l'anno è bisestile
function isLeapYear(year) {
    return (year % 4 === 0 && year % 100 !== 0) || year % 400 === 0;
}
const daysInCurrentYear = getDaysInMonth(currentYear);
const monthsNames = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
];
// Array che tiene traccia del numero di giorni per ogni mese, considerando gli anni bisestili
function getDaysInMonth(year) {
    const daysInMonth = [
        31,
        28 + (isLeapYear(year) ? 1 : 0),
        31,
        30,
        31,
        30,
        31,
        31,
        30,
        31,
        30,
        31,
    ];
    return daysInMonth;
}

roller.addEventListener("scroll", () => {
    let delta = Math.abs(calculateScrollDelta(rollatore, roller).x);
    let totalDays = -2;
    for(let i = 0; i < 12; i++){
        totalDays += daysInCurrentYear[i] ;
        if(delta < totalDays* dayWidth){
            monthContainer.innerText = monthsNames[i].toUpperCase();
            break;
        }
    }
});

Date.prototype.getDayOfYear = function() {
    var start = new Date(this.getFullYear(), 0, 0);
    var diff = this - start;
    var oneDay = 1000 * 60 * 60 * 24;
    var dayOfYear = Math.floor(diff / oneDay);
    return dayOfYear;
};

const centerToday = () => {
    const roller = document.querySelector(".deadline-roller");
    const rect = roller.getBoundingClientRect();

    // Ottiene il numero del giorno dell'anno per oggi
    const today = new Date();
    const todayDayOfYear = today.getDayOfYear();
    roller.scrollLeft = dayWidth * todayDayOfYear  - (rect.width / 2);
    console.log(rect)
    
}

resetButton.addEventListener('click', () => {
    centerToday();
})

window.addEventListener('load',() =>{
    centerToday();
} 
);