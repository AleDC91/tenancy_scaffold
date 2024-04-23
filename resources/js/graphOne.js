document.addEventListener("DOMContentLoaded", function() {

    const now = new Date();
    const currentYear = now.getFullYear();
console.log(jan)

    var graphOne = new CanvasJS.Chart("graph-one-container", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Client deadlines per Month"
        },
        axisX:{
            valueFormatString: "MMM",
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },
        axisY: {
            title: "Number of deadlines",
            includeZero: true,
            crosshair: {
                enabled: true
            }
        },
        toolTip:{
            shared:true
        },  
        legend:{
            cursor:"pointer",
            verticalAlign: "bottom",
            horizontalAlign: "left",
            dockInsidePlotArea: true,
            itemclick: toogleDataSeries
        },
        data: [{
            type: "line",
            showInLegend: true,
            name: "Deadlines",
            markerType: "square",
            xValueFormatString: "MMM",
            color: "#F08080",
            dataPoints: [
                { x: new Date(currentYear, 0), y: jan},
                { x: new Date(currentYear, 1), y: feb },
                { x: new Date(currentYear, 2), y: mar },
                { x: new Date(currentYear, 3), y: apr },
                { x: new Date(currentYear, 4), y: may },
                { x: new Date(currentYear, 5), y: jun },
                { x: new Date(currentYear, 6), y: jul },
                { x: new Date(currentYear, 7), y: aug },
                { x: new Date(currentYear, 8), y: sep },
                { x: new Date(currentYear, 9), y: oct },
                { x: new Date(currentYear, 10), y: nov },
                { x: new Date(currentYear, 11), y: dec },
 
            ]
        },
        ]
    });
    graphOne.render();
    
    function toogleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else{
            e.dataSeries.visible = true;
        }
        graphOne.render();
    }
    
    });