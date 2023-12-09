<?php
include('../_conexion.php');
// Creación de un objeto de respuesta
$response=new stdClass();

// Se inicializa el array de datos
$datos=[];
$i=0;
// Se obtiene el texto del input del usuario de la barra de busqueda
$text=$_POST['text'];
// Consultar la base de datos para obtener productos que coincidan con el texto de búsqueda
$sql = "select * from producto where estado=1 and nompro LIKE '%$text%'";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->codpro=$row['codpro'];
	$obj->nompro=$row['nompro'];
	$obj->despro=$row['despro'];
	$obj->prepro=$row['prepro'];
	$obj->rutimapro=$row['rutimapro'];
	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
// Se establecer el tipo de contenido de la respuesta como JSON
header('Content-Type: application/json');
// Se envia la respuesta json
echo json_encode($response);