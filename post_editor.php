<html>
<head>

<title>Steemeditor-editor</title>

	<link rel="stylesheet" type="text/css" href="css/style_editor.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	
	
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<script src="js/angular.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/app.js"></script>

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" lang="en" content="Editor para las publicaciones de Steemit">
		<meta name="author" content="Juan Leiva">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body ng-app="editor" ng-controller="editorctrl" style="overflow-x: hidden;    background-color: #fff;">  <!--onkeydown="return false"-->

	<div id="cerrarses" class="ses" ng-show="token!=''">
		<a href="#" ng-click="cerrars()">Cerrar sesión</a></div>
	
		<div class="header">
		
			<div class="container">
			<div id="logo"><img src='ico/se100.png' width="80px" height="50px">
			<div style="display: inline-block;">Steemeditor<span style="color:#280422" id="beta">beta</span></div>
			
			</div>
				
			</div>
		</div>
		<div class="nav-bar">
			<div class="container">
				<ul class="nav">
					<li id="ppal"><a href="http://steemeditor.com.ve/">Principal</a></li>
					<li id="edtor" ng-show="token!=''"><a href="post_editor.php">Editor</a></li>
					<li id="cfg" ng-show="token!=''"><a href="config.php">Configuración</a></li>
					<li id="userg" ><a href="guiausuario.php">Guia de usuario</a></li>
					<li id="sop" ng-show="pago==1"><a href="soporte.php">Soporte</a></li>
				</ul>
			</div>
		</div>
		<div class="content" style="padding-bottom: 0px;">
			<div class="container">
				<div class="main">
				<!--contenido -->





<div id="fondo" style="width:100%; height:100%;">

	<div id="titpost" ng-model="titpost" ng-show="postingkey!=''">Título del post: <input id="title" type="text" value="prueba#1 javascript publicación automática"></div><br/>
	
	<div id="herramientas">
		<input id="left"  class="btntool" type="button" style="background-image:url('ico/left.ico'); " ng-click="al_izq()">
		<input id="center"  class="btntool" type="button" style="background-image:url('ico/center.ico');" ng-click="al_cnt()">
		<input id="rigth"  class="btntool" type="button" style="background-image:url('ico/rigth.ico');"  ng-click="al_der()"> 
		<input id="justify"  class="btntool" type="button" style="background-image:url('ico/justify.ico');"  ng-click="al_jus()">
		<input id="txt"  class="btntool" type="button" style="background-image:url('ico/txt.ico');"  ng-click="guardar_txt()">
		<input id="apple"  class="btntool" type="button" style="background-image:url('ico/apple.ico');" ng-click="mostrar_imagenurl()">
		<input id="negrita"  class="btntool" type="button" style="background-image:url('ico/negrita.ico');" ng-click="colocar_negrita()">
		<input id="cursiva"  class="btntool" type="button" style="background-image:url('ico/cursiva.ico');" ng-click="colocar_cursiva()">
		<input id="enter"  class="btntool" type="button" style="background-image:url('ico/enter.ico');" ng-click="enter()">
		<input id="link"  class="btntool" type="button" style="background-image:url('ico/link.ico');" ng-click="link()">
		<input id="hr"  class="btntool" type="button" style="background-image:url('ico/hr.ico');" ng-click="hr()">
		
		<input id="h1"  class="btntool" type="button" style="background-image:url('ico/h1.ico');" ng-click="colocar_h1()">
		<input id="h2"  class="btntool" type="button" style="background-image:url('ico/h2.ico');" ng-click="colocar_h2()">
		<input id="h3"  class="btntool" type="button" style="background-image:url('ico/h3.ico');" ng-click="colocar_h3()">
		<input id="blquote"  class="btntool" type="button" style="background-image:url('ico/blquote.ico');" ng-click="colocar_blquote()">
		<input id="code"  class="btntool" type="button" style="background-image:url('ico/code.ico');" ng-click="colocar_code()">
		<!-- loren ipsun -->
		<input id="lorip"  class="btntool" type="button" style="background-image:url('ico/lorip.ico');" ng-click="colocar_lorip()">
		
		<input id="izq"  class="btntool" type="button" style="background-image:url('ico/izq.ico'); margin-left:10px;" ng-click="izq()">
		<img src="ico/separador.ico">
		<input id="der"  class="btntool" type="button" style="background-image:url('ico/der.ico');" ng-click="der()">
	</div>
	
	<!-- area de edición del post -->
	
	<div style="margin:0 auto;" >
	Edición del post:<br/>
	<textarea id="introtxt" ng-model="introtxt" ng-change="actualizar_vprev()" style="width: 100%; height:40%;" placeholder="Introduce texto, imágenes, separadores" spellcheck="true">
	</textarea><br/>
	</div>
	<!---<input id="postIt" type="button" value="Post it!" onClick=postArticle()>-->
	
	

		
		
	
	
	<br>
	<div style="margin:0 auto;position:relative">
		Vista previa:
		<div id="vprev" ng-model="vprev">
		</div>
	</div>
	<!--	pie de página  -->	
		<div class="footer" style="position: absolute;left: 0px;width: 100%;margin-top: 150px;">
			<div class="container">
				Steemeditor - desarrollado por Juan Leiva (juanhlb) 
			</div>
		</div>

	
</div>


	<!---				popup imagen				-->
	<div id="popup_url" align="center" class="popup">
			<div style="background-color:#567; width:20; height:20; left: 90%; float:right">	
			<input type="button" ng-click="cerrarurl()" value="X" class="boton" >
			</div> 		 
			<h2>Insertar imagen:</h2>
				<div style="position:relative; height:40px; margin-top:30px;">		
					<div><input tupe="text" id="urlimagen" ng-model="urlimagen" placeholder="Introduce aquí el link de la imagen, ejm: https://www.google.co.ve/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" style="width:80%;">
					</div>	
					<span>(También puede arrastrar la imagen hasta el cuadro de texto)</span></div><br>
				<div><input id="imagenhiperv"  ng-model="imagenhiperv" type="checkbox"  ng-checked="true">Crear un hipervinculo de la imagen</div>
				<div><input id="pieimagen" ng-model="pieimagen" ng-click="escribirpieimagen()" type="checkbox" >Personalizar pie de imagen
				<span ng-show="pieimagen"> <input type="text" id="textopieimagen" size="35" ng-model="textopieimagen" placeholder="Introduce el texto para la imagen" >
				</span>
				</div>
				

				
				<div style="width:100%; margin-top:15px;height: 60px;">  <!--  alineacion de imagen -->
				<div id="al_pop_izq"  class="btnpos" style="background-image:url('ico/al_izq.png');" ng-click="al_pop(1)"></div>
				<div id="al_pop_cnt"  class="btnpos"  style="background-image:url('ico/al_sn.png');" ng-click="al_pop(2)"></div>
				<div id="al_pop_der"  class="btnpos"  style="background-image:url('ico/al_der.png');" ng-click="al_pop(3)"></div>
				</div>
			<div style="width:100%; margin-top:10px;">
			<input name="aceptar" type="button" ng-click="aceptarurl()" value="Aceptar" class="boton" style=" margin-top:10px;">
			</div>
	</div>	
	
	
	
		<!---			popup link				-->
	<div id="popup_url" align="center" class="popup">
			<div style="background-color:#567; width:20; height:20; left: 90%; float:right">	
			<input type="button" ng-click="cerrarurl()" value="X" class="boton" >
			</div> 		 
			<h2>Insertar imagen:</h2>
				<div style="position:relative; height:40px; margin-top:30px;">		
					<div><input tupe="text" id="urlimagen" ng-model="urlimagen" placeholder="Introduce aquí el link de la imagen, ejm: https://www.google.co.ve/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png" style="width:80%;">
					</div>	
					<span>(También puede arrastrar la imagen hasta el cuadro de texto)</span></div><br>
				<div><input id="imagenhiperv"  ng-model="imagenhiperv" type="checkbox"  ng-checked="true">Crear un hipervinculo de la imagen</div>
				<div><input id="pieimagen" ng-model="pieimagen" ng-click="escribirpieimagen()" type="checkbox" >Personalizar pie de imagen
				<span ng-show="pieimagen"> <input type="text" id="textopieimagen" size="35" ng-model="textopieimagen" placeholder="Introduce el texto para la imagen" >
				</span>
				</div>
				

				
				<div style="width:100%; margin-top:15px;height: 60px;">  <!--  alineacion de imagen -->
				<div id="al_pop_izq"  class="btnpos" style="background-image:url('ico/al_izq.png');" ng-click="al_pop(1)"></div>
				<div id="al_pop_cnt"  class="btnpos"  style="background-image:url('ico/al_sn.png');" ng-click="al_pop(2)"></div>
				<div id="al_pop_der"  class="btnpos"  style="background-image:url('ico/al_der.png');" ng-click="al_pop(3)"></div>
				</div>
			<div style="width:100%; margin-top:10px;">
			<input name="aceptar" type="button" ng-click="aceptarurl()" value="Aceptar" class="boton" style=" margin-top:10px;">
			</div>
	</div>	
	
			  </div>
			</div>
		</div>
</body>
</html>

