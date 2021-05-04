<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Self Declaration System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-black">Self Declaration System</h3>
                    <hr class="login-hr">


                    <!--- Login Form -->


                    <div class="box" id="loginform">
                    <?php 
                    $displaytext = "Please login to proceed.";

                    if(isset($_GET["msg"])) {
                        $msg = $_GET["msg"];
                        

                        if ($msg == "regsuccess") {
                            $displaytext = "Registration successful. Please login.";
                        }

                        if ($msg == "exist") {
                            $displaytext = "Account already exists in the database. Please login.";
                        }

                        if ($msg == "noacc") {
                            $displaytext = "No account to be logged on. Please register or recheck your credentials.";
                        }


                    }
                    
                    
                    
                    ?>
                        <p class="subtitle has-text-black"><?php echo $displaytext ?></p>



                        <form action="model/loginmodel.php" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="email"  name="email" placeholder="Your Email" autofocus="" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" type="password" name="password" placeholder="Your Password" required>
                                </div>
                            </div>

                            <button class="button is-block is-info is-large is-fullwidth" name="submit" value="submit">Login <i class="fa fa-sign-in" aria-hidden="true"></i></button>
                            <br>
                            <button class="button is-block is-danger is-large is-fullwidth" id="registerbtn">Register <i class="fa fa-user-plus " aria-hidden="true"></i></button>
                        </form>


                    </div>

                    <!---- Register Form --->


                    <div class="box" id="registerform">
                        <p class="subtitle has-text-black">Please register your details.</p>



                        <form action="model/registermodel.php" method="post">
                            <div class="field">
                                <div class="control">
                                    <p style="text-align: left">Full Name</p>
                                    <input class="input is-large" type="text" name="fullName" placeholder="Your full name" autofocus="" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <p style="text-align: left">Email</p>
                                    <input class="input is-large" type="email" name="email" placeholder="Your Email" autofocus="" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <p style="text-align: left">Password</p>
                                    <input class="input is-large" type="password" name="password" id="password" placeholder="Your Password" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <p style="text-align: left">Confirm password</p>
                                    <input class="input is-large" type="password" id="confpassword" placeholder="Confirm your password" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <p style="text-align: left">Staff ID</p>
                                    <input class="input is-large" type="text"  name="staffId" placeholder="Your Staff ID" required>
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <p style="text-align: left">Department</p>
                                    <div class="select is-rounded" style="width: 500px;font-size: 20px">
                                        <select style="width: 500px" name="dept" required>
                                            <option>Select..</option>
                                            <option value="COO">COO</option>
                                            <option value="HRA">HRA</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Sales & Marketing">Sales & Marketing</option>
                                            <option value="QSHE">QSHE</option>
                                            <option value="Procurement">Procurement</option>
                                            <option value="Warranty">Warranty</option>
                                            <option value="MIS">MIS</option>

                                            <option value="Engineering">Engineering</option>
                                            <option value="MRO">MRO</option>
                                            <option value="AV8">AV8</option>
                                            <option value="Electronic">Electronic</option>
                                            <option value="Warehouse">Warehouse</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="button is-block is-danger is-large is-fullwidth" id="registerbtnsubmit" name="submit" value="submit">Submit details<i class="fa fa-user-plus " aria-hidden="true"></i></button>


                            <br>
                           

                        </form>
                        <button class="button is-block is-info is-large is-fullwidth" id="backtologin">Back to login<i class="fa fa-sign-in" aria-hidden="true"></i></button>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>

<style>
    

    p {
        font-weight: bold;
        font-size: 150%;
    }
</style>

<script>
    $(document).ready(function() {
        $("#registerform").hide();

        $("#registerbtn").click(function() {
            $("#loginform").hide();
            $("#registerform").fadeIn();
            $("#backtologin").click(function() {
                $("#loginform").fadeIn();
                $("#registerform").hide();
            })
        });
    });

    $(function() {
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confpassword");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    });
</script>