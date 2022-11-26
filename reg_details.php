<?php  
function __construct()
    {
       header('Access-Control-Allow-Origin: *');
       header('Access-Control-Allow-Methods:  GET, POST, PATCH, PUT, DELETE, OPTIONS');
       header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
       header('Content-type:application/json');
       if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
         exit;
       }
    }
include('db_connection.php');//make connection here  
// echo "Hello Parth";
if(isset($_POST['submit']))  
{  
    $user_name=$_POST['Name'];//here getting result from the post array after submitting the form.  
    $user_phone = $_POST['Phone'];
    $user_email=$_POST['Email'];//same 
    $user_pass=$_POST['Password'];//same
    $user_add = $_POST['Address']; 
     
    // echo $user_name;
    // print_r($_REQUEST);

    // $sql = "INSERT INTO Customer(email, name, contactno, shippinngAdd, password) VALUES($user_email, $user_name, $user_phone, $user_add, $user_pass)";
    
    if($user_name=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the name')</script>";  
exit();//this use if first is not work then other will not show  
    }  
  
    if($user_pass=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
exit();  
    }  
  
    if($user_email=='')  
    {  
        echo"<script>alert('Please enter the email')</script>";  
    exit();  
    }  
//here query check weather if user already registered so can't register again.  
    $check_email_query="select * from Customer WHERE email='$user_email'";  
    $run_query=mysqli_query($dbcon,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";   
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.location.href='register.html';
</SCRIPT>");
exit();  

    }  
//insert the user into the database.  
    $insert_user="INSERT into Customer(email, name, contactno, shippingAdd, password) VALUES ('$user_email', '$user_name', '$user_phone', '$user_add', '$user_pass')";  
    if(mysqli_query($dbcon,$insert_user))  
    {  
        echo"<script>window.open('welcome.php','_self')</script>";  
    }  
} 
?>