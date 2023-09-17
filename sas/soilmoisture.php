

  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!----======== CSS ======== -->
      <link rel="stylesheet" href="css/styles.css">
      <!-- <link rel="stylesheet" href="/css/dashboard.css"> -->
      <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <!----===== Boxicons CSS ===== -->
      <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
       <!-- favicon -->
<link rel="shortcut icon" type="image/x-icon" href="../images/logo - Copy.png">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

      <title>Smart Agriculture System</title>
      <style>
    body{
      padding: 50px;
  }
  .chartBox{
      width: 600px;
      background: #f5f5f5;
  }
  .chart{
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      gap:50px;
  }
  .head {
    width: 100%;
    background: #0096ff;
    padding: 10px;
    color: white;
    font-weight: bold;

  }
  </style>
  </head>

  <body onload="table()">
  <?php
        include "dashboardheader.php";
        ?>
      <section class="home">
      <?php
        include "welcomeheader.php";
        ?>
    
      <br>


      
        <div class="data-container col-md-12">   
                   
              <div class="chart">
  <?php
  try {
      // Connect to the database
      $pdo = new PDO('mysql:host=localhost;dbname=soil_moisture;charset=utf8', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Get the count of distinct sensor IDs
      $stmt = $pdo->query("SELECT COUNT(DISTINCT SensorID) FROM soilmoisturereadings");
      $sensorCount = $stmt->fetchColumn();

      // Loop through the sensor IDs and create a chart for each one
      for ($i = 1; $i <= $sensorCount; $i++) {
          // Get the data for this sensor ID
          $sensorID = "Sensor " . $i;
          $sql = "SELECT * FROM soil_moisture.soilmoisturereadings WHERE SensorID = :sensorID ORDER BY ReadingTime ASC LIMIT 50";
          $stmt = $pdo->prepare($sql);
          $stmt->execute(['sensorID' => $sensorID]);
          $soilMoistureValue = [];
          $labels = [];
          while ($row = $stmt->fetch()) {
              $soilMoistureValue[] = $row["SoilMoistureValue"];
              $labels[] = $row["ReadingTime"];
              switch ($row['MoistureCategory']) {
                case 0:
                    $moisture = "Very Dry";
                    break;
                case 1:
                    $moisture = "Dry";
                    break;
                case 2:
                    $moisture = "Moist";
                    break;
                case 3:
                    $moisture = "Wet";
                    break;
                case 4:
                    $moisture = "Very Wet";
                    break;  
                default:
                break;  
            }
          }

          // Create the chart
          echo "<div class='chartBox'>";
          echo "<div class='head'>";
          echo "<h5>Reading for Sensor $i > Moisure Level =  $moisture</h5>";
          echo "</div>";
          echo "<canvas id='chart$i'></canvas>";
          echo "</h2>";
          echo "<script>";
          echo "var ctx = document.getElementById('chart$i').getContext('2d');";
          echo "var chart$i = new Chart(ctx, {";
          echo "type: 'line',";
          echo "data: {";
          echo "labels: [" . implode(",", array_map(function($rt) { return "'$rt'"; }, $labels)) . "],";
          echo "datasets: [{";
          echo "label: 'Sensor $i',";
          echo "data: [" . implode(",", $soilMoistureValue) . "],";
          echo "backgroundColor: 'rgba(255, 99, 132, 0.2)',";
          echo "borderColor: 'rgba(255, 99, 132, 1)',";
          echo "borderWidth: 1";
          echo "}]";
          echo "},";
          echo "options: {";
          echo "scales: {";
          echo "yAxes: [{";
          echo "ticks: {";
          echo "beginAtZero: true";
          echo "}";
          echo "}]";
          echo "}";
          echo "}";
          echo "});";
          echo "</script>";
          echo "</div>";
      }
  } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
  ?> 
  </script>
  <div id="table">
</div>
      </div>
              </div>
            </div>
            </div>
            
              
        </section>
      </section>
  
      <script src="/javascript/scriptnav.js"></script>
      <script src="/javascript/script.js"></script>
      <script>
          window.addEventListener('resize', function() {
    var windowWidth = window.innerWidth;
    var header1 = document.getElementById('ave-soil');
    var header2 = document.getElementById('soil');

    if (windowWidth <= 1050) {
      header1.classList.remove('col-md-6');
      header2.classList.remove('col-md-6');
      header1.classList.add('col-md-12');
      header2.classList.add('col-md-12');
    } else {
      header1.classList.remove('col-md-12');
      header2.classList.remove('col-md-12');
      header1.classList.add('col-md-6');
      header2.classList.add('col-md-6');
    }
  });
  setTimeout(() => {
  document.location.reload();
}, 10000);
function table(){
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
            document.getElementById("table").innerHTML = this.responseText;
        }
        xhttp.open("Get", "tabe.php");
        xhttp.send();
    
   
}
setInterval(table, 100); // call updateTable every 5 second
      </script>
  </body>

  </html>