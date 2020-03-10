//-------------
//- PIE CHART -
//-------------
// Get context with jQuery - using jQuery's .get() method.
var pieChartCanvas = $('#pieChart').get(0).getContext('2d')

//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
})

//-----------------
//- END PIE CHART -
//-----------------
