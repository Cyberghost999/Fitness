<?php
session_start();
if($_SESSION['email']=="Vanshbisht@gmail.com"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body style="background-color: #1B1B1B;">
    <div class="container">
    <table class="table table-dark table-hover" style="margin-top: 5cm;">
    <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = "userinfo";
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            if (!$conn) {
                die('Could not Connect MySql Server:' . mysql_error());
            }
            
            
            $result = mysqli_query($conn,"SELECT * FROM `signup`");

?>
<tr>
    <td>ID</td>
    <td>Name</td>
    <td>Date of birth</td>
    <td>Gender</td>
    <td>Email</td>
    <td>Phone No.</td>
    <td>Join date</td>    
</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
    ?>
<tr>
    <td><?php echo $row['SrNo']; ?></td>
    <td><?php echo $row['Name']; ?></td>
    <td><?php echo $row['dob']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['joindate']; ?></td>    
</tr>
<?php
$i++;
}
?>
</table>
    </div>
    
</body>
</html>
<?php
}
else{
    header("Location: index1.php");
}

?>