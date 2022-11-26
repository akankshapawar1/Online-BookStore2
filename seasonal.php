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


// SQL query to select data from database
$sql = "SELECT Book.bid as bid, Edition.Format as Format, Book.title AS WinterFavorites, Author.name AS Author_Name,Edition.price AS Price, RATING_VIEWS.Rating AS Rating FROM Sales_Report INNER JOIN Edition ON Edition.isbn= Sales_Report.isbn INNER JOIN Book ON Book.bid=Edition.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid WHERE MONTH(sale_date)=12 OR MONTH(sale_date)=1 OR MONTH(sale_date)=2 GROUP BY Book.title ORDER BY COUNT(*) DESC LIMIT 10";
$result = $mysqli->query($sql);

$sql2= "SELECT Book.bid as bid, Edition.Format as Format,Book.title AS SpringFavorites, Author.name AS Author_Name,Edition.price AS Price, RATING_VIEWS.Rating AS Rating FROM Sales_Report INNER JOIN Edition ON Edition.isbn= Sales_Report.isbn INNER JOIN Book ON Book.bid=Edition.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid WHERE MONTH(sale_date)=3 OR MONTH(sale_date)=4 OR MONTH(sale_date)=5 GROUP BY Book.title ORDER BY COUNT(*) DESC LIMIT 10";
$result2 = $mysqli->query($sql2);

$sql3="SELECT Book.bid as bid, Edition.Format as Format,Book.title AS SummerFavorites, Author.name AS Author_Name, Edition.price AS Price,RATING_VIEWS.Rating AS Rating FROM Sales_Report INNER JOIN Edition ON Edition.isbn= Sales_Report.isbn INNER JOIN Book ON Book.bid=Edition.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid WHERE MONTH(sale_date)=6 OR MONTH(sale_date)=7 OR MONTH(sale_date)=8 GROUP BY Book.title ORDER BY COUNT(*) DESC LIMIT 10";
$result3 = $mysqli->query($sql3);

$sql4="SELECT Book.bid as bid, Edition.Format as Format, Book.title AS AutumnFavorites, COUNT(*) AS NumberOfUnitsSold, Author.name AS Author_Name, Edition.price AS Price, RATING_VIEWS.Rating AS Rating FROM Sales_Report INNER JOIN Edition ON Edition.isbn= Sales_Report.isbn INNER JOIN Book ON Book.bid=Edition.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid WHERE MONTH(sale_date)=9 OR MONTH(sale_date)=10 OR MONTH(sale_date)=11 GROUP BY Book.title ORDER BY COUNT(*) DESC LIMIT 10";

$result4 = $mysqli->query($sql4);

$mysqli->close();


if(isset($_POST['add'])){
                $mysqli = new mysqli($servername, $user,
                $password, $database);
                $_SESSION['title']=$_POST['title'];
                $_SESSION['price']=$_POST['price'];
                $_SESSION['quantity']=$_POST['quantity'];
                $_SESSION['bid']=$_POST['bid'];
                $_SESSION['Format']=$_POST['Format'];
                $_SESSION['Rating']=$_POST['Rating'];

                $sql = "SELECT Book.bid as bid, Edition.Format as Format, Book.title AS WinterFavorites, Author.name AS Author_Name,Edition.price AS Price, RATING_VIEWS.Rating AS Rating FROM Sales_Report INNER JOIN Edition ON Edition.isbn= Sales_Report.isbn INNER JOIN Book ON Book.bid=Edition.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid WHERE MONTH(sale_date)=12 OR MONTH(sale_date)=1 OR MONTH(sale_date)=2 GROUP BY Book.title ORDER BY COUNT(*) DESC LIMIT 10";

                $sql2= "SELECT Book.bid as bid, Edition.Format as Format,Book.title AS SpringFavorites, Author.name AS Author_Name,Edition.price AS Price, RATING_VIEWS.Rating AS Rating FROM Sales_Report INNER JOIN Edition ON Edition.isbn= Sales_Report.isbn INNER JOIN Book ON Book.bid=Edition.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid WHERE MONTH(sale_date)=3 OR MONTH(sale_date)=4 OR MONTH(sale_date)=5 GROUP BY Book.title ORDER BY COUNT(*) DESC LIMIT 10";

                $sql3="SELECT Book.bid as bid, Edition.Format as Format,Book.title AS SummerFavorites, Author.name AS Author_Name, Edition.price AS Price,RATING_VIEWS.Rating AS Rating FROM Sales_Report INNER JOIN Edition ON Edition.isbn= Sales_Report.isbn INNER JOIN Book ON Book.bid=Edition.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid WHERE MONTH(sale_date)=6 OR MONTH(sale_date)=7 OR MONTH(sale_date)=8 GROUP BY Book.title ORDER BY COUNT(*) DESC LIMIT 10";

                $sql4="SELECT Book.bid as bid, Edition.Format as Format, Book.title AS AutumnFavorites, COUNT(*) AS NumberOfUnitsSold, Author.name AS Author_Name, Edition.price AS Price, RATING_VIEWS.Rating AS Rating FROM Sales_Report INNER JOIN Edition ON Edition.isbn= Sales_Report.isbn INNER JOIN Book ON Book.bid=Edition.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid WHERE MONTH(sale_date)=9 OR MONTH(sale_date)=10 OR MONTH(sale_date)=11 GROUP BY Book.title ORDER BY COUNT(*) DESC LIMIT 10";
                
                $sql5="INSERT INTO Cart(email,quantity,price,book_title,bid,Format,Rating)Values('aallen@example.net','".$_SESSION['quantity']."','".$_SESSION['price']."','".$_SESSION['title']."','".$_SESSION['bid']."','".$_SESSION['Format']."','".$_SESSION['Rating']."')";
                if(mysqli_query($link, $sql5)){
                
                } else{
                echo "ERROR: Could not able to execute $sql5. " . mysqli_error($link);
                }                 
                
                $result = $mysqli->query($sql);
                
                $result2 = $mysqli->query($sql2);
               
                $result3 = $mysqli->query($sql3);
                
                $result4 = $mysqli->query($sql4);

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
        <h1>Winter favorites</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Popular books in Winter</th>
                <th>Book ID</th>
                <th>Author</th>
                <th>Format</th>
                <th>Price</th>
                <th>Add to Cart</th>
                <th>Ratings</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php

                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
                    $_SESSION["WinterFavorites"]=$rows['WinterFavorites'];
                    $_SESSION["Price"]=$rows['Price'];
                    $_SESSION["Rating"]=$rows['Rating']
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><input type="text" name="title" value="<?php echo $rows["WinterFavorites"] ?>" readonly></td>
                <td><input type="text" name="bid" value="<?php echo $rows['bid'];?>" readonly></td>
                <td><?php echo $rows['Author_Name'];?></td>
                <td><input type="text" name="Format" value="<?php echo $rows['Format'];?>" readonly></td>
                <td><input type="text" name="price" value="<?php echo $rows['Price'] ?>" readonly></td>
                <td><input type="number" name="quantity"><input type="submit" name="add" value="Add to Cart"></td>
                <td><input type="text" name="Rating" value="<?php echo round($rows['Rating'],2);?>" readonly>
                </form>

                <form action="rating.php" method="POST">
                    <input type="text" name="bid" value="<?php echo $rows['bid'];?>" hidden>

                <input type="submit" name="add1" value="Submit a Review"></td>
                </form>
                
            </tr>
        </form>
            <?php
                
                }
            ?>
        </table>
        </section>


    <section>
        <h1>Spring favorites</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Popular books in Spring</th>
                <th>Book ID</th>
                <th>Author</th>
                <th>Format</th>
                <th>Price</th>
                <th>Add to Cart</th>
                <th>Ratings</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php

                // LOOP TILL END OF DATA
                while($rows2=$result2->fetch_assoc())
                {
                    $_SESSION["SpringFavorites"]=$rows2['SpringFavorites'];
                    $_SESSION["Price"]=$rows2['Price'];
                    $_SESSION["Rating"]=$rows2['Rating'];
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><input type="text" name="title" value="<?php echo $rows2["SpringFavorites"] ?>" readonly></td>
                <td><input type="text" name="bid" value="<?php echo $rows2['bid'];?>" readonly></td>
                <td><?php echo $rows2['Author_Name'];?></td>
                <td><input type="text" name="Format" value="<?php echo $rows2['Format'];?>" readonly></td>
                <td><input type="text" name="price" value="<?php echo $rows2['Price'] ?>" readonly></td>
                <td><input type="number" name="quantity"><input type="submit" name="add" value="Add to Cart"></td>
                <td><input type="text" name="Rating" value="<?php echo round($rows2['Rating'],2);?>" readonly>
                </form>

                <form action="rating.php" method="POST">
                    <input type="text" name="bid" value="<?php echo $rows2['bid'];?>" hidden>

                <input type="submit" name="add1" value="Submit a Review"></td>
                </form>
                
            </tr>
        </form>
            <?php
                
                }
            ?>
        </table>
        </section> 

    <section>
        <h1>Summer favorites</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Popular books in Summer</th>
                <th>Book ID</th>
                <th>Author</th>
                <th>Format</th>
                <th>Price</th>
                <th>Add to Cart</th>
                <th>Ratings</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php

                // LOOP TILL END OF DATA
                while($rows3=$result3->fetch_assoc())
                {
                    $_SESSION["SummerFavorites"]=$rows3['SummerFavorites'];
                    $_SESSION["Price"]=$rows3['Price'];
                    $_SESSION["Rating"]=$rows3['Rating'];
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><input type="text" name="title" value="<?php echo $rows3["SummerFavorites"] ?>" readonly></td>
                <td><input type="text" name="bid" value="<?php echo $rows3['bid'];?>" readonly></td>
                <td><?php echo $rows3['Author_Name'];?></td>
                 <td><input type="text" name="Format" value="<?php echo $rows3['Format'];?>" readonly></td>
                <td><input type="text" name="price" value="<?php echo $rows3['Price'] ?>" readonly></td>
                <td><input type="number" name="quantity"><input type="submit" name="add" value="Add to Cart"></td>
                <td><input type="text" name="Rating" value="<?php echo round($rows3['Rating'],2);?>" readonly>
                </form>

                <form action="rating.php" method="POST">
                    <input type="text" name="bid" value="<?php echo $rows3['bid'];?>" hidden>

                <input type="submit" name="add1" value="Submit a Review"></td>
                </form>
                
            </tr>
        </form>
            <?php
                
                }
            ?>
        </table>
        </section>

    <section>
        <h1>Autumn favorites</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Popular books in Autumn</th>
                <th>Book ID</th>
                <th>Author</th>
                <th>Format</th>
                <th>Price</th>
                <th>Add to Cart</th>
                <th>Ratings</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php

                // LOOP TILL END OF DATA
                while($rows4=$result4->fetch_assoc())
                {
                    $_SESSION["AutumnFavorites"]=$rows4['AutumnFavorites'];
                    $_SESSION["Price"]=$rows4['Price'];
                    $_SESSION["Rating"]=$rows4['Rating'];
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><input type="text" name="title" value="<?php echo $rows4["AutumnFavorites"] ?>" readonly></td>
                <td><input type="text" name="bid" value="<?php echo $rows4['bid'];?>" readonly></td>
                <td><?php echo $rows4['Author_Name'];?></td>
                <td><input type="text" name="Format" value="<?php echo $rows4['Format'];?>" readonly></td>
                <td><input type="text" name="price" value="<?php echo $rows4['Price'] ?>" readonly></td>
                <td><input type="number" name="quantity"><input type="submit" name="add" value="Add to Cart"></td>
                <td><input type="text" name="Rating" value="<?php echo round($rows4['Rating'],2);?>" readonly>
                </form>

                <form action="rating.php" method="POST">
                    <input type="text" name="bid" value="<?php echo $rows4['bid'];?>" hidden>

                <input type="submit" name="add1" value="Submit a Review"></td>
                </form>
                
            </tr>
        </form>
            <?php
                
                }
            ?>
        </table>
        </section>

    
</body>
 
</html>