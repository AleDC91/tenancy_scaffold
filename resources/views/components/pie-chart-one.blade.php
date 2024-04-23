<div class="bg-white border shadow-md sm:rounded-lg p-2">

    <div id="pie-chart-one-container" style="height: 370px;"></div>
    <script>
        const clientsDeadlines = {!! json_encode($clientsDeadlines) !!};
    </script>
    @push('app_scripts')
        @vite(['resources/js/pieChartOne.js'])
    @endpush

</div>
