<?php
session_start();
if($_SESSION['login_status']==true){
    // header("Location: ../index1.php");
}
else{
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Login</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="password" placeholder="Password" name="pass" required>
                        </div>
                        <div class="p-t-10">
                            <button class="btn btn--pill btn--green" type="submit" name="LogIn">Log In</button>
                        </div>
                        <div class="a" style="color: white; padding-top: 20px;">
                            New to our website? Sign Up <a href="index.php">here</a>
                        </div>
                        <div class="b" style="color: white; padding-top: 20px">
                            You can find our complete information <a href="../index1.php">here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = "userinfo";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not Connect MySql Server:' . mysql_error());
    }

    if (isset($_POST['LogIn'])) {
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $retrieve = "SELECT * FROM `signup` WHERE email = '$email' AND password = '$pass'";
        $ret = mysqli_query($conn, $retrieve);
        echo $rowcount = mysqli_num_rows($ret);

        $retemail = "SELECT * FROM `signup` WHERE email = '$email'";
        $retmail = mysqli_query($conn, $retemail);
        $rowmail = mysqli_num_rows($retmail);
        if ($rowcount > 0) {
            echo "<script> alert('You Are Sucessfully logged in!') </script>";
            
            $_SESSION['email'] = $email;
            $_SESSION['login_status'] = true;
            
            header("Location: ../index1.php");
        } else {

            if ($rowmail > 0) {
                echo "<script> alert('Incorrect password!') </script>";
            } else {
                if ($rowmail == 0) {
                    echo "<script> alert('You need to sign up first!') </script>";
                }
            }
        }
        mysqli_close($conn);
    }
    ?>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body>
<!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<?php
}
?>