<!-- PHP code to establish connection with the localserver -->
<?php

 
// Username is root
$user = 'admin';
$password = 'Fit4M0Re!';
 
// Database name is geeksforgeeks
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

if (isset($_POST['display'])) {
    
// SQL query to select data from database
$sql = "SELECT Book.title AS Title, Author.name AS Author_Name, Edition.price AS Price FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid where Book.title='".$_POST['Title']."'";
$result = $mysqli->query($sql);
$mysqli->close();


}

if(isset($_POST['add'])){
                $_SESSION['title']=$_POST['title'];
                $_SESSION['price']=$_POST['price'];
                $_SESSION['quantity']=$_POST['quantity'];
                $sql = "SELECT Book.title AS Popular_In_Young_Adult, Author.name AS Author_Name, COUNT(*) AS NumberOfCopiesSold,Edition.price AS Price FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Sales_Report ON Sales_Report.isbn=Edition.isbn INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid WHERE Info.genre = 'Young Adult' GROUP BY Popular_In_Young_Adult ORDER BY COUNT(*) DESC";
                
                $sql2="INSERT INTO Cart(email,quantity,price,book_title)Values('aallen@example.net','".$_SESSION['quantity']."','".$_SESSION['price']."','".$_SESSION['title']."')";
                if(mysqli_query($link, $sql2)){
                
                } else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
                }                 
                
                $result = $mysqli->query($sql);
                $mysqli->close();
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
    <form action="cart.php" method="post" accept-charset="utf-8" class="custom-add2cart">
   <div class="add-button-wrapper widget-fingerprint-product-add-button">
       <input type="submit" name="display_cart"class="btn regular-button regular-main-button add2cart submit" value="Display cart">
           
   </div>
</form>
    <section>
        <h1>Popular books in Young Adult</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Popular books in Sci-Fi</th>
                <th>Author</th>
                <th>Price</th>
                <th>Add to Cart</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php

                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
                    $_SESSION["Popular_In_Young_Adult"]=$rows['Popular_In_Young_Adult'];
                    $_SESSION["Price"]=$rows['Price'];
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><input type="text" name="title" value="<?php echo $rows["Popular_In_Young_Adult"] ?>" readonly></td>
                <td><?php echo $rows['Author_Name'];?></td>
                <td><input type="text" name="price" value="<?php echo $rows['Price'] ?>" readonly></td>
                <td><input type="number" name="quantity"><input type="submit" name="add" value="Add to Cart"></td>
                
            </tr>
        </form>
            <?php
                
                }
            ?>
        </table>
        </section>

    
</body>
 
</html>