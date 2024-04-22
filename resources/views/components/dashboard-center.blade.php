<div class="dashboard-center-container grid grid-cols-1 xl:grid-cols-8 xl:grid-rows-2 gap-8 my-6 mb-0">
    <div class="col-span-1 xl:col-span-5 gap-3 xl:my-5 h-72">
        <h2 class="mt-4 mb-3 text-2xl">Deadlines
            <span class="float-end">
                <button id="reset-today" type="button"
                    class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br   font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                    <svg class="w-5 h-5" fill="white" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M256.5 8c66.3 .1 126.4 26.2 170.9 68.7l35.7-35.7C478.1 25.9 504 36.6 504 57.9V192c0 13.3-10.7 24-24 24H345.9c-21.4 0-32.1-25.9-17-41l41.8-41.8c-30.9-28.9-70.8-44.9-113.2-45.3-92.4-.8-170.3 74-169.5 169.4C88.8 348 162.2 424 256 424c41.1 0 80-14.7 110.6-41.6 4.7-4.2 11.9-3.9 16.4 .6l39.7 39.7c4.9 4.9 4.6 12.8-.5 17.4C378.2 479.8 319.9 504 256 504 119 504 8 393 8 256 8 119.2 119.6 7.8 256.5 8z" />
                    </svg>
                </button>
            </span>
        </h2>
        <x-deadline-roller />
    </div>
    <div class="col-span-1 xl:row-span-2 xl:col-span-3 gap-3 -mt-20 xl:my-5 h-80 xl:h-full  dashboard-inbox-container">
        <h2 class="mt-4 mb-3 text-2xl">
            Inbox
        </h2>
        <div class="h-full overflow-auto">
            <x-messages-table />
        </div>
    </div>

    <div class="col-span-1 xl:col-span-5 gap-3 my-5 h-80">

        <h2 class="mt-4 mb-3 text-2xl">
            Next Deadlines
        </h2>
        <div class="h-full w-full overflow-auto">
            <x-deadlines />
        </div>
    </div>

</div>
<div class="grid grid-cols-1 xl:grid-cols-4 gap-5 xl:mt-5">
    <div class="col-span-1 xl:col-span-2">
        <x-pie-chart-one />
    </div>
    <div class="col-span-1 xl:col-span-2">
        <x-graph-one />
    </div>
</div>
