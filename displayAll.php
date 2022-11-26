<!-- PHP code to establish connection with the localserver -->
<?php

$user = 'admin';
$password = 'Fit4M0Re!';
$database = 'BookStore';
$servername='dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';

$mysqli = new mysqli($servername, $user, $password, $database);

$link = mysqli_connect($servername, $user, $password, $database);

// Checking for connections
if ($mysqli->connect_error) {
    echo "error";
    die('Connect Error (' .
    $mysqli->connect_errno . ') '.
    $mysqli->connect_error);
}

if (isset($_POST['Book'])) {
    $sql = "SELECT bid AS bookID, title AS bookTitle, pid AS publisherID FROM Book;";
    $result = $mysqli->query($sql);
    echo "Connected";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "id: " . $row["bookID"]. " - Name: " . $row["bookTitle"]. " " . $row["publisherID"]. "<br>";
        }
        }else{
        echo "0 results";
        }
        echo "here";
}

if (isset($_POST['Author'])){
    $sql = "SELECT aid AS AuthorID, name AS Name, country AS Country FROM Author;";
    $result = $mysqli->query($sql);
    echo "Connected";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        echo "id: " . $row["AuthorID"]. " Name: " . $row["Name"]. " Country: " . $row["Country"]. "<br>";
        }
        }else{
        echo "0 results";
        }
        echo "here";
}

if (isset($_POST['Publisher'])) {       // SQL query to select data from database
                /*$sql = "SELECT bid AS bookID, title AS bookTitle, pid AS publisherID FROM Book;";
                $result = $mysqli->query($sql);
                    echo "Connected";
    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "id: " . $row["bookID"]. " - Name: " . $row["bookTitle"]. " " . $row["publisherID"]. "<br>";
            }
        }else{
        echo "0 results";
        }
        */
        echo "here";
}

if (isset($_POST['Info'])) {       // SQL query to select data from database
                /*$sql = "SELECT bid AS bookID, title AS bookTitle, pid AS publisherID FROM Book;";
                $result = $mysqli->query($sql);
                    echo "Connected";
    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "id: " . $row["bookID"]. " - Name: " . $row["bookTitle"]. " " . $row["publisherID"]. "<br>";
            }
        }else{
        echo "0 results";
        }
        */
        echo "here";
}

if (isset($_POST['Edition'])) {       // SQL query to select data from database
                /*$sql = "SELECT bid AS bookID, title AS bookTitle, pid AS publisherID FROM Book;";
                $result = $mysqli->query($sql);
                    echo "Connected";
    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "id: " . $row["bookID"]. " - Name: " . $row["bookTitle"]. " " . $row["publisherID"]. "<br>";
            }
        }else{
        echo "0 results";
        }
        */
        echo "here";
}

if (isset($_POST['Awards'])) {       // SQL query to select data from database
                /*$sql = "SELECT bid AS bookID, title AS bookTitle, pid AS publisherID FROM Book;";
                $result = $mysqli->query($sql);
                    echo "Connected";
    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "id: " . $row["bookID"]. " - Name: " . $row["bookTitle"]. " " . $row["publisherID"]. "<br>";
            }
        }else{
        echo "0 results";
        }
        */
        echo "here";
}

if (isset($_POST['SalesReport'])) {       // SQL query to select data from database
                /*$sql = "SELECT bid AS bookID, title AS bookTitle, pid AS publisherID FROM Book;";
                $result = $mysqli->query($sql);
                    echo "Connected";
    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "id: " . $row["bookID"]. " - Name: " . $row["bookTitle"]. " " . $row["publisherID"]. "<br>";
            }
        }else{
        echo "0 results";
        }
        */
        echo "here";
}

if (isset($_POST['DataLog'])) {       // SQL query to select data from database
                /*$sql = "SELECT bid AS bookID, title AS bookTitle, pid AS publisherID FROM Book;";
                $result = $mysqli->query($sql);
                    echo "Connected";
    if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            echo "id: " . $row["bookID"]. " - Name: " . $row["bookTitle"]. " " . $row["publisherID"]. "<br>";
            }
        }else{
        echo "0 results";
        }
        */
        echo "here";
}

$mysqli->close();
?>