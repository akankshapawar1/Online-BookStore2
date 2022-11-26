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

$aid = $_POST['aid'];
$authorName = $_POST['authorName'];
$country = $_POST['country'];


$sql = "INSERT INTO Author(aid, name, country)
        VALUES ('$aid', '$authorName', '$country');";

try{
    $mysqli->query($sql);
}catch (mysqli_sql_exception $e){
        var_dump($e);
        exit; 
}
    $rc = $mysqli->affected_rows;
    if($rc >= 1){
        echo "Author added successfully!";
    }else{
        echo "Something went wrong";
    }

$mysqli->close();
?>