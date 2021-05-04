<?php
include 'comp/conn.php';
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');


if (isset($_SESSION["login"])) {
  if ($_SESSION["login"] == 1) {


    $fullName = $_SESSION["fullName"];
    $dept = $_SESSION["dept"];
    $staffId = $_SESSION["staffId"];
    $userId = $_SESSION["userId"];
    $role = $_SESSION["role"];
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="UTF-8">
  <title>Self Declaration System</title>
  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <!-- Bulma Version 0.9.0-->
  <link rel='stylesheet' href='https://unpkg.com/bulma@0.9.0/css/bulma.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/overlayscrollbars/1.9.1/css/OverlayScrollbars.min.css'>
  <link rel='stylesheet' href='https://kingsora.github.io/OverlayScrollbars/etc/os-theme-thin-dark.css'>
  <link rel='stylesheet' href="css/cheatsheet.css">
  <link rel="stylesheet" href="css/prism.css">
  <script src="https://kit.fontawesome.com/7dc3015a44.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


  <script>
    $(document).ready(function() {
      $("#describe").hide();
      $(function() {
        $("input[name='answer']").click(function() {
          if ($("#chkYes").is(":checked")) {
            $("#describe").fadeIn();

          } else {
            $("#describe").fadeOut();
            document.getElementById("casedetail").required = false;
          }
        });
      });

    });
  </script>



</head>




<body>
  <section class="hero is-primary">
    <div class="hero-body">
      <div class="columns">
        <div class="column is-12">
          <div class="container content">

            <h1 class="title">Self Declaration</h1>




          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-3">
          <aside class="is-medium menu">
            <div class="box">
              <p><strong><?php echo $fullName; ?></strong></p>
              <p><?php echo $staffId ?></p>
              <p><?php echo $dept ?></p>
              <br>



              <?php

              if ($role == 1) {

              ?>
                <a href="admin/" class="button is-dark" style="text-align: left"><i class="fa fa-sign-in" aria-hidden="true"></i>Admin Dashboard</a>
              <?php } ?>
              <br>
              <br>
              <a href="model/logoutmodel.php" class="button is-danger" style="text-align: left"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a>
            </div>
            <p class="menu-label">
              Menu
            </p>
            <ul class="menu-list">
              <li class="is-right"><a href="" class="is-active">Self Declaration Form</a></li>

              <br><br>

            </ul>

          </aside>
        </div>
        <div class="column is-9">
          <div class="content is-medium">
            <h3 class="title is-3">Self Declaration Form</h3>
            <form action="model/datareportmodel.php" method="post">
              <?php

              $currentdate = date("Y-m-d");




              echo $getnumuserrow;



              $sqllastreporttime = mysqli_query($conn, "SELECT datereport FROM declarationdata WHERE userid='$userId' ORDER BY datereport DESC");



              $getrowlastreport = mysqli_fetch_assoc($sqllastreporttime);

              $lastdatereport = date_format(date_create($getrowlastreport["datereport"]), "Y-m-d");

              // $interval = date_diff($currentdate, $lastdatereport)->format('%a');


              
              $start = strtotime($lastdatereport);
              $end = strtotime($currentdate);

             
            
             $interval = ceil(abs($end - $start) / 86400);

      

            


              if (mysqli_num_rows($sqllastreporttime) == 0) {
                $interval = 1;
                echo "test";
                
              }
              
              




              if ($interval > 0 ) {







              ?>
                <div class="box">
                  <div class="box">
                    <p>1. Declare any occurence of Covid-19 positive cases at your surroundings</p>

                    <p>Definition surrounding: </p>

                    <div class="content">

                      <ol type="i">
                        <li>1 km radius from housing area</li>
                        <li>Spouse's or family member's or housemate's workplace</li>
                        <li>Children's school and institutions</li>
                        <li>Other related contact (baby sitter, maid, etc.)</li>
                      </ol>
                    </div>
                  </div>
                  <div class="field">
                    <label class="label is-size-5">Is there any positive cases reported surrounding you? (refer definition above)</label>
                    <div class="control">
                      <label class="radio">
                        <input type="radio" name="answer" value="Yes" id="chkYes">
                        Yes
                      </label>
                      <label class="radio">
                        <input type="radio" name="answer" value="No" onclick="show1()">
                        No
                      </label>
                      <br><br>

                      <div id="describe">
                        <label class="label is-size-5">
                          <p>If <b>YES</b>, please describe below</p>
                        </label>
                        <textarea class="textarea is-info" name="casedetail" id="casedetail" placeholder="Describe.." required></textarea>

                      </div>
                    </div>
                  </div>






                  <div class="field">
                    <div class="control">
                      <label class="checkbox is-size-5">
                        <input type="checkbox" required>
                        I hereby declare the information that I have submitted is true.</a>
                      </label>
                    </div>
                  </div>



                  <div class="field is-grouped">
                    <div class="control">
                      <button class="button is-link" name="submit" value="submit">Submit</button>
                    </div>

                  </div>

                </div>

              <?php } else {





              ?>

                <div class="box">
                  <article class="message is-danger">

                    <div class="message-body">
                      You have already declared today.
                    </div>
                  </article>

                </div>

              <?php } ?>
            </form>



          </div>
        </div>
      </div>
    </div>
  </section>

</body>

</html>