<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="styles.css">

</head>
<h3 class="text-center text-success" id="message"></h3>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Recent <b>Soil Moisture READINGS</b></h2>
					</div>
                </div>
			</div>

<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soil_moisture";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define pagination parameters
$rows_per_page = 5;
$page_number = isset($_GET['page']) ? $_GET['page'] : 1;

// Retrieve total number of rows
$count_query = "SELECT COUNT(*) AS count FROM soilmoisturereadings";
$count_result = $conn->query($count_query);
$count_row = $count_result->fetch_assoc();
$total_rows = $count_row['count'];

// Calculate total number of pages
$total_pages = ceil($total_rows / $rows_per_page);

// Retrieve data for current page
$offset = ($page_number - 1) * $rows_per_page;
$select_query = "SELECT * FROM soilmoisturereadings ORDER BY ReadingTime DESC LIMIT $offset, $rows_per_page";
$select_result = $conn->query($select_query);
?>
<table  class='table table-striped table-hover'>
    <thead>
<tr><th style ="width: auto;">Reading ID</th><th style ="width: auto;">Sensor ID</th><th style ="width: auto;">Reading Time</th><th style ="width: auto;">Soil Moisture Value</th><th style ="width: auto;">Moisture Category</th></tr>
</thead>
<?php
while ($row = $select_result->fetch_assoc()) {
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
    echo "<tr><td>" . $row['ReadingID'] . "</td><td>" . $row['SensorID'] . "</td><td>" . $row['ReadingTime'] . "</td><td>" . $row['SoilMoistureValue'] . " ". $row['Units'] . "</td><td>" . $moisture . "</td></tr>";
}
?>

</table>
<!-- <div class="clearfix">
    <div class="hint-text">Showing <b><?php echo $select_result->num_rows ?></b> out of <b><?php echo $total_rows ?></b> entries</div>
    <ul class="pagination">
        <?php if ($page_number > 1) { ?>
            <li class="page-item"><a href="?page=<?php echo $page_number - 1 ?>" class="page-link">Previous</a></li>
        <?php } else { ?>
            <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
        <?php } ?>
        <?php
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $page_number) ? "active" : ""; // add "active" class to current page link
            echo "<li class='page-item $active'><a href='?page=$i' class='page-link'>$i</a></li>";
        }
        ?>
        <?php if ($page_number < $total_pages) { ?>
            <li class="page-item"><a href="?page=<?php echo $page_number + 1 ?>" class="page-link">Next</a></li>
        <?php } else { ?>
            <li class="page-item disabled"><a href="#" class="page-link">Next</a></li>
        <?php } ?>
    </ul> -->
</div>


    <?php
$conn->close();
?>
<script>

    </script>