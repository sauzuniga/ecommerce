<?php
    $response=new stdClass();
    include_once('../_conexion.php');
    //Se obtiene del producto de la tabla pedido
    $idped=$_POST['idped'];
    //Consulta para borrar un producto del carrito
    $sql="delete from pedido where idped=$idped";
    //Se ejecuta la consulta
    $result=mysqli_query($con,$sql);
    // Se verifica si la eliminación del producto fue exitosa
    if($result){
        $response->state=true;
    }else{
        $response->state=false;
        $response->detail="No se ha podido eliminar el producto";
    }
    mysqli_close($con);
    // Se establecer el tipo de contenido de la respuesta como JSON
    header('Content-Type: application/json');
    // Se envia la respuesta JSON al cliente
    echo json_encode($response);
    