<?php 



?>

<head>
  <meta charset="UTF-8">
  <title>Cheatsheet Concept</title>
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

<?php 
include 'components/sidebar.php';
?>

<div class="box" style="float: right;width: 1650px">
  <?php include 'components/welcomemsg.php';?>

                <br>

                <?php 
                

                include 'components/dailydecstatus.php';
                
              
              
              ?>


</body>