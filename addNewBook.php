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

$bookId = $_POST['bookId'];
$bookTitle = $_POST['bookTitle'];
$genre = $_POST['genre'];
$noOfPages = $_POST['noOfPages'];
$isbn = $_POST['isbn'];
$Format = $_POST['Format'];
$price = $_POST['price'];
$volume = $_POST['volume'];
$printRun = $_POST['printRun'];
$publicationDate = $_POST['publicationDate'];
$authorId = $_POST['authorId'];
$PublisherID = $_POST['PublisherID'];

$sql1 = "INSERT INTO Book(bid, title, pid)
         VALUES('$bookId', '$bookTitle', '$PublisherID');";
    

$sql2 = "INSERT INTO Writes(aid, bid)
         VALUES('$authorId','$bookId');";
    
$sql3 = "INSERT INTO Edition(isbn, bid, publication_date, pages, print_run, price, Format)
        VALUES('$isbn','$bookId','$publicationDate',$noOfPages,$printRun,$price,'$Format');";

$sql4 = "INSERT INTO Info(bid, genre, volume_number)
         VALUES('$bookId','$genre',$volume);";  
        
    try{
        #$mysqli->query($sql1);
        if ($mysqli->query($sql1) === TRUE){
            $rc = $mysqli->affected_rows;
            }
        $mysqli->query($sql2);
        $mysqli->query($sql3);
        $mysqli->query($sql4);
    }catch (mysqli_sql_exception $e){
        var_dump($e);
        exit; 
    }

if($rc >=1 ){
            echo "Insert successful. ";
            echo "Records Inserted: " . $rc;
            }else{
                echo "Something went Wrong";
            }

$mysqli->close();
?>