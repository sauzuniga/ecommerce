<?php
session_start();
$response=new stdClass();


	include_once('../_conexion.php');

	$codusu=$_SESSION['iduser'];
	$dirusu=$_POST['dirusu'];
    $telusu=$_POST['telusu'];
	$sql="UPDATE pedido SET dirusuped='$dirusu', telusuped='$telusu', estado=2
	WHERE estado=1";
	$result=mysqli_query($con,$sql);
	if ($result) {
    $response->state=true;
}else{
	$response->state=false;
	$response->detail="No se ha podido actualizar el pedido. Intente más tarde";
}
mysqli_close($con);


header('Content-Type: application/json');
echo json_encode($response);