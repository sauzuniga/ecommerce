<?php
session_start();
$response=new stdClass();

if (!isset($_SESSION['iduser'])) {
	$response->state=false;
	$response->detail="No a iniciado sesión";
	$response->open_login=true;
}else{
	include_once('../_conexion.php');
	$codusu=$_SESSION['iduser'];
	$codpro=$_POST['codpro'];
	$sql="INSERT INTO pedido
	(iddusu,idpro,fecped,estado,dirusuped,telusuped)
	VALUES
	($codusu,$codpro,now(),1,'','')";
	$result=mysqli_query($con,$sql);
	if ($result) {
    $response->state=true;
    $response->detail="Se a agregado el producto";
}else{
	$response->state=false;
	$response->detail="No se pudo agregar producto. Intente más tarde";
}
mysqli_close($con);

}
header('Content-Type: application/json');
echo json_encode($response);