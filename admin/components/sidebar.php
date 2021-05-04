<?php 
session_start();


$role = $_SESSION["role"];



if ($role == 0) {
  header("Location: ../selfdec.php");
}

?>

<div class="navmenu" id="navmenu">
<div class="box" style="width: 230px;float: left">
  <aside class="menu">
  <p class="menu-label">
    General
  </p>
  <ul class="menu-list">
    <li><a href="dailydec.php">Full Declaration Data</a></li>
    <li><a href="positivdec.php">Positive Declaration</a></li>
    <li><a href="dailystatus.php">Daily User Declaration Status</a></li>
    <a href="roles.php" class="button is-success" style="text-align: left"></i>Roles</a>
    <br>
    <a href="../selfdec.php" class="button is-info" style="text-align: left">Back to form</a>
    <br>
    <a href="../model/logoutmodel.php" class="button is-danger" style="text-align: left"><i class="fa fa-sign-in" aria-hidden="true"></i>Logout</a>
  </ul>
  

 
</aside>
</div>
</div>

