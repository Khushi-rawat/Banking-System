<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="style.css" rel="stylesheet">
    <style>
        tr{
            border: 1px solid black;
           
        }
        td,th{
             padding: 3%;
            border:none;
            background: rgb(109, 179, 242);
        }
    </style>
</head>
<body>
    <h1>Your Details</h1>
<?php
    include 'connect.php';
    $id = $_GET['id'];
    $query="SELECT * from customers where ID='$id'";
    $_SESSION['id']=$id;
    $conn = mysqli_query($db_connect,$query);
    while($row = mysqli_fetch_assoc($conn)){
    echo "<table><tr> <th> Customer ID </th> <td>".
    $row['ID']."</td><tr><th>Customer Name </th><td>" .$row['name'].
    "</td></tr> <tr><th> Your Email </th> <td> ". $row['email'].
    "</td></tr><tr><th> Your Balance </th> <td> ". $row['balance'].
    "</td></tr></table>

<a href='transaction.php'><button>Tranfer Money</button></a>";}
?>
</body>
</html>