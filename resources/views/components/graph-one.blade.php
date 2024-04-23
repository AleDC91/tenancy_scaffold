<div class="bg-white border  shadow-md sm:rounded-lg p-2">
    <div id="graph-one-container" style="height: 370px; "></div>
    {{-- {{dd($annualDeadlines, $monthlyCounts);}} --}}



<script>
    const annualDeadlines = {!! json_encode($annualDeadlines) !!};
    const jan = {!! json_encode($monthlyCounts[1])!!};
    const feb = {!! json_encode($monthlyCounts[2])!!};
    const mar = {!! json_encode($monthlyCounts[3])!!};
    const apr = {!! json_encode($monthlyCounts[4])!!};
    const may = {!! json_encode($monthlyCounts[5])!!};
    const jun = {!! json_encode($monthlyCounts[6])!!};
    const jul = {!! json_encode($monthlyCounts[7])!!};
    const aug = {!! json_encode($monthlyCounts[8])!!};
    const sep = {!! json_encode($monthlyCounts[9])!!};
    const oct = {!! json_encode($monthlyCounts[10])!!};
    const nov = {!! json_encode($monthlyCounts[11])!!};
    const dec = {!! json_encode($monthlyCounts[12])!!};

</script>
    @push('app_scripts')
        @vite(['resources/js/graphOne.js'])
    @endpush
</div>
