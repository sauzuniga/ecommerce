<?php
session_start();
$response=new stdClass();
// Se Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['iduser'])) {
	$response->state=false;
	$response->detail="No a iniciado sesión";
	$response->open_login=true;
}else{
	include_once('../_conexion.php');
	$codusu=$_SESSION['iduser'];
	$codpro=$_POST['codpro'];
	// Se crea y se ejecuta la consulta SQL para agregar un producto al carrito
	$sql="INSERT INTO pedido
	(iddusu,idpro,fecped,estado,dirusuped,telusuped)
	VALUES
	($codusu,$codpro,now(),1,'','')";
	$result=mysqli_query($con,$sql);
	// Se Verifica si se agrego el producto al carrito
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
//Se manda la respuesta en formato json
echo json_encode($response);