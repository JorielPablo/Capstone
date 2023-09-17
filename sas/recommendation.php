<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="/css/styles.css">
    <!-- <link rel="stylesheet" href="/css/dashboard.css"> -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

    <title>Smart Agriculture System</title>
</head>

<body>
  <?php
    include "dashboardheader.php";
    ?>
      <div class="data-container col-md-12">
      <?php
      include "welcomeheader.php";
      ?>
     <?php
      include "recom.php";
      ?>
          <div class="container">
        
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

    </script>
</body>

</html>