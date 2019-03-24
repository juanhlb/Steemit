<?
header("Content-Type: text/html;charset=utf-8");
header('Access-Control-Allow-Origin','*'); 
require_once('conexion.php');
require_once('funciones.php'); 
date_default_timezone_set('America/Caracas');

$dato = json_decode(file_get_contents("php://input")); 

$usuario=$dato->usuario;
$email=$dato->email;
$password=$dato->password;
$repassword=$dato->repassword;
$serverhost=$_SERVER["HTTP_HOST"];


//verificación de url
if ($verificar_url==1){ 
	if ($serverhost!=$host){header("Location: $error_url");die();}
}


if ($usuario=='') {echo "0";die();}
if ($email=='') {echo "0";die();}
if ($password=='') {echo "0";die();}
if ($repassword=='') {echo "0";die();}
if ($password != $repassword) {echo "4";die();}

//longitud de cadenas
if (strlen($password)<8){echo "5";die();}
if (strlen($password)>30){echo "6";die();}
if (strlen($email)>40){echo "7";die();}
if (strlen($usuario)>30){echo "8";die();}

//comprobar si existe email o usuario. existe ($link,$tabla,$campo,$valor)
if (existe ($coN,"usuario","nombre_usuario",$usuario)==1){
	{
		echo "1";die();
	}
}
if (existe ($coN,"usuario","email",$email)==1){
	{
		echo "2";die();
	}
}
$passwordsha=sha1($password);

$cod=nuevo ($coN,"usuario","pk_codigo");

$codaprobacion=sha1(uniqid(mt_rand(),true));

$sql= "INSERT INTO  `$basedatos`.`usuario` VALUES (
$cod, '$usuario',  '$email', '$passwordsha',0,0,0,now(),'',0,0,'','$codaprobacion');";


ejecutarsqlS ($coN,$sql);

header("Location: $dominio");	

?>