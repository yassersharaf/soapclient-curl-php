<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use SoapClientCurl\SoapClientRequest;

// Clave de Acceso para una factura de Esdinamico en Pruebas
$claveAccesoComprobante = '1302201501179188978900110010010000100520001005215';

// Ambiente de prueba de SRI
$url = 'https://celcer.sri.gob.ec/comprobantes-electronicos-ws/AutorizacionComprobantes';

// Cuerpo del SOAP para la consulta
$body = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ec="http://ec.gob.sri.ws.autorizacion">
           <soapenv:Header/>
           <soapenv:Body>
              <ec:autorizacionComprobante>
                 <!--Optional:-->
                 <claveAccesoComprobante>'.$claveAccesoComprobante.'</claveAccesoComprobante>
              </ec:autorizacionComprobante>
           </soapenv:Body>
        </soapenv:Envelope>';

// Cabacera de la peticion
$headers = array('Content-Type: text/xml; charset=utf-8', 'Content-Length: '.strlen($body));

$result = SoapClientRequest::send($url,$headers, $body);

var_dump($result);