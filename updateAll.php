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
$conn = new mysqli($servername, $user,
                $password, $database);
$link = mysqli_connect($servername, $user, $password, $database);


// Checking for connections
if ($conn->connect_error) {
    die('Connect Error (' .
    $conn->connect_errno . ') '.
    $conn->connect_error);
}

if (isset($_POST['pubById'])) {       // SQL query to select data from database
    $pid = $_POST['pId'];
    $publisherName =$_POST['publisherName'];
    $publisherYear = $_POST['publisherYear'];
                
    $sql = "UPDATE Publisher 
            SET pid = '$pid', name = '$publisherName', year_established = '$publisherYear'
            WHERE pid = '$pid';";
    
if ($conn->query($sql) === TRUE) {
    #echo "Record updated successfully";
    $rc = $conn->affected_rows;
    if($rc >=1 ){
        echo "Update successful. ";
        echo "Records updated: " . $rc;
    }else{
        echo "Publisher with entered ID doesn't exist. 0 rows updated.";
    }
    
} else {
  echo "Error updating record: " . $conn->error;
}


$conn->close();
}

if (isset($_POST['pubByName'])) {      
    $pid = $_POST['pid'];
    $publisherName =$_POST['publisherName'];
    $publisherYear = $_POST['publisherYear'];

    $sql = "UPDATE Publisher
            SET pid = '$pid', name = '$publisherName', year_established = '$publisherYear'
            WHERE pid IN (SELECT * FROM (SELECT pid FROM Publisher WHERE name = '$publisherName')as id);
            ";

if ($conn->query($sql) === TRUE) {
    #echo "Record updated successfully";
    $rc = $conn->affected_rows;
    if($rc >=1 ){
        echo "Update successful. ";
        echo "Records updated: " . $rc;
    }else{
        echo "Publisher with entered Name doesn't exist. 0 rows updated.";
    }
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if (isset($_POST['bkByTitle'])) {       
    $bTitle = $_POST['bTitle'];
    $bId = $_POST['bId'];
    $pId = $_POST['pId'];
                
    $sql = "UPDATE Book 
            SET title = '$bTitle', pid = '$pId'
            WHERE bid IN (SELECT * FROM (SELECT bid FROM Book WHERE title = '$bTitle')as id);
            ";

if ($conn->query($sql) === TRUE) {
    #echo "Record updated successfully";
    $rc = $conn->affected_rows;
    if($rc >=1 ){
        echo "Update successful. ";
        echo "Records updated: " . $rc;
    }else{
        echo "Book with entered Title doesn't exist. 0 rows updated.";
    }
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if (isset($_POST['bkById'])) {
    $bTitle = $_POST['bTitle'];
    $bid = $_POST['bId'];
    $pId = $_POST['pId'];
                
    $sql = "UPDATE Book SET pid = '$pId', title = '$bTitle' WHERE bid = '$bid';";

if ($conn->query($sql) === TRUE) {
    #echo "Record updated successfully";
    $rc = $conn->affected_rows;
    if($rc >=1 ){
        echo "Update successful. ";
        echo "Records updated: " . $rc;
    }else{
        echo "Book with entered ID doesn't exist. 0 rows updated.";
    }
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if (isset($_POST['authById'])) {    
    $aid = $_POST['aId'];
    $aName = $_POST['aName'];
    $country = $_POST['country'];
                
    $sql = "
            UPDATE Author 
            SET aid = '$aid', name = '$aName', country = '$country'
            WHERE aid = '$aid';
            ";

if ($conn->query($sql) === TRUE) {
    #echo "Record updated successfully";
    $rc = $conn->affected_rows;
    if($rc >=1 ){
        echo "Update successful. ";
        echo "Records updated: " . $rc;
    }else{
        echo "Author with entered ID does not exist. 0 records updated.";
    }
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if (isset($_POST['authByName'])) {       
    $aid = $_POST['aId'];
    $aName = $_POST['aName'];
    $country = $_POST['country'];
                
    $sql = "
            UPDATE Author 
            SET aid = '$aid', name = '$aName', country = '$country'
            WHERE aid IN (SELECT * FROM (SELECT aid FROM Author WHERE name = '$aName')as id);
            ";

if ($conn->query($sql) === TRUE) {
    #echo "Record updated successfully";
    $rc = $conn->affected_rows;
    if($rc >=1 ){
        echo "Update successful. ";
        echo "Records updated: " . $rc;
    }else{
        echo "Author with entered Name does not exist. 0 records updated.";
    }
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

/*if (isset($_POST['awards'])) {       
    $bTitle = $_POST['bTitle'];
    $bTitleNew = $_POST['bTitleNew'];
    $awardName = $_POST['awardName'];
    $awardYear = $_POST['awardYear'];
    $awardNameNew = $_POST['awardNameNew'];
    $awardYearNew = $_POST['awardYearNew'];
                
    $sql = "
            UPDATE Awards 
            SET book_title = '$bTitleNew', award_name = '$awardNameNew',award_year = $awardYearNew
            WHERE award_name = '$awardName' AND award_year = $awardYear;
            ";

try{
    if ($conn->query($sql) === TRUE){
        $rc = $conn->affected_rows;
        }
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

$conn->close();
}*/

if (isset($_POST['info'])) {       
    $bId = $_POST['bId'];
    $genre = $_POST['genre'];
    $volume = $_POST['volume'];
                
    $sql = "
            UPDATE Info 
            SET bid = '$bId', genre = '$genre', volume_number = $volume
            WHERE bid = '$bId';
            ";

if ($conn->query($sql) === TRUE) {
    #echo "Record updated successfully";
    $rc = $conn->affected_rows;
    if($rc >=1 ){
        echo "Update successful. ";
        echo "Records updated: " . $rc;
    }else{
        echo "Could not find Book with entered ID. 0 Records updated.";
    }
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if (isset($_POST['editionIsbn'])) {       
    $isbn = $_POST['isbn'];
    $bid = $_POST['bid'];
    $pubDate = $_POST['pubDate'];
    $pages = $_POST['pages'];
    $printRun = $_POST['printRun'];
    $price = $_POST['price'];
    $format = $_POST['format'];
                
    $sql = "
            UPDATE Edition 
            SET isbn = '$isbn', bid = '$bid', publication_date = '$pubDate', pages = $pages, print_run = $printRun, price = $price, format = '$format'
            WHERE isbn = '$isbn';    
            ";

if ($conn->query($sql) === TRUE) {
    #echo "Record updated successfully";
    $rc = $conn->affected_rows;
    if($rc >=1 ){
        echo "Update successful. ";
        echo "Records updated: " . $rc;
    }else{
        echo "No book with this ISBN exists. 0 records updated.";
    }
    
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

if (isset($_POST['editionBid'])) {  
    $isbn = $_POST['isbn'];
    $bid = $_POST['bid'];
    $pubDate = $_POST['pubDate'];
    $pages = $_POST['pages'];
    $printRun = $_POST['printRun'];
    $price = $_POST['price'];
    $format = $_POST['format'];
                
    $sql = "
                
            ";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}
$conn->close();
}

?>
<!--Add try catch-->