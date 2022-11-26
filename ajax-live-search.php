<?php
  require_once "./db.php";
  $user = 'admin';
  $password = 'Fit4M0Re!';
  session_start();
// Database name is geeksforgeeks
  $database = 'BookStore';
// Server is localhost with
// port number 3306
  $servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';
  $mysqli = new mysqli($servername, $user,
                $password, $database);
$link = mysqli_connect($servername, $user, $password, $database);
  
  if(isset($_POST['Title']))
  {
    $_SESSION['Title']=addslashes($_POST['book']);
    // $_SESSION['title']=$_POST['title'];
    $sql = "SELECT Book.bid as bid, Book.title AS Title, Author.name AS Author_Name, Edition.price AS Price, Edition.Format as Format, RATING_VIEWS.Rating AS Rating FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid where Book.title='".$_SESSION['Title']."'";
    if(mysqli_query($link, $sql)){
                
                } else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
                }    
    $result2 = $mysqli->query($sql);
    $mysqli->close();
  }

  if(isset($_POST['add'])){
                $_SESSION['title']=addslashes($_POST['title']);
                $_SESSION['price']=addslashes($_POST['price']);
                $_SESSION['quantity']=addslashes($_POST['quantity']);
                $_SESSION['bid']=addslashes($_POST['bid']);
                $_SESSION['Format']=addslashes($_POST['Format']);
                $_SESSION['Rating']=$_POST['Rating'];

                $sql = "SELECT Book.bid as bid,Book.title AS Title, Author.name AS Author_Name, Edition.price AS Price, Edition.Format as Format, RATING_VIEWS.Rating AS Rating FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid where Book.title='".$_SESSION['title']."'";
                
                $sql2="INSERT INTO Cart(email,quantity,price,book_title,bid,Format,Rating)Values('aallen@example.net','".$_SESSION['quantity']."','".$_SESSION['price']."','".$_SESSION['title']."','".$_SESSION['bid']."','".$_SESSION['Format']."','".$_SESSION['Rating']."')";
                if(mysqli_query($link, $sql2)){
                
                } else{
                echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
                }                 
                
                $result2 = $mysqli->query($sql);
                $mysqli->close();
                }
 
  if (isset($_POST['query'])) {
      $query = "SELECT Book.bid as bid,Book.title AS Title, Author.name AS Author_Name, Edition.price AS Price , RATING_VIEWS.Rating AS Rating FROM Book INNER JOIN Edition ON Edition.bid=Book.bid INNER JOIN Info ON Info.bid=Book.bid INNER JOIN Writes ON Book.bid=Writes.bid INNER JOIN Author ON Writes.aid=Author.aid INNER JOIN RATING_VIEWS ON RATING_VIEWS.bid=Book.bid where Book.Title LIKE '%{$_POST['query']}%'";
      $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
          
        // echo $res['Title']. "<br/>";
        echo "<form action='ajax-live-search.php' method='post' accept-charset='utf-8' class='custom-display-book'>
        
        <input type='text' name='book' value='".$res['Title']."' readonly>
        <input type='submit' name='Title' value='Check this book'>
        </form>";
      }
    } else {
      echo "
      <div class='alert alert-danger mt-3 text-center' role='alert'>
          Book not found
      </div>
      ";
    }
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
    <form action="display_orders.php" method="post" accept-charset="utf-8" class="custom-add2cart">
   <div class="add-button-wrapper widget-fingerprint-product-add-button">
       <input type="submit" name="display_orders"class="btn regular-button regular-main-button add2cart submit" value="Display your orders">
           
   </div>
</form>
    <form action="cart.php" method="post" accept-charset="utf-8" class="custom-add2cart">
   <div class="add-button-wrapper widget-fingerprint-product-add-button">
       <input type="submit" name="display_cart"class="btn regular-button regular-main-button add2cart submit" value="Display cart">
           
   </div>
</form>
    <section>
        <h1>About this book</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Title</th>
                <th>Book ID</th>
                <th>Author</th>
                <th>Format</th>
                <th>Price</th>
                <th>Format type</th>
                <th>Add to Cart</th>
                <th>Ratings</th>
                
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php

                // LOOP TILL END OF DATA
                while($rows=$result2->fetch_assoc())
                {
                    
                    
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><input type="text" name="title" value="<?php echo $rows["Title"] ?>" readonly></td>
                <td><input type="text" name="bid" value="<?php echo $rows["bid"] ?>" readonly></td>
                <td><?php echo $rows['Author_Name'];?></td>
                <td><input type="text" name="Format" value="<?php echo $rows["Format"] ?>" readonly></td>
                <td><input type="text" name="price" value="<?php echo $rows['Price'] ?>" readonly></td>
                <td><input type="text" name="format" value="<?php echo $rows['Format'] ?>" readonly></td>
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

    
</body>
 
</html>