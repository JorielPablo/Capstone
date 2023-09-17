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
    <link rel="stylesheet" type="text/css" href="css/styleweather.css">
    <title>Smart Agriculture System</title>
</head>

<body>
<?php
      include "dashboardheader.php";
      ?>
    <section class="home">
    <?php
      include "welcomeheader.php";
      ?>
    <div class="col-md-12 wrapper">
      <div class="data-container col-md-12">
          <div class="container">
            <div class="row g-3">
              <div class="col-md-6" id="ave-soil">
                <div class ="card">
                  <div class="card-header  bg-primary">Average Soil Moisture</div>  
                  <canvas id="myChart" width="90%"></canvas>
                </div>
              </div>
           
        

           
              <div class="col-md-6" id="soil">
                <div class ="card">
                  <div class="card-header  bg-primary">Soil Moisture Sensor Data</div> 
                  <canvas id="myChart2"></canvas>
                </div>
              </div>
            </div>
          </div>
          </div>
          
        <div class="recents-div">
          <br>
          <p class="recent">RECENTS</p>
          <div class="content-recent">
            <div class="rec">
              <table>
                <thead>
                  <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Data</th>
                    <th>Level</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="data-table">
                </tbody>
              </table>
            </div>
          </div>
        </div>      
      </section>
    </section>
    <script src="/javascript/scriptweather.js"></script>
</body>

</html>