<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php
        $from=$_SESSION['id'];
        echo $from;
    ?>
    <h1>Whom to transfer your money?</h1>
    <table>
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $amount=$_POST['amount']; 
        include 'connect.php';
        $query="SELECT * from customers where ID<>'$from'";
        $conn=mysqli_query($db_connect,$query);
        while($row = mysqli_fetch_assoc($conn)){
            echo"
            <tr>
            <td><a href='customer.php'>".$row['ID']."</a></td>
            <td><a href='customer.php'>".$row['name']."</a></td>
            </tr>";
        }
    }
    ?>
    </table>
</body>
</html>