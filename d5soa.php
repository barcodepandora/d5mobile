
<?php

$json = null;
$entidad = "";
$servicio = "";
$oficina_turno = null;
//echo $_SERVER['REQUEST_METHOD'];
if($_SERVER['REQUEST_METHOD'] == "GET") {

	session_start();
	if(isset($_REQUEST['entidad'])){ 
	
		$entidad = $_REQUEST['entidad'];
	}
	if(isset($_REQUEST['servicio'])){ 
	
		$servicio_get = $_REQUEST['servicio'];
	}	
	if(isset($_REQUEST['oficina'])){ 
	
		$oficina_turno = $_REQUEST['oficina'];
	}
	//echo $entidad;
	$entidades = array();
	$servicios = array();

// COLMEDICA
	if ( $entidad == "colmedica") {

		$oficinas = array();

		if ( $servicio_get == "cita" || $servicio_get == "" ) {

			$gps = array("latitud" => 4.675490, "longitud" => -74.054559);
			$oficina = array("id" => 1, "nombre" => "Calle 90", "gps" => $gps, "servicio" => "Cita prioritaria", "direccion" => "Carrera 17 No. 90-13", "horario" => "6:30am a 8pm", "demora" => "15 minutos");
			array_push( $oficinas, $oficina );

			$gps = array("latitud" => 4.721980, "longitud" => -74.043140);
			$oficina = array("id" => 2, "nombre" => "Cedritos", "gps" => $gps, "servicio" => "Cita prioritaria", "direccion" => "Carrera 16a No. 137-97", "horario" => "6:30am a 7pm", "demora" => "20 minutos");
			array_push( $oficinas, $oficina );
		}
		if ( $servicio_get == "odontologia" ) {

			$gps = array("latitud" => 4.668478, "longitud" => -74.058365);
			$oficina = array("id" => 3, "nombre" => "Calle 82", "gps" => $gps, "servicio" => "Odontologia", "direccion" => "calle 82 No. 18–31 ", "horario" => "6:30am a 8pm", "demora" => "15 minutos");
			array_push( $oficinas, $oficina );	
		}		
		$entidad = array("nombre" => "colmedica", "oficinas" => $oficinas);
		array_push( $entidades, $entidad );	
		
		// cargamos servicios de la entidad
		$servicio = array("soa" => "cita", "nombre" => "Cita prioritaria");
		array_push( $servicios, $servicio );
		$servicio = array("soa" => "odontologia", "nombre" => "Odontologia");
		array_push( $servicios, $servicio );
		
	}

// BANCO DE BOGOTA
	if ( $entidad == "bancodebogota") {

		$oficinas = array();

		if ( $servicio_get == "credito" || $servicio_get == "" ) {

			$gps = array("latitud" => 4.623145, "longitud" => -74.067310);
			$oficina = array("id" => 4, "nombre" => "Oficina principal", "gps" => $gps, "servicio" => "Credito", "direccion" => "Carrera 13 No. 38-60 ", "horario" => "9am a 3:30pm", "demora" => "10 minutos");
			array_push( $oficinas, $oficina );
		}
		if ( $servicio_get == "extendido" ) {

			$gps = array("latitud" => 4.648378, "longitud" => -74.100744);
			$oficina = array("id" => 5, "nombre" => "Gran Estacion", "gps" => $gps, "servicio" => "Horario extendido", "direccion" => "Calle 26 No. 62-47 Local 102", "horario" => "9am a 3:30pm 5pm a 8pm", "demora" => "20 minutos");
			array_push( $oficinas, $oficina );
		}		
		$entidad = array("nombre" => "bancodebogota", "oficinas" => $oficinas);
		array_push( $entidades, $entidad );	
		
		// cargamos servicios de la entidad
		$servicio = array("soa" => "credito", "nombre" => "Credito");
		array_push( $servicios, $servicio );
		$servicio = array("soa" => "extendido", "nombre" => "Horario extendido");
		array_push( $servicios, $servicio );
	}

// MOVISTAR
	if ( $entidad == "movistar") {

		$oficinas = array();

		if ( $servicio_get == "experiencia" || $servicio_get == "" ) {

			$gps = array("latitud" => 4.618373, "longitud" => -74.069448);
			$oficina = array("id" => 6, "nombre" => "Bogotá Calle 26", "gps" => $gps, "servicio" => "Centro de experiencia", "direccion" => "Calle 26 No. 32A - 33 Local 102 Edificio Tacay", "horario" => "9am a 6pm", "demora" => "30 minutos");
			array_push( $oficinas, $oficina );

			$gps = array("latitud" => 4.698713, "longitud" => -74.048892);
			$oficina = array("id" => 7, "nombre" => "Bogotá Calle 116", "gps" => $gps, "servicio" => "Centro de experiencia", "direccion" => "Calle 116 No. 18 - 71", "horario" => "9am a 7pm", "demora" => "20 minutos");
			array_push( $oficinas, $oficina );
		}
		if ( $servicio_get == "venta") {

			$gps = array("latitud" => 4.618373, "longitud" => -74.069448);
			$oficina = array("id" => 8, "nombre" => "Bogotá Calle 26", "gps" => $gps, "servicio" => "Punto de venta autorizado", "direccion" => "Calle 26 No. 32A - 33 Local 102 Edificio Tacay", "horario" => "9am a 6pm", "demora" => "30 minutos");
			array_push( $oficinas, $oficina );
		}		
		$entidad = array("nombre" => "bbc", "oficinas" => $oficinas);
		array_push( $entidades, $entidad );	
		
		// cargamos servicios de la entidad
		$servicio = array("soa" => "experiencia", "nombre" => "Centro de experiencia");
		array_push( $servicios, $servicio );
		$servicio = array("soa" => "venta", "nombre" => "Punto de venta autorizado");
		array_push( $servicios, $servicio );	
	}		

// DAVIVIENDA
	if ( $entidad == "davivienda") {

		$oficinas = array();

		if ( $servicio_get == "recaudos" || $servicio_get == "" ) {

			$gps = array("latitud" => 4.613358, "longitud" => -74.071530);
			$oficina = array("id" => 9, "nombre" => "Centro Internacional", "gps" => $gps, "servicio" => "Recaudos", "direccion" => "Carrera 13 No. 26-15", "horario" => "7am a 4pm", "demora" => "7 minutos");
			array_push( $oficinas, $oficina );

			$gps = array("latitud" => 4.721980, "longitud" => -74.043066);
			$oficina = array("id" => 10, "nombre" => "Unicentro", "gps" => $gps, "servicio" => "Recaudos", "direccion" => "Avenida 15 No. 119-88", "horario" => "8am a 7pm", "demora" => "5 minutos");
			array_push( $oficinas, $oficina );
		}
		if ( $servicio_get == "gs" ) {

			$gps = array("latitud" => 4.753869, "longitud" =>  -74.044718);
			$oficina = array("id" => 11, "nombre" => "Exito Norte", "gps" => $gps, "servicio" => "Grandes superficies", "direccion" => "Autopista Norte No. 173-98", "horario" => "9am a 4pm", "demora" => "8 minutos");
			array_push( $oficinas, $oficina );

			$gps = array("latitud" => 4.720552, "longitud" =>  -74.123982);
			$oficina = array("id" => 12, "nombre" => "Exito Occidente", "gps" => $gps, "servicio" => "Recaudos", "direccion" => "Carrera 114 B No. 78B-85", "horario" => "9am a 4pm", "demora" => "15 minutos");
			array_push( $oficinas, $oficina );
		}
		$entidad = array("nombre" => "davivienda", "oficinas" => $oficinas);
		array_push( $entidades, $entidad );	
		
		// cargamos servicios de la entidad
		$servicio = array("soa" => "recaudos", "nombre" => "Recaudos");
		array_push( $servicios, $servicio );
		$servicio = array("soa" => "gs", "nombre" => "Grandes Superficies");
		array_push( $servicios, $servicio );
	}


// OFICINA
	$turno = null;
	if ( $oficina_turno > 0 ) {

/*
PEDIR UN TURNO
header ("Content-Type: text");
$client = new SoapClient("http://uzupisweb001.azurewebsites.net/Service1.svc?singlewsdl");
$result = $client->hola($oficina_turno);
*/
		// obtener oficinas
		$oficinas = json_decode("{ \"ObtenerOficinasSistemaResult\":{\"wendy\" : 2001,\"Oficina\":[{\"Id\":23,\"Nombre\":\"CE AGUACHICA\"}]}}");
		
		// obtener selectores
		$oficinas = json_decode('{ "wendy" : 2012, "ObtenerSelectoresXOficinaResult":{"Selector":[{"Activo":true,"BalanceaEntreSalas":false,"BuscarCola":0,"CamposAdicionales":0,"CancelarTurno":0,"ConImpresion":0,"DatosUsuario":0,"Descripcion":"M AvSuba - Selector 01","Distribucionentes":0,"EstadisticasEntes":0,"GeneraTurnosA":"Sala","GenerarConteo":0,"Habilitado":true,"Id":1,"InformacionAdicional":0,"ModoDeTrabajo":0,"Nombre":"M AvSuba - Selector 01","SinImpresion":0},{"Activo":true,"BalanceaEntreSalas":false,"BuscarCola":0,"CamposAdicionales":0,"CancelarTurno":0,"ConImpresion":0,"DatosUsuario":0,"Descripcion":"M AvSuba - Selector 02","Distribucionentes":0,"EstadisticasEntes":0,"GeneraTurnosA":"Sala","GenerarConteo":0,"Habilitado":true,"Id":2,"InformacionAdicional":0,"ModoDeTrabajo":0,"Nombre":"M AvSuba - Selector 02","SinImpresion":0}]} }');
		
		// obtener colas
		$oficinas = json_decode('{"ObtenerColasXSelectorXJornadaActualResult":{"Cola":[{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":1974,"IdNodo":69,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":69,"Nombre":""},"Nombre":"FE - Cambio Equipo - Reno Equipo","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":3,"IdNodo":70,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":70,"Nombre":""},"Nombre":"FE - Cambio Equipo - Repo SIM","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":32,"IdNodo":10,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":10,"Nombre":""},"Nombre":"FE - Fidelizaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":35,"IdNodo":11,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":11,"Nombre":""},"Nombre":"FE - Gu\u00eda","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":28,"IdNodo":51,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":51,"Nombre":""},"Nombre":"FE - Mi Cuenta - Consultas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":60,"IdNodo":52,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":52,"Nombre":""},"Nombre":"FE - Mi Cuenta - Modificaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":29,"IdNodo":53,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":53,"Nombre":""},"Nombre":"FE - Mi Cuenta - Reimpresi\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":36,"IdNodo":13,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":13,"Nombre":""},"Nombre":"FE - Solicitudes Sobre Tu l\u00ednea","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":37,"IdNodo":14,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":14,"Nombre":""},"Nombre":"FE - STP","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":38,"IdNodo":15,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":15,"Nombre":""},"Nombre":"FE - Ventas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":39,"IdNodo":71,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":71,"Nombre":""},"Nombre":"FG - Cambio Equipo - Reno Equipo","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"J","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":40,"IdNodo":72,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":72,"Nombre":""},"Nombre":"FG - Cambio Equipo - Repo SIM","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"U","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":43,"IdNodo":17,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":17,"Nombre":""},"Nombre":"FG - Fidelizaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"O","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":44,"IdNodo":18,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":18,"Nombre":""},"Nombre":"FG - Gu\u00eda","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"N","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":41,"IdNodo":54,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":54,"Nombre":""},"Nombre":"FG - Mi Cuenta - Consultas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"L","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":45,"IdNodo":55,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":55,"Nombre":""},"Nombre":"FG - Mi Cuenta - Modificaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"W","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":42,"IdNodo":56,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":56,"Nombre":""},"Nombre":"FG - Mi Cuenta - Reimpresi\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"T","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":46,"IdNodo":20,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":20,"Nombre":""},"Nombre":"FG - Solicitudes Sobre Tu l\u00ednea","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"M","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":47,"IdNodo":21,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":21,"Nombre":""},"Nombre":"FG - STP","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"K","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":48,"IdNodo":22,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":22,"Nombre":""},"Nombre":"FG - Ventas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"I","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":49,"IdNodo":73,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":73,"Nombre":""},"Nombre":"FP - Cambio Equipo - Reno Equipo","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"B","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":50,"IdNodo":74,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":74,"Nombre":""},"Nombre":"FP - Cambio Equipo - Repo SIM","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"S","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":54,"IdNodo":24,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":24,"Nombre":""},"Nombre":"FP - Fidelizaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"H","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":55,"IdNodo":25,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":25,"Nombre":""},"Nombre":"FP - Gu\u00eda","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"G","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":51,"IdNodo":57,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":57,"Nombre":""},"Nombre":"FP - Mi Cuenta - Consultas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"D","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":53,"IdNodo":58,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":58,"Nombre":""},"Nombre":"FP - Mi Cuenta - Modificaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"V","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":52,"IdNodo":59,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":59,"Nombre":""},"Nombre":"FP - Mi Cuenta - Reimpresi\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"R","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":56,"IdNodo":27,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":27,"Nombre":""},"Nombre":"FP - Solicitudes Sobre Tu l\u00ednea","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"F","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":57,"IdNodo":28,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":28,"Nombre":""},"Nombre":"FP - STP","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"C","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":58,"IdNodo":29,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":29,"Nombre":""},"Nombre":"FP - Ventas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"A","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":2,"IdNodo":75,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":75,"Nombre":""},"Nombre":"ME - Cambio Equipo - Reno Equipo","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":4,"IdNodo":76,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":76,"Nombre":""},"Nombre":"ME - Cambio Equipo - Repo SIM","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":7,"IdNodo":31,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":31,"Nombre":""},"Nombre":"ME - Fidelizaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":8,"IdNodo":32,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":32,"Nombre":""},"Nombre":"ME - Gu\u00eda","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":5,"IdNodo":60,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":60,"Nombre":""},"Nombre":"ME - Mi Cuenta - Consultas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":59,"IdNodo":61,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":61,"Nombre":""},"Nombre":"ME - Mi Cuenta - Modificaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":6,"IdNodo":62,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":62,"Nombre":""},"Nombre":"ME - Mi Cuenta - Reimpresi\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":9,"IdNodo":34,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":34,"Nombre":""},"Nombre":"ME - Solicitudes Sobre Tu l\u00ednea","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":10,"IdNodo":35,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":35,"Nombre":""},"Nombre":"ME - STP","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":11,"IdNodo":36,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":36,"Nombre":""},"Nombre":"ME - Ventas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"E","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":12,"IdNodo":77,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":77,"Nombre":""},"Nombre":"MG - Cambio Equipo - Reno Equipo","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"J","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":13,"IdNodo":78,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":78,"Nombre":""},"Nombre":"MG - Cambio Equipo - Repo SIM","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"U","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":16,"IdNodo":38,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":38,"Nombre":""},"Nombre":"MG - Fidelizaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"O","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":17,"IdNodo":39,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":39,"Nombre":""},"Nombre":"MG - Gu\u00eda","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"N","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":14,"IdNodo":63,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":63,"Nombre":""},"Nombre":"MG - Mi Cuenta - Consultas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"L","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":18,"IdNodo":64,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":64,"Nombre":""},"Nombre":"MG - Mi Cuenta - Modificaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"W","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":15,"IdNodo":65,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":65,"Nombre":""},"Nombre":"MG - Mi Cuenta - Reimpresi\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"T","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":19,"IdNodo":41,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":41,"Nombre":""},"Nombre":"MG - Solicitudes Sobre Tu l\u00ednea","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"M","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":20,"IdNodo":42,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":42,"Nombre":""},"Nombre":"MG - STP","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"K","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":21,"IdNodo":43,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":43,"Nombre":""},"Nombre":"MG - Ventas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"I","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":22,"IdNodo":79,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":79,"Nombre":""},"Nombre":"MP - Cambio Equipo - Reno Equipo","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"B","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":23,"IdNodo":80,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":80,"Nombre":""},"Nombre":"MP - Cambio Equipo - Repo SIM","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"S","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":26,"IdNodo":45,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":45,"Nombre":""},"Nombre":"MP - Fidelizaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"H","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":27,"IdNodo":46,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":46,"Nombre":""},"Nombre":"MP - Gu\u00eda","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"G","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":24,"IdNodo":66,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":66,"Nombre":""},"Nombre":"MP - Mi Cuenta - Consultas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"D","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":30,"IdNodo":67,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":67,"Nombre":""},"Nombre":"MP - Mi Cuenta - Modificaci\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"V","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":25,"IdNodo":68,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":68,"Nombre":""},"Nombre":"MP - Mi Cuenta - Reimpresi\u00f3n","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"R","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":31,"IdNodo":48,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":48,"Nombre":""},"Nombre":"MP - Solicitudes Sobre Tu l\u00ednea","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"F","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":33,"IdNodo":49,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":49,"Nombre":""},"Nombre":"MP - STP","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"C","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0},{"CantidadMaximaServiciosEnEspera":0,"CantidadMaximaTurnosXDia":0,"CostoFijo":0,"CostoVariable":0,"Descripcion":"","Estadistica":null,"GrupoPersonalizado":null,"Id":34,"IdNodo":50,"LlaveSubrrogada":0,"Nodo":{"Cola":null,"Elemento":null,"Estado":false,"Hijos":null,"Id":50,"Nombre":""},"Nombre":"MP - Ventas","Numerador":{"Fin":0,"Id":0,"Inicio":0,"Nombre":null,"NumeroActual":0,"Prefijo":"A","ReiniciarAlCambioDeDia":false,"RellenarNumeroConCeros":false},"OtrosCostos":0,"TiempoEstadisticas":0}]}}');

		//obtener salas
		$oficinas = json_decode('{"ObtenerSalasDeSelectorResult":{"Sala":{"CantidadDeLLamados":0,"CostoFijo":0,"Descripcion":null,"Grupos":null,"Id":321,"IndiceOcupacion":0,"MaximoOcupacion":0,"Nombre":"M AvSuba - Sala  01","OcupacionActual":0,"Oficina":null,"PasoAutomaticoADistraido":false,"Tableros":null,"TiempoAbandono":"PT0S","TiempoAutomaticoADistraido":"PT0S","TiempoDeRellamado":"PT0S"}}}');

		// pedir turno
		//$turno = array("numero" => $oficinas->{'ObtenerOficinasSistemaResult'}->{'Oficina'}[0]->{"Id"}, "terminal" => "T01", "cuando" => "20 minutos");
		//$turno = array("numero" => $oficinas->{'ObtenerSelectoresXOficinaResult'}->{'Selector'}[0]->{"Id"}, "terminal" => "T01", "cuando" => "20 minutos");
		//$turno = array("numero" => $oficinas->{'ObtenerColasXSelectorXJornadaActualResult'}->{'Cola'}[0]->{"Id"}, "terminal" => "T01", "cuando" => "20 minutos");
		//$turno = array("numero" => $oficinas->{'ObtenerSalasDeSelectorResult'}->{'Sala'}->{"Id"}, "terminal" => "T01", "cuando" => "20 minutos");	
		//$turno = array("numero" => $oficinas->{'wendy'}, "terminal" => "T01", "cuando" => "20 minutos");

		$turno_id = 0;
		$donde = "";
		$dbhandle = mysql_connect("mysql1009.ixwebhosting.com", "A879963_undtrail", "Bce38be442");		
		//select a database to work with
		$selected = mysql_select_db("A879963_under_pruebas",$dbhandle) ;
		//execute the SQL query and return records
		$result = mysql_query("SELECT turno, gps FROM turnos WHERE oficina = " . strval($oficina_turno));		
		//fetch tha data from the database 
		
		while ($row = mysql_fetch_array($result)) {
		  $turno_id = $row{turno};
		  $donde = $row{gps};
		}
		$turno_id++;
		mysql_query("UPDATE turnos SET turno = " . strval($turno_id) . " WHERE oficina = " . strval($oficina_turno), $dbhandle);
		
		//close the connection
		mysql_close($dbhandle);
		
// PEDIMOS UN TURNO EN DIGITURNO SOLO PARA DAVIVIENDA
		if ( $oficina_turno == 10 ) {

			header ("Content-Type: text; charset=\"UTF-8\"");
			$client = new SoapClient("http://uzupisweb001.azurewebsites.net/Service1.svc?wsdl");
			$parameters= array( "value" => 1 );
			$result = $client->GetData($parameters);
			//echo json_encode($result);
			$turno_id = substr($result->{'GetDataResult'}, 13);
		}
		
		$turno = array("numero" => $turno_id, "terminal" => "Sala 01", "cuando" => "20 minutos", donde => $donde);	
	}
	
	$json = array("id" => 1, "entidades" => $entidades, "servicios" => $servicios, "turno" => $turno);
	header('Content-type: application/json');
	echo json_encode($json);
}
?>