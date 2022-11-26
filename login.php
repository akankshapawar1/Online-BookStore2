<?php  
session_start();//session starts here 
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
  
?>  
  
<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">  
    <title>Login</title>  
    <head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="bootstrap-3.2.0-dist\css\bootstrap.css">  
    <title>Login</title>  
    <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <!-- <title>rhino</title> -->
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
    }
</style>  
  
<body>  
<body class="main-layout">
     <!-- loader  -->
     <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#"/></div>
     </div>
     <!-- end loader -->
     <!-- header -->
     <header class="full_bg">
        <!-- header inner -->
        <div class="header">
           <div class="header_top">
              <div class="container">
                 <div class="row">
                    <div class="col-md-3">
                       <ul class="contat_infoma">
                          <li><i class="fa fa-phone" aria-hidden="true"></i> Call : +01 12345678909</li>
                       </ul>
                    </div>
                    <div class="col-md-6">
                       <ul class="social_icon_top text_align_center  ">
                          <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                          <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                       </ul>
                    </div>
                    <div class="col-md-3">
                       <ul class="contat_infoma text_align_right">
                          <li><a href="Javascript:void(0)"> <i class="fa fa-phone" aria-hidden="true"></i> demo@gmail.com</a></li>
                       </ul>
                    </div>
                 </div>
              </div>
           </div> 
<div class="container">  
    <div class="row">  
        <div class="col-md-4 col-md-offset-4">  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h1 class="panel-title">Sign In</h1>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="login.php">  
                        <fieldset>  
                            <div class="form-group"  >  
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                            </div>  
  
  
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" >  
  
                            <!-- Change this to a button or input when using this as a form -->  
                          <!--  <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->  
                        </fieldset>  
                    </form>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
</body>  
<footer>
      <div class="footer">
         <div class="container">
            <div class="row">
               <div class=" col-lg-3 col-md-6">
                  <a class="logo_bottom"><img src="images/logo_bottom.png" alt="#"/></a>
                  <p class="many">
                     There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humou
                  </p>
               </div>
               <div class="col-lg-2 offset-lg-1 col-md-6">
                  <h3>QUICK LINKS</h3>
                  <ul class="link_menu">
                     <li><a href="index.html">Home</a></li>
                     <li><a href="about.html"> About</a></li>
                     <li><a href="project.html">Projects</a></li>
                     <li><a href="staff.html">Staff</a></li>
                     <li><a href="contact.html">Contact Us</a></li>
                  </ul>
               </div>
               <div class=" col-lg-3 col-md-6">
                  <h3>INSTAGRAM FEEDS</h3>
                  <ul class="insta text_align_left">
                     <li><img src="images/inst1.png" alt="#"/></li>
                     <li><img src="images/inst2.png" alt="#"/></li>
                     <li><img src="images/inst3.png" alt="#"/></li>
                     <li><img src="images/inst4.png" alt="#"/></li>
                  </ul>
               </div>
               <div class=" col-lg-3 col-md-6 ">
                  <h3>SIGN UP TO OUR NEWSLETTER </h3>
                  <form class="bottom_form">
                     <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                     <button class="sub_btn">Sign Up</button>
                  </form>
               </div>
            </div>
         </div>
         <div class="copyright">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 offset-md-2">
                     <p>© 2019 All Rights Reserved. Design by <a href="https://html.design/"> Free Html Templates</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </footer>
   <!-- end footer -->
   <!-- Javascript files--> 
   <script src="js/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/jquery-3.0.0.min.js"></script>
   <!-- sidebar -->
 <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
   <script src="js/custom.js"></script> 

   <?php  
  
include('db_connection.php');  
  
if(isset($_POST['login']))  
{  
    $user_email=$_POST['email'];  
    $user_pass=$_POST['pass'];  
      
    if($user_email == 'admin@admin.com' && $user_pass == 'admin'){
      echo "<script>window.open('adminOptions.html','_self')</script>";
    }else{
      $check_user="select * from Customer WHERE email='$user_email'AND password='$user_pass'";  
      echo "<script>window.open('index1.php','_self')</script>";
      $run=mysqli_query($dbcon,$check_user);  
    if(mysqli_num_rows($run))  
    {  
        echo "<script>window.open('index1.php','_self')</script>";  
  
        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.  

  
    }  
    else  
    {  
      echo "<script>alert('Email or password is incorrect!')</script>";  
    }  }
}  
?>  





   </html>  
  
