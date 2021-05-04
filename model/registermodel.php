<?php

if ((isset($_POST["submit"]))) {
    include '../comp/conn.php';

    $fullName = $_POST["fullName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $staffId = $_POST["staffId"];
    $dept = $_POST["dept"];

    // ENCRYPT OUR PASSWORD
    $encryptpass = password_hash($password, PASSWORD_DEFAULT);


    // SEND ENCRYPTED PASSWORD TO DATABASE

    $sqlregisteruser = $conn->prepare("INSERT INTO users(email, password, staffId, fullName, dept) VALUES (?, ?, ?, ?, ?)");
    $sqlregisteruser->bind_param("sssss", $email, $encryptpass, $staffId, $fullName, $dept);
    if ($sqlregisteruser->execute()) {
        header("Location: ../index.php?msg=regsuccess");
    } else {
        header("Location: ../index.php?msg=exist");
    }

  


    


} else {

    header("Location: ../index.php");
}
