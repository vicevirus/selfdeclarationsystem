<?php 
include '../../comp/conn.php';

if (isset($_POST["submit"])) {
    $userId = $_POST["userId"];

    if ($_POST["submit"] == "user") {

        $changerole = 0;

        
    }

    if ($_POST["submit"] == "admin") {

        $changerole = 1;

        
    }

    $sqlupdatedata = mysqli_query($conn, "UPDATE users SET role='$changerole' WHERE id='$userId'");

    

    header("Location: ../roles.php");
} else {

    header("Location: ../../index.php");
}

?>