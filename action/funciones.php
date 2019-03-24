<?
//funcion url_completa
function url_completa($forwarded_host = false) {
    $ssl   = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on';
    $proto = strtolower($_SERVER['SERVER_PROTOCOL']);
    $proto = substr($proto, 0, strpos($proto, '/')) . ($ssl ? 's' : '' );
    if ($forwarded_host && isset($_SERVER['HTTP_X_FORWARDED_HOST'])) {
        $host = $_SERVER['HTTP_X_FORWARDED_HOST'];
    } else {
        if (isset($_SERVER['HTTP_HOST'])) {
            $host = $_SERVER['HTTP_HOST'];
        } else {
            $port = $_SERVER['SERVER_PORT'];
            $port = ((!$ssl && $port=='80') || ($ssl && $port=='443' )) ? '' : ':' . $port;
            $host = $_SERVER['SERVER_NAME'] . $port;
        }
    }
    $request = $_SERVER['REQUEST_URI'];
    return $proto . '://' . $host . $request;
}


//funcion captcha
function captcha(){
	// Crear la imagen 
	$im = imagecreatetruecolor(200, 30); 
	// El texto a pintar 
	$num1=rand(0,5000);
	$num2=rand(0,5000);
	$resp=$num1+$num2;
	$respmd5=sha1($resp);
	 echo "<input type=\"hidden\" name=\"a1f902e72b0d\" value=\"$respmd5\" />";
	$cadena =  "$num1 + $num2 =";
	$estampar  = imagecreatefromjpeg('ondas.jpg');
	$blanco = imagecolorallocate($im, 255, 255, 255); 
	$gris   = imagecolorallocate($im, 128, 128, 128); 
	$negro  = imagecolorallocate($im, 0, 0, 0); 
	imagefilledrectangle($im, 0, 0, 500, 98, $blanco); 
	// Reemplaze la ruta con su propio ruta a la fuente 
	$fuente = 'fuentes/arial.ttf'; 
	// Agregar el texto 
	imagettftext($im, 20, 0, 10, 25, $negro, $fuente, $cadena); 
	imagecopymerge($im, $estampar, 0, 0, 0, 0, 500, 200, 40);
	// Usar imagepng() resulta en texto más claro, en comparación con imagejpeg() 
	imagejpeg($im,"suma.jpg"); 
	imagedestroy($im);
	return $respmd5; 
}

//-------------------------funciones de combo
//--------------------------------------------------------------------------------

//funcion para llenar un combo mysqli
function Combo($elemento,$link,$seleccionar,$blanco, $valor, $selecionado,$selectcod=""){
		$sql="SELECT pk_codigo,descripcion FROM $elemento ORDER BY DESCRIPCION ASC";
		//echo $sq;
		$result = mysqli_query($link,$sql);
		$numero = mysqli_num_rows($result);
		$control="<select name=" .$elemento.">";
		echo $control;
		while ($row=mysqli_fetch_row($result)){
			if ($row[1]==$seleccionar){
			//---------coloca la opcion seleccionada
			echo "<option value='$row[0]' selected=\"selected\">", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}else{
			//---------coloca la opcion sin seleccion
			echo "<option value='$row[0]'>", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}
		}
		if ($blanco==1) { 
			echo "<option value=\"999\" ";
			if ($selecionado==1){echo "selected=\"selected\"";} 
			echo "> $valor </option>";}
		echo '</select>';
		return $numero;
}

//funcion para llenar un combo mysqli
function Combosql($elemento,$link,$sql,$seleccionar,$blanco, $valor, $selecionado,$selectcod=""){
		$sql="SELECT pk_codigo,descripcion FROM $elemento ORDER BY DESCRIPCION ASC";
		//echo $sq;
		$result = mysqli_query($link,$sql);
		$numero = mysqli_num_rows($result);
		$control="<select name=" .$elemento.">";
		echo $control;
		while ($row=mysqli_fetch_row($result)){
			if ($row[1]==$seleccionar){
			//---------coloca la opcion seleccionada
			echo "<option value='$row[0]' selected=\"selected\">", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}else{
			//---------coloca la opcion sin seleccion
			echo "<option value='$row[0]'>", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}
		}
		if ($blanco==1) { 
			echo "<option value=\"999\" ";
			if ($selecionado==1){echo "selected=\"selected\"";} 
			echo "> $valor </option>";}
		echo '</select>';
		return $numero;
}


//funcion para llenar un combo con una trabla de 3 columnas
function Combo3($elemento,$link,$seleccionar,$blanco, $valor, $selecionado,$selectcod=""){
		$sq="SELECT pk_codigo, descripcion FROM $elemento ORDER BY DESCRIPCION ASC";
		//echo $sq;
		$result = mysql_query($sq,$link);
		$numero = mysql_num_rows($result);
		$control="<select name=" .$elemento.">";
		echo $control;
		while ($row=mysql_fetch_row($result)){
			if ($row[1]==$seleccionar){
			//---------coloca la opcion seleccionada
			echo "<option value='$row[0]' selected=\"selected\">", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}else{
			//---------coloca la opcion sin seleccion
			echo "<option value='$row[0]'>", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}
		}
		if ($blanco==1) { 
			echo "<option value=\"999\" ";
			if ($selecionado==1){echo "selected=\"selected\"";} 
			echo "> $valor </option>";}
		echo '</select>';
		return $numero;
}

//---------------------------------------------------------------------------------
//										Data List
//-------funcion agregada 06/11/2015         funcion para llenar un datalist

function DTlist($elemento,$link,$tabla,$seleccionar,$campo_pkcodigo,$campo_descripcion ,$id){
		$sql="SELECT $campo_pkcodigo, $campo_descripcion FROM $tabla ORDER BY $campo_descripcion ASC";
		//echo $sql;
		$result = mysqli_query($link,$sql);
		$numero = mysqli_num_rows($result);
		echo "<input list=" .$elemento." id=$id name=$elemento>";
		echo "<datalist id=".$elemento.">";
		while ($row=mysqli_fetch_row($result)){
			if ($row[1]==$seleccionar){
			//---------coloca la opcion seleccionada
			echo "<option data-value='$row[0]' selected=\"selected\">", $row[1], "</option>";
			}else{
			//---------coloca la opcion sin seleccion
			echo "<option data-value='$row[0]'>", $row[1], "</option>";
			}
		}
	/*	if ($blanco==1) { 
			echo "<option value=\"999\" ";
			if ($selecionado==1){echo "selected=\"selected\"";} 
			echo "> $valor </option>";}*/
		echo '</datalist>';
		return $numero;
}

function DTlistS($elemento,$link,$tabla,$campo_descripcion ,$id,$requerido=0,$tam=140,$title='',$ortografia=1,$onchange=''){
		$sql="SELECT DISTINCT $campo_descripcion FROM $tabla ORDER BY $campo_descripcion ASC";
		echo $sql;
		$result = mysqli_query($link,$sql);
if ($ortografia==1) {$spell='true';}else{$spell='false';}
		echo "<input list=".$elemento." spellcheck=".$spell." title=\"$title\" onchange=\"$onchange\" id=$id name=$elemento style=\"width:$tam\" class=\"textbox\" ";
		if ($requerido==1) { echo " required ";}
		echo ">";
		echo "<datalist id=".$elemento.">";
		while ($row=mysqli_fetch_row($result)){
			echo "<option value='$row[0]'>";			//---------coloca la opcion 
		}
		$numero = mysqli_num_rows($result);
		echo '</datalist>';
		return $numero;
}

//------------agregado 31/08/2014 ------- llenar un listado

//funcion para crear una lista a partir de una seleccion sql
function listaSql ($sql,$elemento,$coN,$tam){

if ($tam==0) { $tam=4;}
		$result = mysql_query($sql,$coN);
		$numero = mysql_num_rows($result);
		$control="<select name=\"$elemento\" size=\"$tam\" multiple>";
		echo $control;
		while ($row=mysql_fetch_row($result)){
			if ($row[1]==$seleccionar){
			//---------coloca la opcion seleccionada
			echo "<option value='$row[0]' selected=\"selected\">", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}else{
			//---------coloca la opcion sin seleccion
			echo "<option value='$row[0]'>", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}
		}
		if ($blanco==1) { 
			echo "<option value=\"999\" ";
			if ($selecionado==1){echo "selected=\"selected\"";} 
			echo "> $valor </option>";}
		echo '</select>';
		return $numero;


}


//------------agregado 30/10/2014 ------- llenar un listado o select multiple

//funcion para crear una lista a partir de una seleccion sql
function listaSqlE ($sql,$elemento,$coN,$tam){

if ($tam==0) { $tam=4;}
		$result = mysql_query($sql,$coN);
		$numero = mysql_num_rows($result);
		$control="<select multiple name=\"$elemento\" size=\"$tam\" >";
		echo $control;
		while ($row=mysql_fetch_row($result)){
			if ($row[1]==$seleccionar){
			//---------coloca la opcion seleccionada
			echo "<option value='$row[0]' selected=\"selected\">", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}else{
			//---------coloca la opcion sin seleccion
			echo "<option value='$row[0]'>", $row[1],' ',$row[2],' ',$row[3], "</option>";
			}
		}
		if ($blanco==1) { 
			echo "<option value=\"999\" ";
			if ($selecionado==1){echo "selected=\"selected\"";} 
			echo "> $valor </option>";}
		echo '</select>';
		return $numero;


}

//------------agregado 12/11/2015 ------- llenar un listado o select multiple

//funcion para crear una lista a partir de una seleccion sql	-----> msqli
function listaSqlF ($sql,$nombre,$id,$coN,$tam){

if ($tam==0) { $tam=4;}
		$result = mysqli_query($coN,$sql);
		$numero = mysqli_num_rows($result);
		echo "<select id=\"$id\" multiple name=\"$nombre\" size=\"$tam\" >";
		while ($row=mysqli_fetch_row($result)){
			echo "<option value='$row[0]'>", $row[1], "</option>";
		}
		echo '</select>';
return $numero;
}

//funcion para crear una lista a partir de una seleccion sql	con estilo jquery -----> msqli
function listaSqlJquery ($sql,$id,$coN,$tam){

if ($tam==0) { $tam=4;}
		$result = mysqli_query($coN,$sql);
		$numero = mysqli_num_rows($result);
		echo "<ol id=\"$id\">";
		while ($row=mysqli_fetch_row($result)){
			echo "<li class=\"ui-widget-content\"> $row[1]</li>";
		}
		echo '</ol>';
return $numero;
}

/*
function nuevo ($link,$tabla,$campo)
function ejecutarsqlA ($link,$consulta)
function ejecutarsql ($link,$consulta)
function imprimir_arreglo ($arreglo,$forma){

*/

//-------------------------funcion para devolver el número de registro nuevo
//--------------------------------------------------------------------------------
function nuevo ($link,$tabla,$campo){ //msqli
	$sql = 'SELECT max('. $campo.') + 1 as nev FROM '.$tabla;
	$resultado = mysqli_query($link,$sql)  or die("Error en consulta <br>MySQL dice: ".mysqli_error($link)."<br>$sql<br>");
	$rs=mysqli_fetch_array($resultado);
	if ($rs[0]==""){return 1;}else{return $rs[0];}
}

//----------------------funcion para listar una consulta en pantalla 
function ejecutarsql ($link,$consulta,$titulo,$tamañogrid,$caption,$tamcaption,$ruta){
	$resultado = mysql_query($consulta,$link)  or die("Error en consulta <br>MySQL dice: ".mysql_error()."<br>$consulta<br>$link");
	$arr=guardarnombrecampo ($link,$consulta,$t);
	?>
		<table width=" 
		<? echo $tamañogrid; ?>
		" border="1"  align="center" cellpadding="0" cellspacing="0">
		
  <tr bgcolor="#626FE6"> 
    <td colspan=" <? echo $t; ?> "> 
      <div align="center"><? echo $titulo; ?> </div></td>
  </tr>
    <tr bgcolor="#959DEE">
  			<? // los títulos
  			foreach ($caption as &$valor) {
			?> 
			<td width="
			<?
			echo $tamcaption[a];
			$a++;
			?>
			"><a href="<? echo $ruta; ?>?orden=<? 
			$g++;
			echo "$g";
			?>"><? echo $valor; ?></a></td>
	<?
	}
	?>
  </tr>
	<?
	 $a=-1;

	 //echo "<tr>";
	while($rs=mysql_fetch_array($resultado)){
		 //cambiamos el color de cada fila
					  $a=$a*-1;
				if ($a==1){ 
				  echo '<tr bgcolor="#E4E4E4">';
				  } else {
				  echo '<tr bgcolor="#FFFFFF">';  
				  }
			foreach ($arr as &$valor) {
			echo "<td>". $rs[$valor]."</td>";
		}
		 echo "</tr>";
	}
} 

//----------------------funcion para listar una consulta en pantalla y muestra la opdión para eliminar un registro
function ejecutarsqlE ($link,$consulta,$titulo,$tamañogrid, $colorborde,$caption,$tamcaption,$ruta,$campooculto,&$pk_codigo,$oculto,$imagen,$rutaimagen,$imagenhiperv,$tamx,$tamy,$quitarcodigo=0,$funcion,$al,$colcheck=1){
	$m=1;$g=0;$a=0;
	$resultado = mysqli_query($link,$consulta) or die("Error en consulta <br>MySQL dice: ".mysqli_error($link)."<br>$consulta<br>");
	//echo $consulta;
	//echo $link;
	//var_dump ($resultado);
	/*while($rs=mysql_fetch_array($resultado)){
					echo $rs[1].$rs[2].$rs[3].$rs[4];
	}*/
	$arr=guardarnombrecampo ($link,$consulta,$t);
	//var_dump ($arr);
	//listararreglo ($arr);
	?>
		<table width=" 
		<? echo $tamañogrid; ?>
		" border="1" bordercolor="<? echo $colorborde; ?>" align="center" cellpadding="0" cellspacing="0">
		
  <tr> 
    <td colspan=" <? echo (15); ?> "> 
      <div id="titulogrid" align="center"><? echo $titulo; // coloca el titulo del grid?></div></td>  
  </tr>
    <tr bgcolor="#959DEE">
  			<? // coloca los títulos o cabeceras de cada columna
			$g=-1;
  			foreach ($caption as &$valor) {
				if  ($valor=="Cod" && $quitarcodigo==1){ goto salir2;}
			 
				if ($colcheck!=1 && $a==0) {}else{ echo "<td width=\"$tamcaption[$a];\">";}
			$g++;
		if ($oculto[$g]==0){
				
				
			if ($g==0){	//---->  funcion especial para el boton0
				echo "<input type=\"button\" id=\"orden$g\" value=\"$valor\" class=\"botoncol\" style=\"width:100%\" formnovalidate onClick=\"altercheckall();\">";
			}else{
					
				if ($funcion!=""){
				echo "<input type=\"button\" id=\"orden$g\" value=\"$valor\" class=\"botoncol\" style=\"width:100%\" formnovalidate onClick=\"$funcion[$g];\">";
				}else{
				echo "<input type=\"button\" id=\"orden$g\" value=\"$valor\" formnovalidate class=\"botoncol\" style=\"width:100%\">";
				}
			}
		}
			salir2:
if ($colcheck!=1 && $a==0) {}else {echo "</td>";}
	$a++;
	}
	?>
  </tr>
	<?
	 $a=-1;
	 $f=0; // representa al bucle de las columnas
	 //echo "<tr>";
	while($rs=mysqli_fetch_array($resultado)){
		//var_dump ($rs);
		 //cambiamos el color de cada fila
					  $a=$a*-1;
					  $conteo=$conteo+1;
				if ($a==1){ 
				  echo "<tr id=\"columna$f\" bgcolor=\"#E4E4E4\">";
				  } else {
				  echo "<tr id=\"columna$f\" bgcolor=\"#FFFFFF\">";  
				  }
				  //-------aquí le incluí la opción de eliminar mediante seleccionar con checkbox
				  //longitud=sizeof
				  
					//<td><center><input type="checkbox" id="<? echo $rs[0]; >" onclick="chkclick();"></center></td>
					if ($colcheck==1){echo "<td><center><input type=\"checkbox\" id=\"chk$f\" value=\"$rs[8],$rs[0],$f,$rs[1],$rs[2],$rs[3],$rs[4],$rs[5],$rs[6],$rs[7]\" onclick=\"chkclick(this.id);\"></center></td>";}
					  $f++;
			foreach ($arr as &$valor) {       //coloca los valores de cada columna
			
				//--aqui guarda el pk_codigo en un array
				if  ($valor=="pk_codigo"){
						$pk_codigo[]=$rs[$valor];
						if ($quitarcodigo==1) {goto salir;} //para que no muestre el código
				}

			if ($m==sizeof($arr)){$m=1;}   //$m       representa al bucle de las filas   -----> IMPRIMIR CELDAS             
			
			if ($imagen[$m]==0){
				if ($campooculto[$m]==0){ 	//--- si campooculto == 1 oculta el campo
				//echo "$f-$m-$valor";imprime fila y columna
				$celda = "celda$f,$m"; // guarda el valor de la celda en id --> PARA SER USADO EN JAVASCRIPT COMO UN ARRAY
					echo "<td onclick=\"clickrow($f,$m)\" onmouseover=\"overrow($f,$m)\" id=$celda align=\"".$al[$m]."\">".$rs[$valor]."</td>";		//MUY IMPORTANTE aqui se imprime la celda
					;
				}
			}
				
			if ($imagen[$m]==1){
				if ($imagenhiperv[$m]==0){ 
					echo "<td><img src=\"".$rs[$valor]."\" border=\"0\" width=\"$tamx\" height=\"$tamy\"></td>";
					} else {
					echo "<td><a href=\"".$rs[$valor]."\"> <img src=\"".$rs[$valor]."\" border=\"0\" width=\"$tamx\" height=\"$tamy\"> </a></td>" ;
					}
				}
			$m++;
		}
		salir:
		 echo "</tr>";
	}
return $conteo;
} 


//------------------funcion parta ejecutar sql de manera silenciosa, sin mostrar nada por pantalla------------------------
//------------------------------------------------------------------------------------------------------------------------
function ejecutarsqlS ($link,$consulta){ //mysqli
	$resultado = mysqli_query($link,$consulta) or die("Error en consulta <br>MySQL dice: ".mysqli_error($link)."<br>$consulta<br>");
	//mysqli_close ($link);
}

//----------------------------------IMPRIME UN ARREGLO DE 3 FORMAS, LA PRIMERA FORMA ES LA MEJOR
function imprimir_arreglo ($arreglo,$forma){
switch ($forma) {
    		case 0:
				print "<pre>"; print_r($arreglo); print "</pre>"; 
				break;
			case 1:
				var_dump ($arreglo);
				break;
			case 2:
				print_r($arreglo);
				break;
		}
}

//-----------------------------------imprime información de los campos de una consulta
function infocampo ($link,$consulta) {
	
	if ($resultado = mysql_query($consulta,$link)) {
	
		/* Obtener la información de campo de todas las columnas */
		$info_campo = mysql_fetch_field($resultado);
	
		foreach ($info_campo as $valor) {
			printf("Nombre:        %s\n", $valor->name);
			echo "<br>";
			printf("Tabla:         %s\n", $valor->table);
			echo "<br>";
			printf("Longitud máx.: %d\n", $valor->max_length);
			echo "<br>";
			printf("Banderas:      %d\n", $valor->flags);
			echo "<br>";
			printf("Tipo:          %d\n", $valor->type);
			echo "<br>";
			echo "<br>";
		}
		mysql_free_result($resultado);
	}
	
	/* cerrar la conexión */
}

//-----------------------------------imprime el nombre de los campos de una consulta
function imprimirnombrecampo ($link,$consulta) {
	
	if ($resultado = mysql_query($consulta,$link)) {
		/* Obtener la información de nombre de cada columna */
		$info_campo = mysql_fetch_field($resultado);
		?>	<table width="600" border="1" align="center" cellpadding="0" cellspacing="0">
				 <tr bgcolor="#626FE6"> 
   				 <td colspan="5"> 
     			 <div align="center">Listado de Categorias </div></td>
  				</tr>
  				<tr bgcolor="#959DEE"> 
		 
		<?
		
echo "<tr>";

		foreach ($info_campo as $valor) {
		echo "<td>";
			printf($valor->name);
		echo "</td>";
		}

echo "</tr></table>";
		mysql_free_result($resultado);
	}
	
	/* cerrar la conexión */
}


//-----------------------------------guarda los nombres de los campos de una consulta
//-----------------------------------y devuelve la cantidad de columnas
function guardarnombrecampo ($link,$consulta,&$total) {
	
	if ($resultado = mysqli_query($link,$consulta) or die("Error en consulta <br>MySQL dice: ".mysqli_error($link)."<br>$consulta<br>")) {
		/* Obtener la información de nombre de cada columna */
		
		while ($i < mysqli_num_fields($resultado)) {
		
				$meta = mysqli_fetch_field($resultado);
				$valores[]=$meta->name;
				/*    echo "<pre>
				blob:         $meta->blob
				max_length:   $meta->max_length
				multiple_key: $meta->multiple_key
				name:         $meta->name
				not_null:     $meta->not_null
				numeric:      $meta->numeric
				primary_key:  $meta->primary_key
				table:        $meta->table
				type:         $meta->type
				unique_key:   $meta->unique_key
				unsigned:     $meta->unsigned
				zerofill:     $meta->zerofill
				</pre>";
				echo $meta->table;*/
				$i++;
		}
		$total=mysqli_num_fields($resultado);    
		mysqli_free_result($resultado);         
		return $valores;
	}
/* cerrar la conexión */
}



//-------------------funcion para saber si existe un registro
function existe ($link,$tabla,$campo,$valor){      //-----mysqli
	if (is_numeric($valor)) { 
			$sql = "SELECT $campo FROM $tabla WHERE $campo = $valor ;";
		}else{
			$sql = "SELECT $campo FROM $tabla WHERE $campo = '$valor' ;";
		}
//	echo $sql;
	$resultado = mysqli_query($link,$sql)  or die("Error en consulta <br>MySQL dice: ".mysqli_error($link)."<br>$sql<br>");;
	if($ry=mysqli_fetch_array($resultado)){
	return 1;}else{return 0;}
}

//-------------------funcion para saber si una consulta arroja algún resultado
function existeconsulta ($link,$sql){            //-------mysqli
	$resultado = mysqli_query($link,$sql)  or die("Error en consulta <br>MySQL dice: ".mysqli_error($link)."<br>$sql<br>");;
	if($ry=mysqli_fetch_array($resultado)){
	return 1;}else{return 0;}
}

//------------------convertir fecha YMD
function convertirfechaYMD ($fecha){
        date_default_timezone_set('UTC');
		$fconvertida= date("Y-m-d",  strtotime($fecha));
		return $fconvertida;
}

//------------------convertir fecha DMY
function convertirfechaDMY ($fecha){
        date_default_timezone_set('UTC');
		$fconvertida= date("d-m-Y",  strtotime($fecha));
		return $fconvertida;
}

//---------------------devolver campo en general  -----> msqli
function devolvercampo ($link,$sql){
		$result = mysqli_query($link,$sql)  or die("Error en consulta <br>MySQL dice: ".mysqli_error($link));
		while ($row=mysqli_fetch_row($result)){
			return $row[0];
			}
}
//---------------------devolver una descripcion pasandole el pk_codigo
function devolverdescripcion ($link,$tabla,$pk_codigo){
					$sql="SELECT descripcion FROM $tabla WHERE $tabla.pk_codigo=$pk_codigo;";
					
					echo $sql;
		$result = mysql_query($sql,$link)  or die("Error en consulta <br>MySQL dice: ".mysql_error()."<br>$consulta<br>$link");

		while ($row=mysql_fetch_row($result)){
			return $row[0];
			}
}

//---------------------devolver una id a partir de una descripcion   agregado 21/11/2015
function devolverID ($link,$tabla,$campo_id,$campo_descripcion,$descripcion){
					$sql="SELECT $campo_id FROM $tabla WHERE $campo_descripcion='$descripcion';";
		$result = mysqli_query($link,$sql) or die("Error en consulta <br> MySQL dice: ".mysqli_error($link)."<br>$sql<br>");

		while ($row=mysqli_fetch_row($result)){
			return $row[0];
			}
}

//---------------------devolver una descripcion a partir de un id vinculando 2 tablas , agregado el 18/11/2015
function devolvert1t2 ($link,$tabla1,$tabla1_descripcion,$tabla1_id,$tabla2,$tabla2_descripcion,$tabla2_id,$descripcion){  //----mysqli
					$sql="SELECT $tabla1_descripcion
					FROM $tabla2 INNER JOIN $tabla1 ON $tabla2_id = $tabla1_id
					WHERE $tabla2_descripcion='$descripcion';";
					//echo $sql;
		$result = mysqli_query($link,$sql)  or die("Error en consulta <br>MySQL dice: ".mysqli_error($link)."<br>$sql<br>");

		while ($row=mysqli_fetch_row($result)){
		$arreglo[] = $row[0];	
			}
			return $arreglo;
			
}
//---------------------devolver campo, realizado para el formulario transaccion
function devolvercampox ($link,$campo,$fromtabla,$primarykey,$ref){
					$sql="SELECT $campo.descripcion
					FROM $fromtabla INNER JOIN $campo ON $fromtabla.fk_$campo = $campo.pk_codigo
					WHERE $fromtabla.$primarykey=$ref;";
					//echo $sql;
		$result = mysql_query($sql,$link)  or die("Error en consulta <br>MySQL dice: ".mysql_error()."<br>$consulta<br>$link");

		while ($row=mysql_fetch_row($result)){
			return $row[0];
			}
}

//--------------------funcion para colocar un hipervinculo
function hipervinculo ($direccion,$nuevaventana,$texto){
if ($nuevaventana==1){
$target="target=\"_blank\"";}else{$target="";}
echo "<a href=\"$direccion\" $target>$texto</a>";
}

//--------------------función salto de línea
function saltodelinea (){
	echo "<br>";
}

//---------------------funcion listar arreglo
function listararreglo ($arreglo){
		for ($d=0;$d< sizeof($arreglo);$d++){
			$msg=$arreglo[$d];
			$contenido=$contenido."$msg\n";
		}
		echo "<div align=\"center\"><textarea name=\"textarea\" cols=\"80\" rows=\"3\">$contenido</textarea></div>";
}
//--------------------------funcion para eliminar un registro pasandole el codigo
function eliminarregistro ($link,$cod,$tabla,$campo){
	$sql="delete from $tabla where $campo=$cod";
	ejecutarsqlS ($link,$sql);
}
//--------------------------funcion para actualizar la página
function refrescarpagina ($direccion){
			echo "<meta http-equiv=\"refresh\" content=\"0;URL=$direccion\">";
}
//--------------------------funcion para crear directorio
function creardirectorio ($ruta) {
	
	//$serv = $_SERVER['DOCUMENT_ROOT'] . “/”;
	
	//$ruta = $serv . “Mi_Carpeta_De_Prueba”;
	if(!file_exists($ruta))
	{
		mkdir ($ruta);
		//echo “Se ha creado el directorio: ” . $ruta;
	} else {
		//echo “la ruta: ” . $ruta . ” ya existe “;
	}
}
//------------------------------funcion para enfocar un control
function enfocar ($control, $formulario){
echo "<script>";
echo "document.$formulario.$control.focus();";
echo "</script>";
}

//-------------------------------cambiar valor a un campo de texto
function cambiartexto ($formulario,$campo,$valor){
echo "<script>";
echo "document.$formulario.$campo.defaultValue = \"$valor\";";
echo "</script>";
}

//-------------------------------cambiar valor a un campo de textopor su id
function cambiartextoID ($id,$valor){
echo "<script>";
echo "document.getElementById('$id').defaultValue = '$valor';";
echo "</script>";
}

//-----------------------------cambiar valor de check 
function cambiarcheck ($formulario,$checkbox,$valor){
echo "<script>";
echo "document.$formulario.$checkbox.checked = $valor";
echo "</script>";
}

//-----------------------------cambiar valor de combo por indice
function cambiarcomboindice ($formulario,$combo,$valor){
echo "<script>";
echo "document.$formulario.$combo.selectedIndex = $valor";
echo "</script>";
}


//-----------------------------cambiar valor de combo 
function cambiarcombo($formulario,$combo,$valor){		//---------no funciona con una opcion que tenga espacios en blanco al final
echo "<script>";
echo "for(var indice=0 ;indice<document.$formulario.$combo.length;indice++){";
echo "if (document.$formulario.$combo.options[indice].text== '$valor'){";
echo "document.$formulario.$combo.selectedIndex =indice;";
echo "}";
echo "}";
echo "</script>";
}


//-----------------------------cambiar valor de combo por el valor de una opcion
function cambiarcombovalor($formulario,$combo,$valor){		//---------no funciona con una opcion que tenga espacios en blanco al final
echo "<script>";
echo "for(var indice=0 ;indice<document.$formulario.$combo.length;indice++){";
echo "if (document.$formulario.$combo.options[indice].value== '$valor'){";
echo "document.$formulario.$combo.selectedIndex =indice;";
echo "}";
echo "}";
echo "</script>";
}

function agregaracombo($valor,$opcion,$formulario,$combo){
echo "<script>";
echo "var elemento= new Option('$valor','$opcion','', 'selected');";
echo "document.$formulario.$combo.options[document.$formulario.$combo.length]=elemento;";
echo "</script>";
}

//---------------------------------------------------- agregado 07/11/2015 agrega un valor al datalist NO SIRVE
/*function Add_dtlistroot($valor,$opcion,$dt){
echo "<script>";
echo "var elemento= new Option('$valor','$opcion','', 'selected');";
echo "document.$dt.options[document.$dt.length]=elemento;";
echo "</script>";
}*/
//-------------------------------------------------------
function obtenertextocombo (){
		echo "<script>";
		echo "var seleccionado = document.form1.filtrodepartamento.selectedIndex;";
		echo "var txtsel= document.form1.filtrodepartamento.options[seleccionado].text;";
		echo "</script>";
		$textosel = "<script> document.write(txtsel) </script>";
	return $textosel;
/* <script>
var seleccionado = document.form1.filtrodepartamento.selectedIndex;
alert (document.form1.filtrodepartamento.options[seleccionado].text);
</script>*/
}
//-------------------------function modificar: modifica los campos de una tabla
function modificar($basedatos, $link, $tabla,$campos, $valores,$tipo,$where){	
	$sql= "UPDATE `$basedatos`.`$tabla` SET ";
	for ($contadorcampos=0;$contadorcampos< sizeof($campos);$contadorcampos++){
						switch ($tipo[$contadorcampos]) {	//------------------ es para que quite las comillas en el caso numerico
												case "TXT":
												$val="'$valores[$contadorcampos]'";
												break;
										 
												case "NUM":
												$val="$valores[$contadorcampos]";
												break;
						}
						
					if ($contadorcampos==(sizeof($campos)-1)){  //--------------es para que no coloque la última coma
					$sql.= "`$campos[$contadorcampos]` = $val ";
					break;}
					
					$sql.= "`$campos[$contadorcampos]` = $val, ";
	
	}
	$sql.=$where;
	ejecutarsqlS ($link, $sql);
}
//***---------------------------------------funcion para cambiar los saltos de línea para que javascript los acpte bien
function cambiarsaltodelineajs ($cadena){
	$cadena = str_replace(array("\n", "\r"), array('\n', '\r'), $cadena);
	return $cadena;
}

function fullscreen (){
	echo "<script>
	fullscreen = function(e){
		  if (e.webkitRequestFullScreen) {
			e.webkitRequestFullScreen();
		  } else if(e.mozRequestFullScreen) {
			e.mozRequestFullScreen();
		  }
	  }

		fullscreen(document.getElementById('content'));
	</script>";

}

//--------------funcion agregada 06/11/2015   funcion para guardar datos en una tabla
function AddItem($coN,$basedatos,$tabla,$valores){
				//mysqli_num_rows($resultado));
				//-----guarda la nueva descripción en la tabla
				$sql="INSERT INTO `$basedatos`.`$tabla` 
				VALUES ($valores);";
				ejecutarsqlS ($coN, $sql);				
}


//--------------funcion agregada 06/11/2015   comprueba si el registro es nuevo o existe, si es nuevo devuelve el número de registro
function Checknew ($link,$basedatos,$tabla,$nombrecampo,$pk_codigo,$descripcion) {
	$sql="SELECT $nombrecampo FROM `$basedatos`.`$tabla` WHERE $nombrecampo='$descripcion'";
		$resultado = mysqli_query($link, $sql) or die("Error en consulta <br>MySQL dice: ".mysqli_error($link)."<br>$sql<br>");

		$rs=mysqli_fetch_array($resultado);
		if ($rs[0]==""){
			$cod_nuevo = nuevo ($link,"$tabla","$pk_codigo");
		} else {$cod_nuevo=-1;}
				mysqli_free_result($resultado);
				return $cod_nuevo;
}
function alerta ($msg){
		echo "<script>";
		echo "alert ('$msg');";
		echo "</script>";
}
?>