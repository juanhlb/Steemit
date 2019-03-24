<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Steemeditor-registro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="Description" lang="en" content="Editor para las publicaciones de Steemit">
		<meta name="author" content="Juan Leiva">

		<!-- icons -->
		<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
		<link rel="shortcut icon" href="favicon.ico">

		<!-- Override CSS file - add your own CSS rules -->
		<link rel="stylesheet" href="assets/css/styles.css">

		<script src="js/angular.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/app.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
	<body ng-app="editor" ng-controller="editorctrl" oncontextmenu="return false">

	
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
					<li id="userg"><a href="guiausuario.php">Guia de usuario</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			<div class="container">
				<div class="main">
				<!--contenido -->
				
				
				<form method="post" ng-submit="guardar_usuario()">
			<div style="border:1px solid #000; padding: 20px;  width:100%;">
				<div style="display:table; width:100%;">
					<div class="regcol"><div class="regi">Usuario </div><div class="regd" ><input id="usuario" ng-model="usuario" type="text" required maxlength="30" autofocus  style="text-transform:lowercase;" spellcheck="false"></div></div>
					<div class="regcol"><div class="regi">Email </div><div class="regd" ><input id="email" ng-model="email"  type="email" required maxlength="40" style="text-transform:lowercase; autocomplete="on"" ></div></div>
					<div class="regcol"><div class="regi">Contraseña </div><div class="regd"><input  id="password" ng-model="password"  type="password" maxlength="30" required></div></div>
					<div class="regcol"><div class="regi">Repetir Contraseña </div><div class="regd"><input id="repassword" ng-model="repassword"   maxlength="30" type="password" required></div></div>
					
										
					
				</div>
			
				  <input type="submit" value="Registrarse" style="margin-top: 20px;"></center>
			  </div> 

   				 </form>
				 <div id="msgresp" style="text-align:center;width:100%;">{{respuesta}}</div>
 				

				
				</div>
			</div>
		</div>
<!--	pie de página  -->	
		<div class="footer">
			<div class="container">
				Steemeditor - desarrollado por Juan Leiva (juanhlb) 
			</div>
		</div>
	</body>
</html>

