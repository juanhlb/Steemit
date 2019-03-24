<?
header("Content-Type: text/html;charset=utf-8");
require_once('conexion.php');
require_once('funciones.php'); 
date_default_timezone_set('America/Caracas');

$dato = json_decode(file_get_contents("php://input")); 
$token=$dato->token;
$usuario=$dato->usuario;
$url=url_completa();

$usersha=sha1($usuario);

//verificación de url
if ($verificar_url==1){ 
	if ($url!=$dominio."post_editor.php"){header("Location: $error_url");}
}

//obtener tokenkey
$tokenslice = explode(".",$token);

if ($token=='') {header("Location: $error_url");}

$sql= "select token from inises where token='$tokenslice[1]' and usuario='$usersha'";
if (existeconsulta ($coN,$sql)==1){
		echo "1";
	}else{
	 	header("Location: $error_url");
}

?>