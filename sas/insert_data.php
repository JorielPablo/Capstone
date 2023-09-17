<?php
    include_once 'connect_db.php';
    $success  = "";
    if(isset($_POST['add']))
    {	 
        $variety  = $_POST['varietyname'];
        $type = $_POST['type'];
        $moisture   = $_POST['moisture'];
        
        $sql = "INSERT INTO ricevariety (Variety_Name,type,requiredmoisture)
        VALUES ('$variety','$type','$moisture')";
        if (mysqli_query($conn, $sql))
        {
            $success    =   "New record created successfully !";
        }
        else
        {
        echo "Error: " . $sql . " " . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>