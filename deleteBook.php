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
       
    $bTitle = $_POST['bTitle'];
    #$_SESSION['bId']=$_POST['bId'];
    #$_SESSION['pId']=$_POST['pId'];
                
    $sql = "
            DELETE 
            FROM Book 
            WHERE bid = (SELECT * FROM (SELECT bid 
                         FROM Book
                         WHERE title = '$bTitle')as bid); 
            ";

    $sql2 = "SELECT bid 
             FROM Book
             WHERE title = '$bTitle'";

    /*try{
        $mysqli->query($sql);
    }catch (mysqli_sql_exception $e){
        var_dump($e);
        exit; 
    }

        $rec = $mysqli->affected_rows;
        if($rec >= 1){
            echo "Deleted the book successfully";
        }else{
            echo "Something went wrong";
        }  */  

    try{
    $mysqli->query($sql2);
    $rc = $mysqli->affected_rows;
    if($rc>=1){
        if ($mysqli->query($sql) === TRUE){
            $rc2 = $mysqli->affected_rows;
            if($rc2>=1){
                echo "Deleted the book successfully";
            }else{
                echo "Book exists, Something went wrong. ";
            }
        }else{
            echo "Something went wrong in DELETE query. ";
            }
    }else{
        echo "Book doesn't exist. ";
        }
}catch (mysqli_sql_exception $e){
        var_dump($e);
        exit; 
}

$mysqli->close();
?>
