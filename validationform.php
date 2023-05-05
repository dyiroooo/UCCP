<?php
include("config.php");

if(isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $result = mysqli_query($conn, "SELECT * FROM uccp_admission WHERE name='$name' OR email='$email'");
    if(mysqli_num_rows($result) > 0) { 
        $row = mysqli_fetch_assoc($result);
        if ($row['name'] == $name && $row['email'] == $email) {
            echo "exists";
        } elseif ($row['name'] == $name) {
            echo "name_exist";
        } elseif ($row['email'] == $email) {
            echo "email_exist";
        }
    } else {
        echo "none_exist";
    }
}




if(isset($_POST['name1']) && isset($_POST['email1'])) {
    $name = $_POST['name1'];
    $email = $_POST['email1'];
    $result = mysqli_query($conn, "SELECT * FROM `uccp_enrollee` WHERE name='$name' OR email='$email'");
    if(mysqli_num_rows($result) > 0) { 
        $row = mysqli_fetch_assoc($result);
        if ($row['name'] == $name && $row['email'] == $email) {
            echo "exists";
        } elseif ($row['name'] == $name) {
            echo "name_exist";
        } elseif ($row['email'] == $email) {
            echo "email_exist";
        }
    } else {
        echo "none_exist";
    }
}




if(isset($_POST['name2']) ) {
    $name = $_POST['name2'];
    
    $result = mysqli_query($conn, "SELECT * FROM `uccp_eval` WHERE name='$name' AND remarks !='PASSED'");
    if(mysqli_num_rows($result) == 0) { 
        echo "none_exist";
    }

 

}
?>
