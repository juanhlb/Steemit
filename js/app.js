// JavaScript Document
var app = angular.module('editor',[]);//Creamos el modulo

app.controller("editorctrl", function($scope,$http){//creamos el controlador
									  
if (location.protocol !== "https:") location.protocol = "https:";

$("#al_pop_cnt").css({ "border": "5px solid #093"})
$scope.postingkey='';
$scope.introtxt=localStorage.getItem("post");
$scope.imagenhiperv=true;
$scope.textopieimagen="";
$scope.pieimagen=false;
$scope.token=readCookie("token");

if ($scope.token==null){$scope.token='';}

//para que inicio de sesion no se muestre si ya inició sesión
if (document.title=='Steemeditor-inisesion'){
	if ($scope.token!='') { location.href ="https://steemeditor.com.ve/"; }
}

if (document.title=='Steemeditor-editor'){
	if ($scope.token=='') { location.href ="https://steemeditor.com.ve/"; }
		$http.post('./action/comprobar_token.php',{usuario:$scope.usuario, token:$scope.token}).then(function successCallback(response) {
			//var re=response.data;
			//alert (re);																																										
	 }, function errorCallback(response) {
				  alert (response.data);
 		});
	
}

if (document.title=='Steemeditor-registro'){
	if ($scope.token!='') { location.href ="https://steemeditor.com.ve/"; }
}

	


var imgpopupal=2;


	//negrita
	$scope.colocar_negrita = function() {	
	
		/*$("#introtxt").select(function(){		
			var selectedText = document.getSelection();
			$("#vprev").html("Se ha seleccionado el texto " + selectedText);
		});*/
		
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	
	  /*vprev.innerHTML=procesar_selección(texto,inicio,fin);*/
	
	  var longitud=texto.length;
	  
	
	//texto que se va a insertar
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);
	
	  txmedio="<b>"+txmedio+"</b>";
	  //console.log (txmedio);
	  //console.log  (txinicio);
	  //console.log  (txfin);
	   
	  //hay que formar una nueva cadena
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
		//cursiva - italic
	$scope.colocar_cursiva = function() {	
		/*$("#introtxt").select(function(){		
			var selectedText = document.getSelection();
		});*/
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<em>"+txmedio+"</em>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
	//actualizar al escribir en la parte superior
	$scope.actualizar_vprev = function() {	
		var codigo = $("#introtxt").val();
		var codparrafo="";
		
		var txtparrafo = codigo.split("\n");
		for (var i=0; i < txtparrafo.length; i++) {
			codparrafo +="<p>" + txtparrafo[i] + "</p>";
		}

		$("#vprev").html(codparrafo);
	}
	
	// salto de línea <br>
	$scope.enter = function() {	
		/*$("#introtxt").select(function(){		
			selectedText = document.getSelection();
		});*/
		
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var parteuno=texto.slice(0,inicio);
		var partedos=texto.slice(inicio,texto.length);
		var nueva_cadena=parteuno+'<br>\n'+partedos;
		
	  	$scope.introtxt=nueva_cadena; 
	  	$("#vprev").html(nueva_cadena);
		$('#introtxt').focus();
		actualizar_vprev();
		//$("#introtxt").selectRange(40);
		/*$('#introtxt').setCursorPosition(40);*/

		//console.log (parteuno);
		//console.log (partedos);
		
	}
	
		// linea horizontal
	$scope.hr = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var parteuno=texto.slice(0,inicio);
		var partedos=texto.slice(inicio,texto.length);
		var nueva_cadena=parteuno+'<hr>\n'+partedos;
	  	$scope.introtxt=nueva_cadena; 
	  	$("#vprev").html(nueva_cadena);
		$('#introtxt').focus();	
		actualizar_vprev();
	}
	
	//columna izquierda
	$scope.izq = function() {	
		/*$("#introtxt").select(function(){		
			var selectedText = document.getSelection();
		});*/
		
		var texto =introtxt.value;
		var inicio=texto.slice(0,introtxt.selectionStart); 
		var medio=texto.slice(introtxt.selectionStart,introtxt.selectionEnd); 
		var fin=texto.slice(introtxt.selectionEnd,texto.length);
		//console.log  (inicio);
		//console.log  (fin);
		//se quitaron las tabulaciones
		//var nueva_cadena=inicio+"\n<div class='pull-left'>\n\t<div class='text-justify'>\n\n\t"+ medio +"\n\t</div>\n</div>\n"+fin ;
		var nueva_cadena=inicio+"\n<div class='pull-left'>\n<div class='text-justify'>\n\n"+ medio +"\n</div>\n</div>\n"+fin ;
	  	//console.log (nueva_cadena);
		
		$("#vprev").html(nueva_cadena);
		$scope.introtxt=nueva_cadena; 
		actualizar_vprev();
		//console.log (parteuno);
		//console.log (partedos);
		
		
	}
	
		//columna derecha
	$scope.der = function() {	
		/*$("#introtxt").select(function(){		
			selectedText = document.getSelection();
		});*/
		
		var texto =introtxt.value;
		var inicio=texto.slice(0,introtxt.selectionStart); 
		var medio=texto.slice(introtxt.selectionStart,introtxt.selectionEnd); 
		var fin=texto.slice(introtxt.selectionEnd,texto.length);
		//console.log  (inicio);
		//console.log  (fin);
		//se quitaron las tabulaciones
		//var nueva_cadena=inicio+"\n<div class='pull-right'>\n\t<div class='text-justify'>\n\n\t"+ medio +"\n\t</div>\n</div>\n"+fin ;
		var nueva_cadena=inicio+"\n<div class='pull-right'>\n<div class='text-justify'>\n\n"+ medio +"\n</div>\n</div>\n"+fin ;
	  	$scope.introtxt=nueva_cadena; 
	  	$("#vprev").html(nueva_cadena);
		actualizar_vprev();
		//console.log (parteuno);
		//console.log (partedos);
		
	}
	
	//mostrar imagen url - abrir
	$scope.mostrar_imagenurl = function() {	
		$scope.urlimagen="";
	
		$(function() {
			$({blurRadius: 0}).animate({blurRadius: 10}, {
				duration: 500,
				easing: 'swing', // or "linear"
								 // use jQuery UI or Easing plugin for more options
				step: function() {
					//console.log(this.blurRadius);
					$('#fondo').css({
						"-webkit-filter": "blur("+this.blurRadius+"px)",
						"filter": "blur("+this.blurRadius+"px)"
					});
				}
		});
		imgpopupal=2;	
		$scope.al_pop(2);
		$('#popup_url').fadeIn("fast");
		$scope.textopieimagen="";
		$scope.pieimagen=false;
		

});
		
	}
	
	// presionar aceptar en imagen popup
	$scope.aceptarurl = function() {	
		$('#popup_url').fadeOut("fast");
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var parteuno=texto.slice(0,inicio);
		var partedos=texto.slice(inicio,texto.length);
		var cadena_imagen;
		
		//si tengo marcado el check crear un hipervinculo
		if ($scope.imagenhiperv==true){
			cadena_imagen="<a href='"+ $scope.urlimagen + "'><img src='"+ $scope.urlimagen +"'></a> ";
			
			}else{ //si está desmarcado el check crear un hipervinculo
			cadena_imagen="<img src='"+ $scope.urlimagen +"'> ";
		}
		
		// si tengo marcado el check personalizar pie de imagen
		if ($scope.pieimagen==true){
			var pie=$scope.textopieimagen;	
		} else {
			var pie="<a href='"+ $scope.urlimagen + "'>Fuente de la imagen</a> "
		}
		
		if (imgpopupal==1){var inial="<div class='pull-left'>\n\n";var final="</div>";}
		if (imgpopupal==2){var inial="";var final="";}
		if (imgpopupal==3){var inial="<div class='pull-right'>\n\n";var final="</div>";}
		
		//aquí se arma la cadena según las opciones que se marcaron
		if (imgpopupal==1){var nueva_cadena=parteuno+'\n'+inial+cadena_imagen+'\n<br><center>\n'+pie+'\n</center><br>'+final+partedos;}
		if (imgpopupal==2){var nueva_cadena=parteuno+'\n'+inial+cadena_imagen+'<br>\n'+pie+'\n<br>'+final+partedos;}
		//if (imgpopupal==3){var nueva_cadena=parteuno+'\n'+inial+cadena_imagen+'\n<br><right>\n'+pie+'\n</right><br>'+final+partedos;}
		
	  	$scope.introtxt=nueva_cadena; 
	  	$("#vprev").html(nueva_cadena);
			//quitar efecto blur
			$('#fondo').css({
						"-webkit-filter": "blur(0px)",
						"filter": "blur(0px)"
			});
	}
	
	
	//h1
	$scope.colocar_h1 = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<h1>"+txmedio+"</h1>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
		//h2
	$scope.colocar_h2 = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<h2>"+txmedio+"</h2>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
		//h3
	$scope.colocar_h3 = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<h3>"+txmedio+"</h3>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
	//<blockquote>
		$scope.colocar_blquote = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<blockquote>"+txmedio+"</blockquote>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
		//<code>
	$scope.colocar_code = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<pre><code>\n\n\n\n"+txmedio+"</code></pre>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
			//alinear a la izquierda
	$scope.al_izq = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<left>"+txmedio+"</left>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
				//alinear al centro
	$scope.al_cnt = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<center>"+txmedio+"</center>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
					//alinear a la derecha
	$scope.al_der = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<right>"+txmedio+"</right>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
					//alinear justificado
	$scope.al_jus = function() {	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var fin   =introtxt.selectionEnd;
		var longitud = introtxt.length;
	  	var longitud=texto.length;
	  var txinicio=texto.slice(0,inicio);
	  var txmedio =texto.slice(inicio,fin);
	  var txfin   =texto.slice(fin,longitud);	
	  txmedio="<div class='text-justify'>"+txmedio+"</div>";  
	  var nueva_cadena=txinicio+txmedio+txfin;
	  $scope.introtxt=nueva_cadena;
	  $("#vprev").html(nueva_cadena);
	  actualizar_vprev();
	}
	
	//cerrar url
	$scope.cerrarurl = function () {
			$('#popup_url').fadeOut("fast");
			$('#fondo').css({
						"-webkit-filter": "blur(0px)",
						"filter": "blur(0px)"
			});
	}
	
	//escribir pie imagen
	
	$scope.escribirpieimagen = function () {
		 $("#textopieimagen").focus();	
	}
	
	//alineacion imagen popup
	$scope.al_pop = function (m) {
		if (m==1){
			$("#al_pop_izq").css({ "border": "5px solid #093"})
			$("#al_pop_cnt").css({ "border": "0px"})
			$("#al_pop_der").css({ "border": "0px"})
			imgpopupal=1;
		}
		
		if (m==2){
			$("#al_pop_izq").css({ "border": "0px"})
			$("#al_pop_cnt").css({ "border": "5px solid #093"})
			$("#al_pop_der").css({ "border": "0px"})
			imgpopupal=2;
		}
		
		if (m==3){
			$("#al_pop_izq").css({ "border": "0px"})
			$("#al_pop_cnt").css({ "border": "0px"})
			$("#al_pop_der").css({ "border": "5px solid #093"})
			imgpopupal=3;
		}
		/*$("#nuevo").css({
			   "background-color": "#ff8800",
			   "position": "absolute",
			   "width": "100px",
			   "top": "100px",
			   "left": "200px"
		})*/
	}
	
	
	$scope.colocar_lorip = function() {	
	
		var texto =introtxt.value;
		var inicio=introtxt.selectionStart;
		var parteuno=texto.slice(0,inicio);
		var partedos=texto.slice(inicio,texto.length);
		var nueva_cadena="\nLorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.\n\n\n <br><br> Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui.\n\n\n  Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.\n\n\n<br><br>  Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien. Vestibulum purus quam, scelerisque ut, mollis sed, nonummy id, metus. Nullam accumsan lorem in dui. Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis, ipsum. Sed aliquam ultrices mauris. Integer ante arcu, accumsan a, consectetuer eget, posuere ut, mauris. Praesent adipiscing. Phasellus ullamcorper ipsum rutrum nunc.\n\n\n<br><br> Nunc nonummy metus. Vestibulum volutpat pretium libero. Cras id dui. Aenean ut eros et nisl sagittis vestibulum. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Sed lectus. Donec mollis hendrerit risus. Phasellus nec sem in justo pellentesque facilisis. Etiam imperdiet imperdiet orci. Nunc nec neque. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi. Curabitur ligula sapien, tincidunt non, euismod vitae, posuere imperdiet, leo. Maecenas malesuada. Praesent congue erat at massa. Sed cursus turpis vitae tortor. Donec posuere vulputate arcu. Phasellus accumsan cursus velit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed aliquam, nisi quis porttitor congue, elit erat euismod orci, ac placerat dolor lectus quis orci.\n\n\n<br><br> Phasellus consectetuer vestibulum elit. Aenean tellus metus, bibendum sed, posuere ac, mattis non, nunc. Vestibulum fringilla pede sit amet augue. In turpis. Pellentesque posuere. Praesent turpis. Aenean posuere, tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus. Donec elit libero, sodales nec, volutpat a, suscipit non, turpis. Nullam sagittis. Suspendisse pulvinar, augue ac venenatis condimentum, sem libero volutpat nibh, nec pellentesque velit pede quis nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce id purus. Ut varius tincidunt libero. Phasellus dolor. Maecenas vestibulum mollis\n";
	  	$scope.introtxt=parteuno+nueva_cadena+partedos; 
	  	$("#vprev").html(nueva_cadena);
		actualizar_vprev();
		
	}
	
	
	//guardar en archivo de texto
	
	$scope.guardar_txt = function () {
		 	var contenido;
			contenido = $('#introtxt').val();
			saveContent (contenido,'nombre_del_archivo.txt');
	}
	
	
	
	// guardar usuario - registro
	
	$scope.guardar_usuario = function () {
		$('#msgresp').fadeOut();

		$http.post('https://steemeditor.com.ve/action/usuario_s.php',{usuario:$scope.usuario, email:$scope.email, password:$scope.password, repassword:$scope.repassword}).then(function successCallback(response) {

				var re= response.data;
				//alert (response.data);
				   	console.log(response.data);
					console.log(response.status);
					console.log(response.headers);
					console.log(response.cofing);
					$scope.respuesta='';
				    switch (re){
						case '0':
							$scope.respuesta="Faltan datos";
							break;
						case '1':
							$scope.respuesta="Ya existe nombre de usuario";
							break;
						case '2':
							$scope.respuesta="Ya existe nombre de email";
							break;
						case '4':
							$scope.respuesta="Las contrase\u00f1as son diferentes";
							break;
						case '5':
							$scope.respuesta="La contrase\u00f1a debe tener m\u00e1s de 8 caracteres";
							break;
						case '6':
							$scope.respuesta="La contrase\u00f1a puede tener hasta 30 caracteres";
							break;
						case '7':
							$scope.respuesta="El email puede tener hasta 40 carácteres";
							break;
						case '8':
							$scope.respuesta="El nombre de usuario puede tener hasta 30 caracteres";
							break;
					}  
					
					if (re!='3'){$('#msgresp').fadeIn("fast");}
					
			  }, function errorCallback(response) {
				  alert (response.data);
				// called asynchronously if an error occurs
				// or server returns response with an error status.
 		});
	}
	
	
	//iniciar sesion
	$scope.iniciar_sesion = function () {
		$('#msgresp').fadeOut();
		$http.post('./action/inises.php',{usuario:$scope.usuario, password:$scope.password}).then(function successCallback(response) {
				var re= response.data;
				if (re!='0'){ 
					//alert (re);
					var ano = (new Date).getFullYear();
					var fecha = new Date();
					var mes = fecha.getMonth();
					var expiresdate = new Date(ano, mes + 1, 1, 11, 20);
					$scope.token=re;
					document.cookie = "token="+ re + "; expires=" + expiresdate;
					location.href ="https://steemeditor.com.ve/";
				}
				
				if(re==0){
					$scope.respuesta="Usuario o contrase\u00f1a incorrecta";
					$('#msgresp').fadeIn("fast");	
				}
																																														
	 }, function errorCallback(response) {
				  alert (response.data);
				// called asynchronously if an error occurs
				// or server returns response with an error status.
 		});
	}
	
	//cerrar sesion
	$scope.cerrars = function() {	
		$http.post('./action/cerrarses.php',{token:$scope.token}).then(function successCallback(response) {
		var re=response.data;
				if (re=='1'){
					document.cookie = "token=''; max-age=0";
					$scope.token='';
					location.href ="https://steemeditor.com.ve/";
				}

																																														
	 }, function errorCallback(response) {
				  alert (response.data);
 		});
	}
	

	
	window.onload = function() { 

		alert (document.title);
		if (document.title=='post_editor.php'){
			//$scope.actualizar_vprev();
			
			if (typeof(Storage) !== "undefined") {
			var a1=localStorage.getItem("post");		
			$scope.introtxt=a1;
			setInterval(function(){localStorage.setItem("post", $scope.introtxt);}, 10000);
			}
		}
}
	
	
});


// ------------------------fin app angular ------------------------

//las tabulaciones hacen que se muestre como code
/*$('textarea').keydown(function(e)
{
    if(e.keyCode === 9)
    {
        var start = this.selectionStart;
            end = this.selectionEnd;
 
        var $this = $(this);
 
        $this.val($this.val().substring(0, start)
                    + "	"
                    + $this.val().substring(end));
        this.selectionStart = this.selectionEnd = start + 1;
        return false;
    }
});*/


//----------------------------------------------------------------------------
// tecla esc para cerra popup
$(document).keyup(function(event){
        if(event.which==27)
        {	
			$('#popup_url').fadeOut("fast");
			$('#fondo').css({
						"-webkit-filter": "blur(0px)",
						"filter": "blur(0px)"
			});
		}
});
 


//---------------------------------------------------------------------
//     G U A R D A R    E N    A R C H I V O   D E   T E X T O 
//---------------------------------------------------------------------
function saveContent(fileContents, fileName) {
						  var link = document.createElement('a'); 
						  link.download = fileName;
						  link.href = 'data:,' + fileContents; link.click();
}

//---------------------------------------------------------------------
//     L E E R     C O O K I E
//---------------------------------------------------------------------
function readCookie(name) {
	  var nameEQ = name + "="; 
	  var ca = document.cookie.split(';');
	  for(var i=0;i < ca.length;i++) {
	
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) {
		  return decodeURIComponent( c.substring(nameEQ.length,c.length) );
		}
	
	  }
	  return null;

}


