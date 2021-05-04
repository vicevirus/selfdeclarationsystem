<?php
include '../comp/conn.php';

date_default_timezone_set('Asia/Kuala_Lumpur');







// GET NUMBER OF USERS

$sqlgetuser = mysqli_query($conn, "SELECT id, fullName, dept FROM users");






?>
<div class="box">
    <h1 class="title">Daily User Declaration Status</h1>

    <table id="dailydecstatus" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Declared today</th>
                <th>Last date reported</th>
            </tr>
        </thead>
        <tbody>

            <?php

            if (mysqli_num_rows($sqlgetuser) > 0) {

                while ($row = mysqli_fetch_assoc($sqlgetuser)) {

                    $userId = $row["id"];


                    

                    $sqlgetuserslastreport = mysqli_query($conn, "SELECT datereport FROM declarationdata WHERE userId='$userId' ORDER BY datereport DESC");

                    $userslastreport = date_format(date_create(mysqli_fetch_assoc($sqlgetuserslastreport)["datereport"]),"d-m-Y");

                   $currentdate = date("d-m-Y");

                    

                
             $start = strtotime($userslastreport);
              $end = strtotime($currentdate);


             
             $interval = ceil(abs($end - $start) / 86400);



                    if (mysqli_num_rows($sqlgetuserslastreport) == 0 ) {
                        $interval = 1;
                        echo "test";
                        
                      }

         

                  

                   






            ?>
                    <tr>
                        <td><?php echo $row["fullName"];?></td>
                        <td><?php echo $row["dept"];?></td>
                        <td>
                        
                        <?php

                        if ($interval != "0") {


                        
                        
                        
                        
                        ?>
                        <button type="button" class="btn btn-danger">Not yet declared</button>
                        
                        <?php 
                        } else {

                        
                        
                        ?>
                        
                        <button type="button" class="btn btn-success">Declared</button>
                        
                        <?php 
                        
                        }
                        
                        ?></td>
                        <td><?php echo $formattedreportdate?></td>



                    </tr>


            <?php }
            } ?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>

</div>

<script>
    $(document).ready(function() {
        $('#dailydecstatus').DataTable();
    });
</script>