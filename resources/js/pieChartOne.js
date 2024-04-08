document.addEventListener("DOMContentLoaded", function() {

    var pieChartOne = new CanvasJS.Chart("pie-chart-one-container", {
        theme: "light2",
        animationEnabled: true,
        title: {
            text: "Client categories"
        },
        subtitles: [{
            text: "United Kingdom, 2016",
            fontSize: 16
        }],
        data: [{
            type: "pie",
            indexLabelFontSize: 18,
            radius: 80,
            indexLabel: "{label} - {y}",
            yValueFormatString: "###0.0\"%\"",
            click: explodePie,
            dataPoints: [
                { y: 42, label: "Gas" },
                { y: 21, label: "Nuclear"},
                { y: 24.5, label: "Renewable" },
                { y: 9, label: "Coal" },
                { y: 3.1, label: "Other Fuels" }
            ]
        }]
    });
    pieChartOne.render();
    
    function explodePie(e) {
        for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
            if(i !== e.dataPointIndex)
                e.dataSeries.dataPoints[i].exploded = false;
        }
    }
     
    });