<?php

$xml = simplexml_load_file('prueba2.xml');
$ns = $xml->getNamespaces(true);
$xml->registerXPathNamespace('c', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);

//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){
echo $cfdiComprobante['Version']. "<br />";
echo "
";
echo $cfdiComprobante['CondicionesDePago']. "<br />";
echo "
";
echo $cfdiComprobante['Fecha']. "<br />";
echo "
";
echo $cfdiComprobante['Folio']. "<br />";
echo "
";
echo $cfdiComprobante['FormaPago']. "<br />";
echo "
";
echo $cfdiComprobante['LugarExpedicion']. "<br />";
echo "
";
echo $cfdiComprobante['MetodoPago']. "<br />";
echo "
";
echo $cfdiComprobante['Moneda']. "<br />";
echo "
";
echo $cfdiComprobante['Serie']. "<br />";
echo "
";
echo $cfdiComprobante['SubTotal']. "<br />";
echo "
";
echo $cfdiComprobante['TipoCambio']. "<br />";
echo "
";
echo $cfdiComprobante['TipoDeComprobante']. "<br />";
echo "
";
echo $cfdiComprobante['Total']. "<br />";
echo "
";
echo $cfdiComprobante['Certificado']. "<br />";
echo "
";
echo $cfdiComprobante['NoCertificado']. "<br />";
echo "
";
echo $cfdiComprobante['Sello']. "<br />";
echo "
";
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
echo $Emisor['Rfc']. "<br />";
echo "
";
echo $Emisor['Nombre']. "<br />";
echo "
";
echo $Emisor['RegimenFiscal']. "<br />";
echo "
";
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
echo $Receptor['Rfc']. "<br />";
echo "
";
echo $Receptor['Nombre']. "<br />";
echo "
";
echo $Receptor['UsoCFDI']. "<br />";
echo "
";
}
//////////////////// START cfdi:Conceptos ////////////////////
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){
echo "
";
echo $Concepto['Cantidad']. "<br />";
echo "
";
echo $Concepto['Unidad']. "<br />";
echo "
";
echo $Concepto['NoIdentificacion']. "<br />";
echo "
";
echo $Concepto['Descripcion']. "<br />";
echo "
";
echo $Concepto['ValorUnitario']. "<br />";
echo "
";
echo $Concepto['Importe']. "<br />";
echo "
";
echo $Concepto['ClaveProdServ']. "<br />";
echo "
";
echo $Concepto['ClaveUnidad']. "<br />";
echo "
";
echo "
";
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){
echo $Traslado['Base']. "<br />";
echo "
";
echo $Traslado['Impuesto']. "<br />";
echo "
";
echo $Traslado['TipoFactor']. "<br />";
echo "
";
echo $Traslado['TasaOCuota']. "<br />";
echo "
";
echo $Traslado['Importe']. "<br />";
echo "
";
echo "
";
}

//////////////////// END cfdi:Conceptos ////////////////////

//////////////////// START cfdi:Impuestos (TotalImpuestosTrasladados) ////////////////////
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos') as $Impuestos){
echo "
";
echo $Impuestos['TotalImpuestosTrasladados']. "<br />";
echo "
";
echo "
";

}
//////////////////// END cfdi:Impuestos (TotalImpuestosTrasladados) ////////////////////

foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
echo $tfd['Version']. "<br />";
echo "
";
echo $tfd['UUID']. "<br />";
echo "
";
echo $tfd['FechaTimbrado']. "<br />";
echo "
";
echo $tfd['RfcProvCertif']. "<br />";
echo "
";
echo $tfd['SelloCFD']. "<br />";
echo "
";
echo $tfd['NoCertificadoSAT']. "<br />";
echo "
";
echo $tfd['SelloSAT']. "<br />";
}




?>
