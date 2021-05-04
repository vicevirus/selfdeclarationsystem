<?php 
session_start();
include '../comp/conn.php';

if (isset($_POST["submit"])) {

    // CHECK IF EMAIL AND PASSWORD EXIST
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }
    if (isset($_POST["password"])) {
        $password = $_POST["password"];
    }

    // GET DATA FROM DATABASE

    $sqlgetuserdata = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($sqlgetuserdata) > 0) {

    $getuserrow = mysqli_fetch_assoc($sqlgetuserdata);

    $emaildb = $getuserrow["email"];
    $passworddb = $getuserrow["password"];
    $fullNamedb = $getuserrow["fullName"];
    $deptdb = $getuserrow["dept"];
    $staffIddb = $getuserrow["staffId"];
    $roledb = $getuserrow["role"];
    $userId = $getuserrow["id"];

    //CHECK IF PASSWORD IS CORRECT AND HAVE BEEN DEHASHED CORRECTLY

    $verifypassword = password_verify($password, $passworddb);

    // SET LOGIN SESSION

    if ($email == $emaildb and $verifypassword) {
        $_SESSION["login"] = 1;
        $_SESSION["userId"] = $userId;
        
        $_SESSION["fullName"] = $fullNamedb;
        $_SESSION["dept"] = $deptdb;
        $_SESSION["staffId"] = $staffIddb;
        $_SESSION["role"] = $roledb;

        header("Location: ../selfdec.php");

        
    }


    
    } else {
        header("Location: ../index.php?msg=noacc");
    }

    
    

    
    


    



} else {

    header("Location: ../index.php");
}
