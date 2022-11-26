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
#$bookTitle = $_POST['bookTitle'];
$awardName = $_POST['awardName'];
$awardYear = $_POST['awardYear'];

#check that book id = book name
#subquery : select title from book where id = inputID. Use this for awards table.
#so no different entries for bookid and book title which point to different books
$sql1 = "INSERT INTO Awards(book_title, award_name, award_year)
         VALUES((SELECT title FROM Book WHERE bid = '$bookId'), '$awardName', $awardYear);";

$sql2 = "SELECT title FROM Book WHERE bid = '$bookId';";

/*try{
    if( $mysqli->query($sql2) === TRUE ){
        $rc = $mysqli->affected_rows;
        if($rc>=1){
            if ($mysqli->query($sql1) === TRUE){
                $rc2 = $mysqli->affected_rows;
                if($rc2>=1){
                    echo "Insert successful. ";
                }else{
                    echo "BookID exists, Something went wrong. ";
                }
            }else{
                echo "Something went wrong in INSERT query. ";
            }
        }else{
            echo "BookID doesn't exists. ";
        }
    }else{
        echo "no connection";
    }
}catch (mysqli_sql_exception $e){
        var_dump($e);
        exit; 
}*/

try{
    $mysqli->query($sql2);
    $rc = $mysqli->affected_rows;
    if($rc>=1){
        if ($mysqli->query($sql1) === TRUE){
            $rc2 = $mysqli->affected_rows;
            if($rc2>=1){
                echo "Insert successful. ";
            }else{
                echo "BookID exists, Something went wrong. ";
            }
        }else{
            echo "Something went wrong in INSERT query. ";
            }
    }else{
        echo "BookID doesn't exists. ";
        }
}catch (mysqli_sql_exception $e){
        var_dump($e);
        exit; 
}

$mysqli->close();
?>