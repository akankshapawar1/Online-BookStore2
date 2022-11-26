<?php
    $servername = 'dbms-project.csddeoelb5pk.us-east-1.rds.amazonaws.com:3306';
    $username = 'admin';
    $password = 'Fit4M0Re!';
    $dbname = "BookStore";
    $connection = mysqli_connect($servername, $username, $password, $dbname);
      
    // Check connection
    if(!$connection){
        die('Database connection error : ' .mysql_error());
    }
    
?>
