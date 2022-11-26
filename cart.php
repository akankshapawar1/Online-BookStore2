<!-- PHP code to establish connection with the localserver -->
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
    $_SESSION['total']=$_POST['total'];
    date_default_timezone_set('America/Los_Angeles');
    $tid=uniqid();
    
    $date = date('Y-m-d h:i:s');
    $date2=date('Y-m-d');
    $cart_info="SELECT * FROM Cart where email='aallen@example.net'";
    $result_cart_info=$mysqli->query($cart_info);

    while($rows_result=$result_cart_info->fetch_assoc()){
    $isbn="SELECT Edition.isbn as isbn from Edition where Edition.bid='".$rows_result['bid']."' and Edition.Format='".$rows_result['Format']."'";
    $result_isbn=$mysqli->query($isbn);
    while($rows_isbn=$result_isbn->fetch_assoc()){
    $itemid=uniqid();
    $insert_isbn="INSERT INTO Sales_Report (sale_date,isbn,discount,itemid,orderid) VALUES('$date2','".$rows_isbn['isbn']."','0','$itemid','$tid')";

    if(mysqli_query($link, $insert_isbn)){
                
                // header("Location: http://localhost/Online-BookStore/index.html");
                // echo '<script>alert("Payment successful!!! Your order will be delivered soon")</script>';
        echo "<script>alert('Payment successful!!! Your order will be delivered soon');
        window.location.href='http://localhost/Online-BookStore/index.html'
        </script>";
                

                } else{
                echo "ERROR: Could not able to execute $insert_isbn. " . mysqli_error($link);
                }  
}
    }


    $sql0="UPDATE Cart SET tid='$tid' WHERE email='aallen@example.net'";
    $sql_total="UPDATE Cart SET total_price='".$_SESSION['total']."' where email='aallen@example.net'";
    $sql="INSERT INTO Purchase_history(email,quantity,price,book_title,tid,total_price) SELECT email,quantity,price,book_title,tid,total_price FROM Cart";
    $sql1="INSERT INTO Transaction (tid,timestamp,email) values ('$tid','$date','aallen@example.net')";
    $sql2="DELETE FROM Cart where email='aallen@example.net'";
    $sql3 = "SELECT * FROM Cart where email='aallen@example.net' ";
        
    $result2=$mysqli->query($sql0);
    if(mysqli_query($link, $sql_total)){
                
                } else{
                echo "ERROR: Could not able to execute $sql_total. " . mysqli_error($link);
                } 
    if(mysqli_query($link, $sql)){
                
                } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
    $res=$mysqli->query($sql1);
    $result4=$mysqli->query($sql2);
    $result = $mysqli->query($sql3);
 
    // $sql3 = "DELETE FROM Cart where email='aallen@example.net' ";
    // $result5 = $mysqli->query($sql3);
    $mysqli->close();
}

if (isset($_POST['display_cart'])) {
// SQL query to select data from database
$sql = "SELECT * FROM Cart where email='aallen@example.net' ";

$result = $mysqli->query($sql);

$mysqli->close();


}

if(isset($_POST['remove']))
{
 
  $sql2="DELETE FROM Cart where book_title='".$_SESSION['title']."' ";
  $result2 = $mysqli->query($sql2);
  if(mysqli_query($link, $sql2)){
                
                } else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
                }  
  $sql = "SELECT * FROM Cart where email='aallen@example.net' ";
  $result = $mysqli->query($sql);

}

?>

<!-- HTML code to display data in tabular format -->
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
        <h1>Your Cart</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Book ID</th>
                <th>Title</th>
                <th>Format</th>
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
                  $_SESSION['Format']=$rows['Format'];
                  $_SESSION['bid']=$rows['bid'];
                  $total_quantity+=$_SESSION['quantity'];
                  $price+=($_SESSION['quantity']*$_SESSION['price']);
                    
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><input type="text" name="bid"value="<?php echo $rows['bid'];?>" readonly></td>
                <td><?php echo $rows["book_title"] ?></td>
                <td><input type="text" name="Format"value="<?php echo $rows['Format'];?>" readonly></td>
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
    
    <input type="number" name="total" value="<?php echo $price;?>" hidden>
    <input type="submit" name="payment" value="Proceed for Payment">
        </section>

    
</body>
 
</html>