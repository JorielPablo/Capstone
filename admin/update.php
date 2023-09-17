<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$variety = $type = $moisture = "";
$variety_err = $type_err = $moisture_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_variety = trim($_POST["variety"]);
    if(empty($input_variety)){
        $variety_err = "Please enter a variety.";
    } elseif(!filter_var($input_variety, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $variety_err = "Please enter a valid variety.";
    } else{
        $variety = $input_variety;
    }
    
    // Validate type type
    $input_type = trim($_POST["type"]);
    if(empty($input_type)){
        $type_err = "Please enter an type.";     
    } else{
        $type = $input_type;
    }
    
    // Validate moisture
    $input_moisture = trim($_POST["moisture"]);
    if(empty($input_moisture)){
        $moisture_err = "Please enter the moisture amount.";     
    } elseif(!ctype_digit($input_moisture)){
        $moisture_err = "Please enter a positive integer value.";
    } else{
        $moisture = $input_moisture;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($type_err) && empty($moisture_err)){
        // Prepare an update statement
        $sql = "UPDATE employees SET name=?, type=?, moisture=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssi", $param_variety, $param_type, $param_moisture, $param_id);
            
            // Set parameters
            $param_variety = $variety;
            $param_type = $type;
            $param_moisture = $moisture;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: varieties.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM ricevariety WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $variety = $row["Variety_Name"];
                    $type = $row["type"];
                    $moisture = $row["requiredmoisture"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php include('include/header.php'); ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Variety Name</label>
                            <input type="text" name="variety" class="form-control <?php echo (!empty($variety_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $variety; ?>">
                            <span class="invalid-feedback"><?php echo $variety_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <textarea name="type" class="form-control <?php echo (!empty($type_err)) ? 'is-invalid' : ''; ?>"><?php echo $type; ?></textarea>
                            <span class="invalid-feedback"><?php echo $type_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Moisture</label>
                            <input type="text" name="moisture" class="form-control <?php echo (!empty($moisture_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $moisture; ?>">
                            <span class="invalid-feedback"><?php echo $moisture_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="varieties.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
    <?php include('include/footer.php'); ?>
</body>
</html>