<?php 

header ("Content-Type: text; charset=\"UTF-8\"");
$client = new SoapClient("http://uzupisweb001.azurewebsites.net/Service1.svc?wsdl");
$parameters= array("value"=>1);
$result = $client->GetData($parameters);

/*$client = new SoapClient("http://190.145.7.93:8812/HostServicioSelector.svc?wsdl");
$parameters= array("idSelector"=>1);
$result = $client->ObtenerColasXSelectorXJornadaActual ($parameters);*/

echo json_encode($result);

//echo "ho";
?>