<?php
include '../comp/conn.php';




// GET DECLARATION DATA 
$sqlgetdecdata = mysqli_query($conn, "SELECT * FROM declarationdata ORDER BY datereport DESC");


?>
<div class="box">
    <h1 class="title">Full Declaration Data</h1>

    <table id="dailydecdata" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Reported (based on question)</th>
                <th>Date reported</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if (mysqli_num_rows($sqlgetdecdata) > 0) {


                while ($row = mysqli_fetch_assoc($sqlgetdecdata)) {
                    // GET USER ID FROM DECLARATION DATA TO FIND FULL NAME AND DEPARTMENT
                    $decdatauserid = $row["userId"];

                    $decdatareport = $row["casereport"];
                    $decdatadatereport = date_format(date_create($row["datereport"]), "d/m/Y");



                    $sqlgetuserdetail = mysqli_query($conn, "SELECT fullName, dept FROM users WHERE id='$decdatauserid' ");

                    $userdetail = mysqli_fetch_assoc($sqlgetuserdetail);

                    $fullname = $userdetail["fullName"];

                    $dept = $userdetail["dept"];







            ?>
                    <tr>
                        <td><?php echo $fullname; ?></td>

                        <td><?php echo $dept; ?></td>

                        <td><?php

                            if ($decdatareport == "Yes") {


                            ?>
                                <button type="button" class="btn btn-danger">

                                    <?php echo $decdatareport; ?>


                                <?php } else {

                                


                                ?>
                                <button type="button" class="btn btn-success">
                                <?php echo $decdatareport?>

                                <?php }?>



                        </td>

                        <td><?php echo $decdatadatereport; ?></td>
                    </tr>

            <?php
                }
            }
            ?>
        </tbody>
        <tfoot>

        </tfoot>
    </table>

</div>

<script>
    $(document).ready(function() {
        $('#dailydecdata').DataTable();
    });
</script>