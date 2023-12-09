<?php
/**
 * Lógica del servidor para obtener todos los productos activos.
 *
 * @package Ecommerce
 */
include('../_conexion.php');
// Creación de una respuesta JSON
$response=new stdClass();

//$datos=array();
$datos=[];
$i=0;
// Consulta a la base de datos para obtener la lista de productos activos
$sql="select * from producto where estado=1";
$result=mysqli_query($con,$sql);
// Construcción del array de productos datos
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
// Asignación de los datos a la respuesta
$response->datos=$datos;

mysqli_close($con);
// Establecer el tipo de contenido a JSON y enviar la respuesta
header('Content-Type: application/json');
echo json_encode($response);