<?php 
include '../comp/conn.php';
session_start();



if (isset($_POST["submit"])) {
    $userId  = $_SESSION["userId"];

    $casereport = $_POST["answer"];

    $bytes = uniqid(rand());


    if (isset($_POST["casedetail"])){

        $casedetail = $_POST["casedetail"];
    } else {
        $casedetail = "";
    }

    
    

    // USUAL ROUTE
    echo "INSERT INTO declarationdata(userId, casereport, casedetail) VALUES('$userId', '$casereport', '$casedetail' )";

    $sqlinsertdecdata = mysqli_query($conn, "INSERT INTO declarationdata(userId, decid, casereport, casedetail) VALUES('$userId','$bytes', '$casereport', '$casedetail' )");


    // IF YES IS SELECTED

    if ($casereport == "Yes") {
        
        $sqlinsertpositivdata =  mysqli_query($conn, "INSERT INTO positivedata(userId, decid, casedetail) VALUES('$userId', '$bytes', '$casedetail')");
    }
    
    header("Location: ../selfdec.php");



} else {
    header("Location: ../index.php");
}
