<?php
	 function f_encrip_descip($action,$string)
	 {
		 $output = false;
		 $encrypt_method = "blowfish";
		 $secret_key = 'secreta123';
		 $secret_iv = 'len-secret@';
		 
		 $key = hash('sha256', $secret_key);
		 $iv = substr(hash('sha256', $secret_iv), 0, 8);
		 
		 
		 if ($action == 'encrypt') 
		  {
			 $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));
		  } 
		 else 
		  {
			if ($action == 'decrypt') 
			 {
				 $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
			 }
		  }
		 return $output; 
	 }

	 $string = "HOLA compañero Árbol";

$action = "encrypt";
$cadena = f_encrip_descip($action,$string);
echo "<b>Cadena Encriptada-></b> ".$cadena;

echo "<br>";

$action = 'decrypt';
$nombre = f_encrip_descip($action,$cadena);
echo "<b>Cadena Original-></b> ".$nombre;

?>
