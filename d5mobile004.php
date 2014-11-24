<!doctype html>
<html lang="en" class="a" ng-app="d5mobile">

	<head>
		<meta charset="UTF-8">
		<title>Digiturno 5 Mobile</title>
		<style>
		.angular-google-map {
				display: block;
			}
		</style>
	</head>
    <body>

<?php

// SOA
			$url = "http://www.projectrevista.com/d5soa.php?entidad=" . $_REQUEST['entidad'] . "&servicio=" . $_REQUEST['servicio'] . "&oficina=" . $_REQUEST['oficina'];
			$ch=curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_HTTPHEADER,array(		
			'Accept:text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
			'Accept-Language:es-ES,es;q=0.8',
			'Cache-Control:max-age=0',
			'Connection:keep-alive',
			'Cookie:__utma=270255792.607889995.1409416147.1409425125.1409430335.3; __utmz=270255792.1409416147.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)',
			'User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_7_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/36.0.1985.143 Safari/537.36'));

			$result = trim(curl_exec($ch));
			curl_close($ch);
?>

<!-- BOOTSTRAP -->	

<link rel="stylesheet" href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css">
<link rel="stylesheet" href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css">
<link rel="stylesheet" href="http://getbootstrap.com/2.3.2/assets/css/docs.css">
<link rel="stylesheet" href="http://getbootstrap.com/2.3.2/assets/js/google-code-prettify/prettify.css">

<link rel="stylesheet" href="http://www.projectrevista.com/css/d5_css_modal.css">

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- ANGULARJS -->		
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-rc.0/angular.min.js"></script>

<!-- GOOGLE MAPS -->	
		<script src="http://maps.googleapis.com/maps/api/js?sensor=false&language=en"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular.min.js"></script>
		<script src="http://www.projectrevista.com/angular-google-maps.js"></script>

<!-- JS -->		
    	<script type="text/javascript">

<!-- PLACES -->
			//var text = '{"id":1,"entidades":[{"nombre": "bbc", "oficinas":[{"id":1,"nombre":"zona t","gps":{"latitud":4,"longitud":-73}},{"id":2,"nombre":"parque 93 t","gps":{"latitud":4,"longitud":-72}}]},{"nombre": "janine", "oficinas":[{"id":3,"nombre":"salitre plaza t","gps":{"latitud":4,"longitud":-74}},{"id":4,"nombre":"portal 80","gps":{"latitud":4,"longitud":-75}}]}]}';
			var client;					
			client = JSON.parse('<?php echo $result; ?>');
			var turn  = new Array();	

<!-- MAP -->
			var module = angular.module("d5mobile", ["google-maps"]);

			function D5Ctrl ($scope, $http) {

				//setTimeout(function() { // X ALGUNA RAZON HAY UN LOOP INFINITO SIN SETTIMEOUT
					
					//$http.get('http://www.projectrevista.com/d5soa.php?entidad=bbc').
					//success(function(data) {
					
						//client = JSON.parse(text);
						//alert("estoy en success");
					//});
					
				//}, 1);		
				var inventoryCIEL = [];
				if ( client.entidades.length > 0 ) {
				
					var i, j ;
					for (i = 0; i < client.entidades.length; i++) {
					
						for (j = 0; j < client.entidades[i].oficinas.length; j++) {
						
							//alert(client.entidades[i].oficinas[j].direccion);
							inventoryCIEL.push( { "turn":0, "entity": client.entidades[i].nombre, "latitude": client.entidades[i].oficinas[j].gps.latitud, "longitude": client.entidades[i].oficinas[j].gps.longitud, "name" : client.entidades[i].oficinas[j].nombre, "address" : client.entidades[i].oficinas[j].direccion, "schedule" : client.entidades[i].oficinas[j].horario, "delay" : client.entidades[i].oficinas[j].demora, "id" : client.entidades[i].oficinas[j].id, "service" : client.entidades[i].oficinas[j].servicio } ); // NO SE PUEDE PASAR EL OBJETO oficinas[j]
						}
					}				
				}
				
				var servicios = new Array();
				for (i = 0; i < client.servicios.length; i++) {
				
					servicios[servicios.length] = client.servicios[i]; 
				}
				$scope.servicios = servicios;

				angular.extend($scope, { // CREA MAPA
					centerProperty: {
						lat: 4.69,
						lng: -74.055
					},
					zoomProperty: 12,
					markersProperty: inventoryCIEL,
					clickedLatitudeProperty: null,	
					clickedLongitudeProperty: null,
				});

				pB = "aqui";
				if ( client.turno != null ) {
				
					$('#modal_turn').modal();
					$('#turn_num_text').html( client.turno.numero );
					$('#turn_terminal_text').html( client.turno.terminal );
					$('#turn_time_text').html( client.turno.cuando );
					pB = client.turno.donde;
				}
			}

			$( document ).ready(function() {
				
			});

			function hola($scope) {
			
				alert("hi");
			} 

    	</script>

<!-- CABEZOTE -->
			<div class="navbar-fixed-top"  style="margin-top:20px;">
			<div class="navbar-inner" style="text-align:center; background-color:#ffffff; background-image:none;">
			<a class="brand banner" href="#"><img src="http://www.projectrevista.com/images/d5/d5_logo_digiturno.jpg" style="width:128px; height:49px;" ng-click="hola" >
			5 Mobile</a>
			</div>
			</div>

<!-- MAP HTML -->		
		<div ng-controller="D5Ctrl">
    
<!-- ICONOS -->
			<div class="container">
			<br/>
			<a class="pull-left" href="#modal_entidad" data-target="#modal_entidad" data-toggle="modal">
				<span class="glyphicon glyphicon-search">Entidades</span>
			</a>
			<a class="pull-right" href="#modal_servicio" data-target="#modal_servicio" data-toggle="modal">
				<span class="glyphicon glyphicon-search">Servicios</span>
			</a>
			</div>
			<br/>

<!-- MODAL -->

<!-- Modal entidad -->
<div id="modal_entidad" class="modal" role="dialog" tabindex="-1" data-width="420px" aria-labelledby="myModalLabel" style="display: none; top:120px; ">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" >×</button>
    <h3 id="myModalLabel" class="cabezon">Desea un servicio con ...</h3>
  </div>
	<a class="pull-left" href="http://www.projectrevista.com/d5mobile004.php?entidad=davivienda"><img src="http://www.projectrevista.com/images/d5/d5_logo_davivienda.jpg" style="width:164px; height:63px; margin-left:30%;" ng-click="hola" ></a>  
	<a class="pull-left" href="http://www.projectrevista.com/d5mobile004.php?entidad=colmedica"><img src="http://www.projectrevista.com/images/d5/d5_logo_colmedica.jpg" style="width:164px; height:63px; margin-left:30%;" ng-click="hola" ></a>
	<a class="pull-left" href="http://www.projectrevista.com/d5mobile004.php?entidad=bancodebogota"><img src="http://www.projectrevista.com/images/d5/d5_logo_banco_bogota.jpg" style="width:164px; height:63px; margin-left:30%;" ng-click="hola" ></a>
	<a class="pull-left" href="http://www.projectrevista.com/d5mobile004.php?entidad=movistar"><img src="http://www.projectrevista.com/images/d5/d5_logo_movistar.jpg" style="width:164px; height:63px; margin-left:30%;" ng-click="hola" ></a>
</div>

<!-- Modal servicio -->
<div id="modal_servicio" class="modal" role="dialog" tabindex="-1" data-width="198px" aria-labelledby="myModalLabel" style="display: none; top:120px; ">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" >×</button>
    <h3 id="myModalLabel" class="cabezon">Desea un servicio de ...</h3>
  </div>
	<a class="peon" ng-repeat="servicio in servicios" href="http://www.projectrevista.com/d5mobile004.php?entidad=<?php echo $entidad; ?>&servicio={{servicio.soa}}" style="margin-left:30%;">{{servicio.nombre}}<br/></a>
</div>

<!-- Modal oficina -->
<div id="modal_office" class="modal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none; width:524;
				  height:550; top:120px;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" >×</button>
    <h3 id="office_name"  class="cabezon"></h3>
  </div>
  <div class="modal-header">
    <h3 id="office_address" class="peon"></h3>
    <h3 id="office_schedule" class="peon"></h3>
    <h3 id="office_delay" class="peon"></h3>
    <h3 id="office_turn" class="peon"></h3>
    <input type="hidden" id="office_id" value=""/>
  </div>
</div>

<!-- Modal turno -->
<div id="modal_turn" class="modal" role="dialog" tabindex="-1" aria-labelledby="myModalLabel" style="display: none; width:524;
				  height:550; top:120px;">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" >×</button>
    <h3 id="office_name"  class="cabezon"></h3>
  </div>
  <div class="modal-header">
    <h3 id="turn_num_label" class="cabezon">Ud. tiene el turno No. </h3>
    <h3 id="turn_num_text" class="turno"></h3><br/>
    <h3 id="turn_terminal_label" class="cabezon">será atendido en la terminal No. </h3>
    <h3 id="turn_terminal_text" class="terminal"></h3><br/>
    <h3 id="turn_time_label" class="cabezon">en un tiempo de</h3>
    <h3 id="turn_time_text" class="terminal"></h3>
  </div>
</div>

<br/>

			<google-map
				center="centerProperty"
				zoom="zoomProperty" 
				markers="markersProperty"
				latitude="clickedLatitudeProperty"
				longitude="clickedLongitudeProperty"
				mark-click="true"
				draggable="true"
				style="height: 450px; width: 100%">
			</google-map>
		</div>
	</body>
</html>