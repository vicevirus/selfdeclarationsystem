<?php 
include '../comp/conn.php';

if (isset($_GET["decid"])){
    $decid = $_GET["decid"];

    $sqlgetdecdetail = mysqli_query($conn, "SELECT * FROM declarationdata WHERE decid='$decid'");

    $getdetailrow = mysqli_fetch_assoc($sqlgetdecdetail);

    $userId = $getdetailrow["userId"];

    $sqlgetuserdetails = mysqli_query($conn, "SELECT * FROM users WHERE id='$userId'");

    $rowuserdetail = mysqli_fetch_assoc($sqlgetuserdetails);

    $fullname = $rowuserdetail["fullName"];

    $dept = $rowuserdetail["dept"];



    $decdetail = $getdetailrow["casedetail"];

    $decreport = date_format(date_create($getdetailrow["datereport"]), "d/m/Y");



}


?>

<head>
  <meta charset="UTF-8">
  <title>Self Declaration System</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <!-- Bulma Version 0.9.0-->
  <link rel='stylesheet' href='https://unpkg.com/bulma@0.9.0/css/bulma.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.9.1/css/OverlayScrollbars.min.css'>
  <link rel='stylesheet' href='https://kingsora.github.io/OverlayScrollbars/etc/os-theme-thin-dark.css'>
  <link rel='stylesheet' href="../css/cheatsheet.css">
  <link rel="stylesheet" href="../css/prism.css">
  <script src="https://kit.fontawesome.com/7dc3015a44.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css'>
  <link rel='stylesheet' href='https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css'>
  

</head>

<body>

<section class="hero is-primary">
    <div class="hero-body">
      <div class="columns">
        <div class="column is-12">
          <div class="container content">

          

            <h1 class="title">Admin Dashboard</h1>

            




          </div>
        </div>
      </div>
    </div>
  </section>
  <br>

<div class="box" style="width: 230px;float: left">
  <aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a>Full Declaration Data</a></li>
    <li><a>Positive Declaration</a></li>
    <li><a>Daily User Declaration Status</a></li>
  </ul>
  

 
</aside>
</div>

<div class="box" style="float: right;width: 1650px">
  <h1 class="title">Declaration Details</h1>

  <div class="card-content">
                
                <div class="card" style=>
                    <div class="card-content">
                        <table border="1" style="border-collapse: collapse; width: 100%;" class="table is-bordered">
                            <tbody style="font-size: 23">
                                <tr style="height: 18px;">
                                    <td style="width: 15.5481%; height: 18px;"><b>Full Name</b></td>
                                    <td style="width: 58.0641%; height: 18px;"><?php echo $fullname; ?></td>
                                </tr>
                               
                                <tr style="height: 18px;">
                                    <td style="width: 15.5481%; height: 18px;"><b>Department</b></td>
                                    <td style="width: 58.0641%; height: 18px;"> <?php echo $dept;?>
                                    
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 15.5481%;"><b>Declaration Details<br /></b></td>
                                    <td style="width: 58.0641%;"><?php echo $decdetail; ?></td>
                                </tr>

                                <tr>
                                    <td style="width: 15.5481%;"><b>Date Reported<br /></b></td>
                                    <td style="width: 58.0641%;"><?php echo $decreport; ?></td>
                                </tr>
                               
                               
                            </tbody>
                        </table>
                    </div>
                </div>
               
</div>
<center><a href="index.php"><button class="button is-block is-info is-medium" name="submit" value="submit"><i class="fa fa-sign-in" aria-hidden="true"></i>Back to dashboard</button></center></a>
</body>