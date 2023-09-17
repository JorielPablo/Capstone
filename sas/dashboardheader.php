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
    <nav class="sidebar close mobile">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img/Logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Smart</span>
                    <span class="profession">Agriculture System</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
          
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="soilmoisture.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link">
                        <a href="soilmoisture.php">
                            <i class='bx icon'><img src="img/soil-analysis.png" alt="Soil Moisture Icon"></i>
                            <span class="text nav-text">Soil Moisture</span>
                        </a>
                    </li> -->

                    
                    <li class="nav-link">
                        <a href="recommendation.php">
                            <i class='bx bx-food-menu icon'></i>
                            <span class="text nav-text">Recommendation</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="notification.php">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="report.html">
                            <i class='bx bx-pie-chart-alt icon'></i>
                            <span class="text nav-text">Reports</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                <a href="../user/logout.php">

                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>
    
    <script src="javascript/scriptnav.js"></script>
    <script src="javascript/script.js"></script>
    <script src="javascript/scriptweather.js"></script>
</body>
</html>