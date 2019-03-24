<?
header("Content-Type: text/html;charset=utf-8");
require_once('conexion.php');
require_once('funciones.php'); 
date_default_timezone_set('America/Caracas');

$dato = json_decode(file_get_contents("php://input")); 
$usuario=$dato->usuario;
$password=$dato->password;
$url=$dato->url;


//verificación de url
if ($verificar_url==1){ 
	if (url!=$dominio."inises.php"){header("Location: $error_url");}
}


if ($usuario=='') {echo "0";die();}
if ($password=='') {echo "0";die();}

$passwordsha=sha1($password);

$sql= "SELECT nombre_usuario, contrasena FROM `usuario` WHERE nombre_usuario='$usuario' and contrasena='$passwordsha';";

if (existeconsulta ($coN,$sql)==1){
		$usersha=sha1($usuario);
		$randomkey=sha1(uniqid(mt_rand(),true));
		$datesha=sha1(date("Ymd"));
		
		//comprobar que no exista el usuario en la tabla inises, si existe no se crea otro sino que se devuelven los valores de sesion
		if (existeconsulta ($coN,"select usuario from inises where usuario='$usersha'")==1){
			$randomkey=devolvercampo ($coN,"select token from inises where usuario='$usersha'");
			echo "$usersha.$randomkey.$datesha";
			die();
		}
		
		//si el usuario no existe en la tabla inises, se crea un registro nuevo
		
		$sql= "INSERT INTO `inises` VALUES ('$usersha', '$randomkey', '$datesha');";
		ejecutarsqlS ($coN,$sql);
		
		echo "$usersha.$randomkey.$datesha";
	}else{
		echo "0";
}

?>