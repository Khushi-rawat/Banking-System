<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
    <link href="style.css" rel="stylesheet">
</head>
<body style="margin:4%;"><?php
    $from = $_SESSION['id'];
    ?><form action="view_transfer.php" method="post" name="transaction">
    <h1>Amount to be transfered: </h1>
    <input type="number" name="amount" required style="font-size: x-large; padding:1%; margin:2%; border-radius: 20px;">
    <input type="hidden" name="from" value="<?php echo $from ?>">
    <br><br><br>
    <h1>Whom to transfer your money?</h1>
    <select name="receiver" style="font-size: x-large; padding:1%; margin:2%; cursor:pointer;">
    <!-- <option value="" disabled selected>Receiver ID => Name</option> -->
<?php
include 'connect.php';
        $query="SELECT * from customers where ID<>'$from'";
        $conn=mysqli_query($db_connect,$query);
        while($row = mysqli_fetch_assoc($conn)){
            echo "<option value={$row['ID']}>".$row['ID']." => ".$row['name'] ."</option>";
        }
?>
</select>
    <br><br><button type='submit'>Transfer</button>
</form>
</body>
</html>