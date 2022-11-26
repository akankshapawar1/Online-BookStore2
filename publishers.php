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
$sql = "SELECT Publisher_book.Publisher, author_writes_book_won_awards.Author,
            author_writes_book_won_awards.Book ,author_writes_book_won_awards.Award
        FROM author_writes_book_won_awards
        INNER JOIN Publisher_book ON Publisher_book.Book = author_writes_book_won_awards.Book
        ORDER BY Publisher";

$result = $mysqli->query($sql);

if(mysqli_query($link, $sql)){
                
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);}                 
                
$result = $mysqli->query($sql);
$mysqli->close();

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
        <h1>Publishing Housese with Award Winning Books</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <!--Publisher_book.Publisher, author_writes_book_won_awards.Author,
            author_writes_book_won_awards.Book ,author_writes_book_won_awards.Award-->
                <th>Publisher</th>
                <th>Author</th>
                <th>Book</th>
                <th>Award</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['Publisher'];?></td>
                <td><?php echo $rows['Author'];?></td>
                <td><?php echo $rows['Book'];?></td>
                <td><?php echo $rows['Award'];?></td>
                
            </tr>
        </form>
            <?php
                }
            ?>
        </table>
    </section>

    
</body>
 
</html>