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
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
	<header>
		<div class="logo-place"><a href="index.php"><img src="assets/niche.png"></a></div>
		<div class="search-place">
			<input type="text" id="idbusqueda" placeholder="Encuenta todo lo que necesitas...">
			<button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
		</div>
		<div class="options-place">
			<?php
			if (isset($_SESSION['iduser'])) {
				echo
				'<div class="item-option"><i class="fa fa-user-circle-o" aria-hidden="true"></i><p>'.$_SESSION['user'].'</p></div>';
			}else{
			?>
			<div class="item-option" title="Registrate"><i class="fa fa-user-circle-o" aria-hidden="true"></i></div>
			<div class="item-option" title="Ingresar"><i class="fa fa-sign-in" aria-hidden="true"></i></div>
			<?php
			}
			?>
			<div class="item-option" title="Mis compras">
				<a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
			</div>
		</div>
	</header>
	<div class="main-content">
		<div class="content-page">
			<h3>Carrito</h3>
			<div class="body-pedidos" id="space-list">
			</div>
			<input class="ipt-procom" type="text" id="dirusu" placeholder="Dirección">
			<br>
			<input class="ipt-procom" type="text" id="telusu" placeholder="Telefono">
			<br>
			<h4>Opciones de pago disponibles</h4>
			<div class="metodo-pago">
				<input type="radio" name="tipopago" value="1" id="tipo1">
				<label for="tipo1">Otro metodo de pago</label>
			</div>
			<div class="metodo-pago">
				<input type="radio" name="tipopago" value="2" id="tipo2">
				<label for="tipo1">Paypal</label>
			</div>
		
			<button onclick="process_purchase()" style="margin-top: 5px;">Confirmar compra</button>
			
		</div>
	</div>
	<?php include("layout/_footer.php") ?>
	<script type="text/javascript">
		/**
         * Llamada AJAX para obtener pedidos del usuario.
         * @function
         */
		$(document).ready(function(){
			$.ajax({
				url:'servicios/pedidos/get_all.php',
				type:'POST',
				data:{},
				success:function(data){
					console.log(data);
					let html='';
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
								'<p><b>Estado:</b> '+data.datos[i].estado+'</p>'+
								'<p><b>Dirección:</b> '+data.datos[i].dirusuped+'</p>'+
								'<p><b>Celular:</b> '+data.datos[i].telusuped+'</p>'+
								'<button class="btn-delete-cart" onclick="delete_product('+data.datos[i].idped+')">Eliminar</button>'+
							'</div>'+
						'</div>';
						
					}
					document.getElementById("space-list").innerHTML=html;
				},
				error:function(err){
					console.error(err);
				}
			});
		});
		
		/**
         * Elimina un producto del carrito.
         * @function
         * @param {number} idped - ID del pedido.
         */
		function delete_product(idped){
			$.ajax({
				url:'servicios/pedidos/delete_pedido.php',
				type:'POST',
				data:{
					idped:idped,
					
					
				},
				success:function(data){
					console.log(data);
					if (data.state) {
						window.location.reload();
					}else{
						alert(data.detail);
					}
					
				},
				error:function(err){
					console.error(err);
				}
			});

		}
		 /**
         * Procesa la compra con la información proporcionada.
         * @function
         */
		function process_purchase(){
			let dirusu=document.getElementById("dirusu").value;
			let telusu=$("#telusu").val();
			let tipopago=1;
			if (document.getElementById("tipo2").checked) {
				tipopago=2;
			}
			if (dirusu=="" || telusu=="" ){
				Swal.fire({
                            title: '<strong>ALERTA</strong>',
                            icon: 'info',
                            html:
                                'Por favor complete los campos ' +
                                '<a href="//sweetalert2.github.io">links</a> ',
                            showCloseButton: true,
                           
                            focusConfirm: false,
                            confirmButtonText:
                            '<i class="fa fa-thumbs-up"></i> Great!',
                            confirmButtonAriaLabel: 'Thumbs up, great!',

                        })
			}else{
				if (!document.getElementById("tipo1").checked &&
					!document.getElementById("tipo2").checked) {
						Swal.fire({
                            title: '<strong>ALERTA</strong>',
                            icon: 'info',
                            html:
                                'Escoja un metodo de pago ' +
                                '<a href="//sweetalert2.github.io">links</a> ',
                            showCloseButton: true,
                           
                            focusConfirm: false,
                            confirmButtonText:
                            '<i class="fa fa-thumbs-up"></i> Great!',
                            confirmButtonAriaLabel: 'Thumbs up, great!',

                        })
				}else{
				$.ajax({
				url:'servicios/pedidos/confirmar.php',
				type:'POST',
				data:{
					dirusu:dirusu,
					telusu:telusu,
					tipopago:tipopago
				},
				success:function(data){
					console.log(data);
					if (data.state) {
						window.location.href="pedido.php"
					}else{
						alert(data.detail);
					}
					
				},
				error:function(err){
					console.error(err);
				}
			});
			 }
			}
		}
	</script>
	
</body>
</html>