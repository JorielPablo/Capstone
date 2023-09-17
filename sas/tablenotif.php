
<?php 
	include_once 'insert_data.php';
	include 'connect_db.php';
	include "delete.php";
	include "update.php";
	$result = mysqli_query($conn,"SELECT * FROM notif");
	

  ?>


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
<body>
	<br>
	<br>
	<h3 class="text-center text-success" id="message"><?php echo  $success; ?></h3>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Recent <b>Notifications</b></h2>
					</div>
                </div>
			</div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>ID</th>
                        <th>Notification</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
				<?php
                while($row = mysqli_fetch_array($result))
                {
                ?>
					<tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
						
						<td><?php echo $row["notifID"]; ?></td>
						<td><?php echo $row["Notif"]; ?></td>
						<td><?php echo $row["time"]; ?></td>
						<td>
							
							<a class="delete" href="delete.php?id=<?php echo $row['notifID']; ?>"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

						</td>
					</tr>
                <?php 
                    } 
                ?>
				<?php
				
					// close connection database
					mysqli_close($conn);
                ?>
                </tbody>
            </table>
			<div class="clearfix">
    <div class="hint-text">Showing <b>5</b> out of <b>100</b> entries</div>
    <ul class="pagination">
        <li class="page-item disabled"><a href="#">Previous</a></li>

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1; // get current page number
        $total_pages = 10; // replace with actual number of pages
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($i == $page) ? "active" : ""; // add "active" class to current page link
            echo "<li class='page-item $active'><a href='?page=$i' class='page-link'>$i</a></li>";
        }
        ?>

        <li class="page-item"><a href="#" class="page-link">Next</a></li>
    </ul>
</div>
    </div>
	

	<script>
        $(document).ready(function()
        {
            setTimeout(function()
            {
                $('#message').hide();
            },3000);
        });

    </script>

<script src="javascript.js"></script>
<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var id = $(this).data('id');
            $('#delete-id').val(id);
        });
    });
</script>

</body>
</html>                                		                            