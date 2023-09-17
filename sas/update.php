<?php 

include "connect_db.php";

    if (isset($_POST['update'])) {

        $variety = $_POST['variety'];

        $type = $_POST['type'];
    
        $moisture = $_POST['moisture'];

        $user_id = $_POST['user_id'];

        $sql = "UPDATE `ricevariety` SET `Variety_Name`='$variety',`type`='$type',`requiredmoisture`='$moisture' WHERE `id`='$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {
            header('Location: index.php'); 

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `ricevariety` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $variety = $row['Variety_Name'];

            $type = $row['type'];

            $moisture = $row['requiredmoisture'];

            $id = $row['id'];

        } 

    ?>

    <?php

    }

}


?> 