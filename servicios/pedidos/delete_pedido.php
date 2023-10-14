<?php
    $response=new stdClass();
    include_once('../_conexion.php');
    $idped=$_POST['idped'];
    $sql="delete from pedido where idped=$idped";
    $result=mysqli_query($con,$sql);
    if($result){
        $response->state=true;
    }else{
        $response->state=false;
        $response->detail="No se ha podido eliminar el producto";
    }
    mysqli_close($con);
    header('Content-Type: application/json');
    echo json_encode($response);
    