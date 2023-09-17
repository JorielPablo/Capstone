<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- CSS and other dependencies -->
  
  <title>Smart Agriculture System</title>
  
  <style>
    /* CSS styles */
  </style>
</head>

<body>
  <div class="chart">
    <!-- Chart elements will be dynamically generated here -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Function to update the chart dynamically
    function updateChart() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
          var data = JSON.parse(this.responseText);
          // Update the chart with the new data
          updateChartWithData(data);
        }
      };
      xmlhttp.open("GET", "get_chart_data.php", true);
      xmlhttp.send();
    }

    // Function to update the chart with new data
    function updateChartWithData(data) {
      // Iterate through the chart elements and update their data and labels
      data.forEach(function(chartData, index) {
        var chartId = "chart" + (index + 1);
        var chartElement = document.getElementById(chartId);

        // Update the chart data
        chartElement.data.labels = chartData.labels;
        chartElement.data.datasets[0].data = chartData.values;

        // Update the chart
        chartElement.update();
      });
    }

    // Call the updateChart function initially and then at regular intervals
    updateChart();
    setInterval(updateChart, 5000); // Update every 5 seconds
  </script>
</body>
</html>
