<?php

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

session_start();

if(isset($_POST['add1']))
{
	$_SESSION['bid']=$_POST['bid'];
}

if(isset($_POST['add'])) {
                
                
                $_SESSION['Rating']=$_POST['Rating'];
               

    
                
                $sql="INSERT INTO REVIEWS(BookID,email,Rating)Values('".$_SESSION['bid']."','viggy@example.net','".$_SESSION['Rating']."')";
                if(mysqli_query($link, $sql)){
                
                } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }                 
                
                $result = $mysqli->query($sql);
                
                $mysqli->close();
                }
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
</head>
<body>
<div class="row container">
<div class="col-md-4 ">
	<h3><b>Rating</b></h3>
	
	</div>
</div>
</div><br>
<input type="hidden" name="demo_id" id="demo_id" value="1">
<div class="col-md-4">
<form action="rating.php" method="post">
<input type="text" class="form-control" name="email" id="email" placeholder="Email Id"><br>
<input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['bid'];?>"><br>
<input type='number' placeholder="Enter the rating out of 5..." name="Rating" required><br><br>

<p><input type='submit' name="add" value='Submit Rating'></p>
</form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/index.js"></script>

</body>
</html>


