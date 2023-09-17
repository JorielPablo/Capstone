<?php 

include "connect_db.php"; 

if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `notif` WHERE `notifID`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        header('Location: notification.php'); 
    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 
if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `recommendation` WHERE `recomID`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        header('Location: recommendation.php'); 
    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

}

?>