<?php
	session_start();
	/**
 * Redirecciona a la página de inicio si el usuario no está autenticado.
 */
	if (!isset($_SESSION['iduser'])) {
		header('location: index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mi sistema E-Commerce</title>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sen&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
    <?php include("layout/header.php") ?>
	<div class="main-content">
		<div class="content-page">
			<h3>Mis pedidos</h3>
			<div class="body-pedidos" id="space-list">
			</div>
			<h3>Datos de pago</h3>
			<div class="p-line"><div>Monto total de la compra:</div>$ <span id="montotal"> </span></div>
			 <div class="p-line"><div>Banco:</div>BPC:</div>
			 <div class="p-line"><div>N de cuenta:</div>191-4565-55:</div>
			 <div class="p-line"><div>Representante:</div>Encargado de venta:</div>
			 <p><b>Nota:</b>Para confirmar la compra debe realizar el deposito con el monto total</p>
		</div>
	</div>
	<?php include("layout/_footer.php") ?>
	<script type="text/javascript">
		/**
         * Realiza una llamada AJAX para obtener los pedidos procesados del usuario.
         * @function
         */
		$(document).ready(function(){
			$.ajax({
				url:'servicios/pedidos/get_procesados.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
					let montocompra=0
					// Iteraración a través de los datos de los pedidos recibidos de la respuesta AJAX
					for (var i = 0; i < data.datos.length; i++) {
						html+=
						'<div class="item-pedido">'+
							'<div class="pedido-img">'+
								'<img src="assets/'+data.datos[i].rutimapro+'">'+
							'</div>'+
							'<div class="pedido-detalle">'+
								'<h3>'+data.datos[i].nompro+'</h3>'+
								'<p><b>Precio:</b> $/.'+data.datos[i].prepro+'</p>'+
								'<p><b>Fecha:</b> '+data.datos[i].fecped+'</p>'+
								'<p><b>Estado:</b> '+data.datos[i].estadotext+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'+
								'<p><b>Celular:</b> '+data.datos[i].telusuped+'</p>'+
							'</div>'+
						'</div>';
						// Calculo del monto total de la compra si el estado del pedido es 2 (procesado)
						if(data.datos[i].estado==2){
							montocompra+=parseFloat(data.datos[i].prepro)

						}
					}
					// Muestra el monto total en el elemento con el ID "montotal"
					document.getElementById("montotal").innerHTML=montocompra;
					// Insertar el contenido HTML generado en el elemento con el ID "space-list"
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
	</script>
</body>
</html>