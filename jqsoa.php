<html>
    <head>
        <title></title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
    
<!-- JS -->		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="wizdler/scripts/popup.js"></script>
		<script src="wizdler/scripts/wsdl.js"></script>
    	<script type="text/javascript">

			function doit4me() {
			
				App.getWSDL(App.onReceiveWSDL);
				alert("doit4me");
			}
			
			function CallService()
			{


				var xhr = new XMLHttpRequest;
				xhr.onreadystatechange = function() {
					if (xhr.readyState == 4) {
						if (xhr.status === 200 || xhr.status === 0) {
							alert(xhr.responseText);
							/*sendResponse({
								type: 'success',
								args: [xhr.responseText]
							});*/
						} else {
							/*sendResponse({
								type: 'error'
							});*/
						}
					}
				}
				//xhr.open("POST", "http://190.145.7.93:8812/HostServicioSelector.svc?singleWsdl", true); NO SE PUEDE
				xhr.open("POST", "http://uzupisweb001.azurewebsites.net/Service1.svc?wsdl", true);
				
				//if (command.contentType)
					//request.setRequestHeader('Content-Type', "text/xml; charset=utf-8");

				var headers = { "SOAPAction": "\"http://tempuri.org/IService1/hola\"", "Content-Type": "text/xml; charset=\"UTF-8\"" };
				if (headers)
					for (var x in headers)
						if (headers.hasOwnProperty(x))
							xhr.setRequestHeader(x, headers[x]);

				xhr.send("<Envelope xmlns=\"http://schemas.xmlsoap.org/soap/envelope/\"><Body><hola xmlns=\"http://tempuri.org/\"><oficina>1</oficina></hola></Body></Envelope>");
				
				
				

				
				//alert(xmlHTTP.responseXML.xml);
				//var resp = unescape(xmlHTTP.responseXML.xml);

			}
			//Función que se ejecuta si realizó completa la petición
			function OnSuccess(data, status)
			{
					//Aquí mostramos el valor que aparece en la etiqueta "PrimerNombre" del cuerpo de respuesta
					alert("OK");
			}
			function OnError(request, status, error)  //Función que se ejecuta si ocurre algún error
			{
				alert("KO");
			}
			$(function() {
				//Evita problemas de cross-domain con JQuery
				jQuery.support.cors = true;
			});
			
		</script>
    
        <form method="post" action="">
          <div>
          <div id="juan" />
          <input type="button" value="Jquery" onclick="CallService(); return false;" />
          </div>
       </form>
    </body>
</html>