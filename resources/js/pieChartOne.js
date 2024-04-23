document.addEventListener("DOMContentLoaded", function() {
console.log(clientsDeadlines);
const completed = clientsDeadlines.filter(deadline => deadline.status === "completed");
const pending = clientsDeadlines.filter(deadline => deadline.status === "pending");
const missed = clientsDeadlines.filter(deadline => deadline.status === "missed");

const tot = completed.length + missed.length + pending.length;
const percCompleted = completed.length / tot * 100;
const percPending = pending.length / tot * 100;
const percMissed = missed.length / tot * 100;

console.log(completed.length);
console.log(pending.length);

    var pieChartOne = new CanvasJS.Chart("pie-chart-one-container", {
        theme: "light2",
        animationEnabled: true,
        title: {
            text: "Monthly Deadlines"
        },
        subtitles: [{
            text: "Comlpetion Percentage",
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
                { y: percPending, label: "Pending"},
                { y: percCompleted, label: "Completed" },
                { y: percMissed, label: "Missed"},

                
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