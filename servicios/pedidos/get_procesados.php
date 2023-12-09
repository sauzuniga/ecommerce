<?php
include('../_conexion.php');
$response=new stdClass();
/**
 * Convierte el estado numérico a texto.
 *
 * Esta función toma un número que representa el estado y devuelve la representación en texto.
 *
 * @param string $id El número del estado.
 *
 * @return string La representación en texto del estado.
 */

function estadototexto($id){
	switch ($id) {
		case '1':
			return 'Por procesar';
			break;
		case '2':
			return 'Por pagar';
			break;
		case '3':
			return 'Por entregar';
			break;
		case '4':
			return 'En camino';
			break;
		case '5':
			return 'Entregado';
			break;

			default:

			    break;
	}
}
//$datos=array();
$datos=[];
$i=0;
$sql="select *, ped.estado estadopedi from pedido ped
inner join producto pro
on ped.idpro= pro.codpro
where ped.estado!=1";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	$obj=new stdClass();
	$obj->idped=$row['idped'];
    $obj->codpro=$row['codpro'];
	$obj->nompro=$row['nompro'];
    $obj->prepro=$row['prepro'];
	$obj->rutimapro=$row['rutimapro'];
    $obj->fecped=$row['fecped'];
	$obj->dirusuped=$row['dirusuped'];
	$obj->telusuped=$row['telusuped'];
	$obj->estadotext=estadototexto($row['estadopedi']);
	$obj->estado=$row['estadopedi'];

	$datos[$i]=$obj;
	$i++;
}
$response->datos=$datos;

mysqli_close($con);
header('Content-Type: application/json');
echo json_encode($response);