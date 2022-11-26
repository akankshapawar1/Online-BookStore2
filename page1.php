<?php
	function decryptCookie( $value ) {
 
	$ciphering = "AES-128-CTR"; 
	$iv_length = openssl_cipher_iv_length($ciphering); 
	$options = 0; 
	$decryption_iv = '1234567891011121'; 
	$decryption_key = "Hello"; 
	$decryption=openssl_decrypt ($value, $ciphering,  
        $decryption_key, $options, $decryption_iv);
	return ( $decryption );
}

?>
<form action="page2.php" method="post" style="border: 2px dotted blue; text-align:center; width: 400px;">
	<p>
		Username: <input name="username" type="text" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
	</p>
	<p>Password: <input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { $decrypt=decryptCookie($_COOKIE["password"]); echo $decrypt; } ?>">
	</p>
	<p><input type="checkbox" name="remember" checked /> Remember me
	</p>
	<p><input type="submit" value="Login"></span></p>       
</form>