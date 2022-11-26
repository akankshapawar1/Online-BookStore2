<?php
session_start();
if(!isset($_SESSION['userid'])){
 header('Location: index2.php');
}

// logout
if(isset($_POST['but_logout'])){
 session_destroy();

 // Remove cookie variables
 $days = 1;
 setcookie ("rememberme","", time() - ($days * 24 * 60 * 60 * 1000));

 header('Location: index2.php');
}
?>
<h1>Homepage</h1>
<form method='post' action="index2.html">
 <input type="submit" value="Logout" name="but_logout">
</form>