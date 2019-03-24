<?
header("Content-Type: text/html;charset=utf-8");
require_once('conexion.php');
require_once('funciones.php'); 
date_default_timezone_set('America/Caracas');

$dato = json_decode(file_get_contents("php://input")); 
$token=$dato->token;

//obtener tokenkey
$tokenslice = explode(".",$token);

if ($token=='') {echo "0";die();}

$sql= "delete from inises where token='$tokenslice[1]'";
ejecutarsqlS ($coN,$sql);

echo "1";
?>