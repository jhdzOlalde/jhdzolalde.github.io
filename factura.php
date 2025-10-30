<?php

// Se inicializa la sesión

session_start();

/* Se comprueba si el usuario ha iniciado sesión, si no, se redirecciona

 a la página de inicio de sesión (login.php)*/

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

    header("location: login.php");

    exit;

}

/////////////////////////////////////////////////////////////////

$xml = simplexml_load_file('xml/prueba2.xml');
$ns = $xml->getNamespaces(true);
$xml->registerXPathNamespace('c', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);

//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){

    if  ($cfdiComprobante['MetodoPago'] == 'PUE'){
        $i=1;
    }

//echo $cfdiComprobante['CondicionesDePago']. "<br />";
//echo $cfdiComprobante['Serie']. "<br />";
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
}
//////////////////// START cfdi:Conceptos ////////////////////
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){

}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){

}

//////////////////// END cfdi:Conceptos ////////////////////

//////////////////// START cfdi:Impuestos (TotalImpuestosTrasladados) ////////////////////
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos') as $Impuestos){

}
//////////////////// END cfdi:Impuestos (TotalImpuestosTrasladados) ////////////////////

foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {

}

//////////////////////////////////////////////////////////////////

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acc</title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/facturas.css">
    <link rel="stylesheet" href="css/facturas.css">
</head>
<body>
<header>
<section class="navegador">
	<h1 class = "nombre">
		numero de cliente: <?php echo htmlspecialchars($_SESSION["id"]); ?>
	</h1>
	<img src="img/logo3.png" class= "acc" alt="">
	<h1 class= "cliente">
		Bienvenido <?php echo htmlspecialchars($_SESSION["username"]); ?>
	</h1>
</section>

</header>

<section class="contenedor">
<h2 class="titulo" > CFDI referenciado tipo <?php echo $cfdiComprobante['MetodoPago'] ?></h2>

<section class="descarga">
    <a class="la" href="xml/prueba2.xml" download="xml"> Descarga de XML</a>
    <a class="la" href="xml/cv.pdf" download="PDF"> Descarga de pdf</a>
</section>
<section class="descarga">
    <a href="">Pago de mensualidad</a>
</section>
    <h2>información</h2>
<div class="margen">

    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Conceptos</th>
                    <th>-</th>
                    
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td>version de CFDI</td>
                    <td> <?php echo $cfdiComprobante['Version'];?></td>
                   
                </tr>
                <tr>
                    <td>fecha</td>
                    <td><?php echo $cfdiComprobante['Fecha']; ?></td>
                </tr>
                <tr>
                    <td>Folio </td>
                    <td><?php echo $cfdiComprobante['Folio']; ?></td>
                </tr>
                <tr>
                    <td>formatos de pago</td>
                    <td><?php echo $cfdiComprobante['FormaPago']; ?></td>
                    
                </tr>
                <tr>
                    <td>Lugar de pago</td>
                    <td><?php echo $cfdiComprobante['LugarExpedicion']; ?> </td>
                </tr>
                <tr>
                    <td>Metodo de pago</td>
                    <td> <?php echo $cfdiComprobante['MetodoPago']; ?></td>
                    
                </tr>
                <tr>
                    <td>Noneda </td>
                    <td> <?php echo $cfdiComprobante['Moneda']; ?></td>
                    <section class="cfdi">
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td> <?php echo $cfdiComprobante['SubTotal']; ?></td>
                </tr>
                <tr>
                    <td>Tipo de cambio</td>
                    <td><?php echo $cfdiComprobante['TipoCambio']; ?></td>
                </tr>
                <tr>
                    <td>Tipo de comprobante </td>
                    <td><?php echo $cfdiComprobante['TipoDeComprobante']; ?> </td>
                    
                </tr>   
                <tr>
                    <td>Total</td>
                    <td><?php echo $cfdiComprobante['Total']; ?></td>
                </tr>
                <tr>
                    <td>certificado</td>
                    <td> <?php echo $cfdiComprobante['NoCertificado']; ?> </td>
                    
                </tr>
                <tr>
                    <td>no certificado </td>
                    <td><?php echo  $rest = substr($cfdiComprobante['Certificado'], 0, 15); ?></td>
                </tr>
                <tr>
                    <td>Sello </td>
                    <td><?php echo $rest = substr($cfdiComprobante['Sello'], 0, 15); ?></td>
                    
                </tr>
                <tr>
                    <td>RFC</td>
                    <td><?php echo $Emisor['Rfc']; ?></td>
                    
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><?php echo $Emisor['Nombre']; ?></td>
                    
                </tr>

                <tr>
                    <td>REGIMEN FISCAL</td>
                    <td><?php echo $Emisor['RegimenFiscal']; ?></td>
                    
                </tr>

                <tr>
                    <td>Cliente</td>
                    <td> <?php echo $Receptor['Rfc']; ?></td>
                </tr>
                <tr>
                    <td>Nombre Cliente</td>
                    <td><?php echo $Receptor['Nombre']; ?></td>
                </tr>
                <tr>
                    <td> Uso de CFDI </td>
                    <td>   <?php echo $Receptor['UsoCFDI']; ?>  </td>
                </tr>
                <tr>
                    <td>cantidad </td>
                    <td> <?php echo $Concepto['Cantidad']; ?>   </td>
                </tr>
                <tr>
                    <td>unidad </td>
                    <td>  <?php echo $Concepto['Unidad']; ?>  </td>
                </tr>
                <tr>
                    <td> no. identificacion</td>
                    <td>  <?php echo $Concepto['NoIdentificacion']; ?>   </td>
                </tr>
                <tr>
                    <td> descripcion</td>
                    <td> <?php echo $Concepto['Descripcion']; ?>   </td>
                </tr>
                <tr>
                    <td> valor unitario </td>
                    <td>  <?php echo $Concepto['ValorUnitario'];?>  </td>
                </tr>
                <tr>
                    <td> importe </td>
                    <td>   <?php echo $Concepto['Importe']; ?> </td>
                </tr>
                <tr>
                    <td> clave prod serv</td>
                    <td>  <?php echo $Concepto['ClaveProdServ'];?>   </td>
                </tr>
                <tr>
                    <td> clave de unidad</td>
                    <td>  <?php echo $Concepto['ClaveUnidad']; ?>   </td>
                </tr>
                <tr>
                    <td>base </td>
                    <td>  <?php echo $Traslado['Base']; ?>  </td>
                </tr>
                <tr>
                    <td>impuesto</td>
                    <td> <?php echo $Traslado['Impuesto']; ?>    </td>
                </tr>
                <tr>
                    <td>tipo factor </td>
                    <td>   <?php echo $Traslado['TipoFactor'];?>  </td>
                </tr>
                <tr>
                    <td>tasa couta  </td>
                    <td> <?php echo $Traslado['TasaOCuota']; ?>   </td>
                </tr>
                <tr>
                    <td> importe</td>
                    <td> <?php echo $Traslado['Importe'];?>    </td>
                </tr>
                <tr>
                    <td>impuestos trasladados </td>
                    <td>  <?php echo $Impuestos['TotalImpuestosTrasladados'];?>  </td>
                </tr>
                <tr>
                    <td>Version </td>
                    <td>   <?php echo $tfd['Version'];?>   </td>
                </tr>

                <tr>
                    <td> UUID</td>
                    <td>  <?php echo $tfd['UUID']; ?>   </td>
                </tr>
                <tr>
                    <td> FECHA DE TIMBRADO</td>
                    <td>   <?php echo $tfd['FechaTimbrado']; ?> </td>
                </tr>
                <tr>
                    <td>RFC PROVEDOR CERTIFICADO </td>
                    <td> <?php echo $tfd['RfcProvCertif']; ?>   </td>
                </tr>


                <tr>
                    <td> SELLO</td>
                    <td> <?php echo $rest = substr($tfd['SelloCFD'], 0, 4);?>    </td>
                </tr>

                <tr>
                    <td> No certificacion en el sat</td>
                    <td>  <?php echo $tfd['NoCertificadoSAT']; ?>  </td>
                </tr>

                <tr>
                    <td>Sello en el SAT </td>
                    <td>    <?php echo $rest = substr($tfd['SelloSAT'],0,5);?> </td>
                </tr>








                
            <tbody>
        </table>
    </div>







            <!----------------------------------------------------------------------
            





                --->

        
                <?php If ($i== 1)
                {
                ?>
               
                        
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Conceptos</th>
                    <th>-</th>
                    
                </tr> 
            </thead>
            <tbody>
                <tr>
                    <td>version de CFDI</td>
                    <td> <?php echo $cfdiComprobante['Version'];?></td>
                   
                </tr>
                <tr>
                    <td>fecha</td>
                    <td><?php echo $cfdiComprobante['Fecha']; ?></td>
                </tr>
                <tr>
                    <td>Folio </td>
                    <td><?php echo $cfdiComprobante['Folio']; ?></td>
                </tr>
                <tr>
                    <td>formatos de pago</td>
                    <td><?php echo $cfdiComprobante['FormaPago']; ?></td>
                    
                </tr>
                <tr>
                    <td>Lugar de pago</td>
                    <td><?php echo $cfdiComprobante['LugarExpedicion']; ?> </td>
                </tr>
                <tr>
                    <td>Metodo de pago</td>
                    <td> <?php echo $cfdiComprobante['MetodoPago']. $i; ?></td>
                    
                </tr>
                <tr>
                    <td>Noneda </td>
                    <td> <?php echo $cfdiComprobante['Moneda']; ?></td>
                    <section class="cfdi">
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td> <?php echo $cfdiComprobante['SubTotal']; ?></td>
                </tr>
                <tr>
                    <td>Tipo de cambio</td>
                    <td><?php echo $cfdiComprobante['TipoCambio']; ?></td>
                </tr>
                <tr>
                    <td>Tipo de comprobante </td>
                    <td><?php echo $cfdiComprobante['TipoDeComprobante']; ?> </td>
                    
                </tr>   
                <tr>
                    <td>Total</td>
                    <td><?php echo $cfdiComprobante['Total']; ?></td>
                </tr>
                <tr>
                    <td>certificado</td>
                    <td> <?php echo $cfdiComprobante['NoCertificado']; ?> </td>
                    
                </tr>
                <tr>
                    <td>no certificado </td>
                    <td><?php echo  $rest = substr($cfdiComprobante['Certificado'], 0, 15); ?></td>
                </tr>
                <tr>
                    <td>Sello </td>
                    <td><?php echo $rest = substr($cfdiComprobante['Sello'], 0, 15); ?></td>
                    
                </tr>
                <tr>
                    <td>RFC</td>
                    <td><?php echo $Emisor['Rfc']; ?></td>
                    
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td><?php echo $Emisor['Nombre']; ?></td>
                    
                </tr>

                <tr>
                    <td>REGIMEN FISCAL</td>
                    <td><?php echo $Emisor['RegimenFiscal']; ?></td>
                    
                </tr>

                <tr>
                    <td>Cliente</td>
                    <td> <?php echo $Receptor['Rfc']; ?></td>
                </tr>
                <tr>
                    <td>Nombre Cliente</td>
                    <td><?php echo $Receptor['Nombre']; ?></td>
                </tr>
                <tr>
                    <td> Uso de CFDI </td>
                    <td>   <?php echo $Receptor['UsoCFDI']; ?>  </td>
                </tr>
                <tr>
                    <td>cantidad </td>
                    <td> <?php echo $Concepto['Cantidad']; ?>   </td>
                </tr>
                <tr>
                    <td>unidad </td>
                    <td>  <?php echo $Concepto['Unidad']; ?>  </td>
                </tr>
                <tr>
                    <td> no. identificacion</td>
                    <td>  <?php echo $Concepto['NoIdentificacion']; ?>   </td>
                </tr>
                <tr>
                    <td> descripcion</td>
                    <td> <?php echo $Concepto['Descripcion']; ?>   </td>
                </tr>
                <tr>
                    <td> valor unitario </td>
                    <td>  <?php echo $Concepto['ValorUnitario'];?>  </td>
                </tr>
                <tr>
                    <td> importe </td>
                    <td>   <?php echo $Concepto['Importe']; ?> </td>
                </tr>
                <tr>
                    <td> clave prod serv</td>
                    <td>  <?php echo $Concepto['ClaveProdServ'];?>   </td>
                </tr>
                <tr>
                    <td> clave de unidad</td>
                    <td>  <?php echo $Concepto['ClaveUnidad']; ?>   </td>
                </tr>
                <tr>
                    <td>base </td>
                    <td>  <?php echo $Traslado['Base']; ?>  </td>
                </tr>
                <tr>
                    <td>impuesto</td>
                    <td> <?php echo $Traslado['Impuesto']; ?>    </td>
                </tr>
                <tr>
                    <td>tipo factor </td>
                    <td>   <?php echo $Traslado['TipoFactor'];?>  </td>
                </tr>
                <tr>
                    <td>tasa couta  </td>
                    <td> <?php echo $Traslado['TasaOCuota']; ?>   </td>
                </tr>
                <tr>
                    <td> importe</td>
                    <td> <?php echo $Traslado['Importe'];?>    </td>
                </tr>
                <tr>
                    <td>impuestos trasladados </td>
                    <td>  <?php echo $Impuestos['TotalImpuestosTrasladados'];?>  </td>
                </tr>
                <tr>
                    <td>Version </td>
                    <td>   <?php echo $tfd['Version'];?>   </td>
                </tr>

                <tr>
                    <td> UUID</td>
                    <td>  <?php echo $tfd['UUID']; ?>   </td>
                </tr>
                <tr>
                    <td> FECHA DE TIMBRADO</td>
                    <td>   <?php echo $tfd['FechaTimbrado']; ?> </td>
                </tr>
                <tr>
                    <td>RFC PROVEDOR CERTIFICADO </td>
                    <td> <?php echo $tfd['RfcProvCertif']; ?>   </td>
                </tr>


                <tr>
                    <td> SELLO</td>
                    <td> <?php echo $rest = substr($tfd['SelloCFD'], 0, 4);?>    </td>
                </tr>

                <tr>
                    <td> No certificacion en el sat</td>
                    <td>  <?php echo $tfd['NoCertificadoSAT']; ?>  </td>
                </tr>

                <tr>
                    <td>Sello en el SAT </td>
                    <td>    <?php echo $rest = substr($tfd['SelloSAT'],0,5);?> </td>
                </tr>

                
                         <tbody>
                    </table>
                 </div>

                <?php } ?>
                

                



               







                <!----------------------------------------------------------------------
            





                --->
        
    </div>
</section>







</body>
</html>