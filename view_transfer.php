<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Record</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
include 'connect.php';
        $amount=$_POST['amount']; 
        $to=$_POST['receiver'];
        $from = $_POST['from'];
        $query="SELECT `name` from customers WHERE ID=$to";
        $conn=mysqli_query($db_connect,$query);
        $row=mysqli_fetch_assoc($conn);
        $receiver=$row['name'];
        $query="SELECT `name` from customers WHERE ID=$from";
        $conn=mysqli_query($db_connect,$query);
        $row=mysqli_fetch_assoc($conn);
        $sender=$row['name'];
                $query="UPDATE customers SET balance=balance+$amount where ID=$to";
        $conn=mysqli_query($db_connect,$query);
                $query="UPDATE customers SET balance=balance-$amount where ID=$from";
        $conn=mysqli_query($db_connect,$query);
        $query = "INSERT INTO `transfer` (`from`, `to`, `amount`) VALUES ('$sender','$receiver','$amount') ";
        $conn = mysqli_query($db_connect,$query);
        echo"<script>alert('Transaction Successful!')</script>";
        ?>
         <h1> Transactions: </h1>
           <table style='text-align:center; font-size: x-large;'>
    <tr>
        <th>From</th>
        <th>To</th>
        <th>Amount</th>
        <th>Date</th>
        <th>Time</th>
    </tr>
    <?php
        $query = "SELECT * from `transfer`";
        $conn = mysqli_query($db_connect,$query);
        
        while($row = mysqli_fetch_assoc($conn)){
            echo"
            <tr>
            <td>".$row['from']."</td>
            <td>".$row['to']."</td>
            <td>".$row['amount']."</td>
            <td>".$row['date']."</td>
            <td>".$row['time']."</td></tr>";
        }   
} 
    ?>
    </table>
    <a href="./customer.php"><button>View All Customers</button></a>
</body>
</html>