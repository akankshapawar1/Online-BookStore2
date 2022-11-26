<?php
session_start();
// Username is root
$user = 'admin';
$password = 'Fit4M0Re!';
 

$database = 'BookStore';
// Server is localhost with
// port number 3306
$servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';
$mysqli = new mysqli($servername, $user,
                $password, $database);
$link = mysqli_connect($servername, $user, $password, $database);


// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}
if(isset($_POST['payment']))
{
    date_default_timezone_set('America/Los_Angeles');
    $tid=uniqid();
    $item_id=uniqid();
    $date = date('Y-m-d h:i:s');
    $sql="INSERT INTO Purchase_history VALUES('$tid','$date','aallen@example.net')";
    $result3=$mysqli->query($sql);
    $sql = "DELETE FROM Cart where email='aallen@example.net' ";
    $result = $mysqli->query($sql);
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    
    <title>Online Book Store</title>
    
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    
</form>
    <section>
        <h1>Thank you for purchasing with us</h1>
        <p>Your purchase details</p>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Title</th>
                <th>Quantity</th>
                <th>Price</th>
                <th></th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                $total_quantity=0;
                $price=0;

                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
                  $_SESSION['title']=$rows['book_title'];
                  $_SESSION['quantity']=$rows['quantity'];
                  $_SESSION['price']=$rows['price'];
                  $total_quantity+=$_SESSION['quantity'];
                  $price+=($_SESSION['quantity']*$_SESSION['price']);
                    
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows["book_title"] ?></td>
                <td><input type="number" name="quantity"value="<?php echo $rows['quantity'];?>" readonly></td>
                <td><input type="number" name="price" value="<?php echo $rows['price'];?>" readonly></td> 
                <td><input type="submit" name="remove" value="Remove item"></td>               
            </tr>
        </form>
        
            <?php
                
                }

            ?>

        </table>
        <p>Total:<?php 
          echo $price
          // while($sum2=$result2->fetch_assoc()){
          // echo $sum2['sum'];

          
           ?> </p>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="submit" name="payment" value="Proceed for Payment">
        </section>

    
</body>
 
</html>