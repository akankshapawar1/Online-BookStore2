<?php

function encryptCookie( $value ) {


 	$ciphering = "AES-128-CTR"; 
  

	$iv_length = openssl_cipher_iv_length($ciphering); 
	$options = 0; 
	$encryption_iv = '1234567891011121'; 
	$encryption_key = "Hello"; 
 
	$encryption = openssl_encrypt($value, $ciphering, 
            $encryption_key, $options, $encryption_iv);
	return ( $encryption );
}

if($_POST["password"]!="123" || $_POST["username"]!="LTI"){
	echo "Invalid Username/Password!!";
}
else{
if(!empty($_POST["remember"])) {
	$a="Welcome, ";
	$b=$_POST["username"];
	$c=$a.$b;
	echo "$c\n";
	$pwd=$_POST["password"];
	$encrypt=encryptCookie($pwd);
	setcookie ("username",$_POST["username"],time()+ 86400);
	setcookie ("password",$encrypt,time()+ 86400);
	
} else {
	$a="Welcome, ";
	$b=$_POST["username"];
	$c=$a.$b;
	echo "$c\n";
	setcookie("username","");
	setcookie("password","");
}
}

?>

<p><a href="page1.php"> Go to Login Page </a> </p>
