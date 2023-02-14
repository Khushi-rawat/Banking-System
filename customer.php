
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
   <h1> All customers<br><br>
Select to view the details</h1>
   <table style="text-align:center; font-size: x-large;">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php
    include 'connect.php';
        $query = "SELECT ID,name from `customers`";
        $conn = mysqli_query($db_connect,$query);
        
        while($row = mysqli_fetch_assoc($conn)){
            echo"
            <tr>
            <td><a href='view.php?id={$row['ID']}'>".$row['ID']."</a></td>
            <td><a href='view.php?id={$row['ID']}'>".$row['name']."</a></td>
            </tr>";
        }
    ?>
    </table>
</body>
</html>