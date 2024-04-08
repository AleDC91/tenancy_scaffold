<div class="bg-white border  shadow-md sm:rounded-lg p-2">
    <div id="graph-one-container" style="height: 370px; "></div>

    @push('app_scripts')
        @vite(['resources/js/graphOne.js'])
    @endpush
</div>
