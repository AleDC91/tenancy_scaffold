<div class="deadline-roller-container mt-10 mb-8 relative w-full">
    <div class="deadline-roller w-full h-48 bg-blue-100 rounded-lg relative overflow-x-auto overflow-y-hidden whitespace-nowrap shadow-lg rounded-t-3xl">
        <div id="roller-days-container" class="h-16 absolute bottom-0">
            
        </div>
        <div id="roller-deadlines-container" class="h-16 absolute bottom-0">

        </div>
        <div id="roller-months-container" class="absolute  mt-20 text-2xl ps-3">
    
       </div>
        <div id="roller-month-container" class="sticky left-0 mt-20 text-2xl ps-3 w-36 bg-blue-100">
            
        </div>
        <div id="roller-now-container" class="h-16 absolute bottom-0">
    
        </div>
    </div>

    <script>
        const deadlinesList = {!! json_encode($deadlines) !!};
    </script>
    @push('app_scripts')
        @vite(['resources/js/roller.js'])     
    @endpush
</div>
