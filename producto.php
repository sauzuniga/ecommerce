<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ecommerce</title>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<?php include("layout/header.php") ?>
    <div class="main-content">
        <div class="content-page">
            <section>
            <div class="part1">
					<img id="idimg" src="assets/famicom.jpg">
				</div>
				<div class="part2">
					<h2 id="idtitle">NOMBRE PRINCIPAL</h2>
					<h1 id="idprice">$. 35.<span>99</span></h1>
					<h3 id="iddescription">Descripcion del producto</h3>
					<button onclick="start_buy()" >Comprar</button>
				</div>
            </section>
        <div class="title-section">Productos destacados</div>
        <div class="products-list" id="space-list">
            
            </div> 
        </div>
        </div>
    </div>
	<script type="text/javascript" src="js/main_script.js"> </script>
    <script type="text/javascript">
		var p='<?php echo $_GET["p"]; ?>';
	</script>

    <script type="text/javascript">
        /**
 * Función que se ejecuta cuando el documento está listo.
 * Realiza una solicitud AJAX para obtener productos y actualizar la interfaz de usuario.
 * @function
 * @name documentReady
 */
        $(document).ready(function(){
    $.ajax({
				url:'servicios/producto/get_all_products.php',
				type:'POST',
				data:{},
                success:function(data){
					console.log(data);
                    let html='';
					for (var i = 0; i < data.datos.length; i++) {
                        if (data.datos[i].codpro==p) {
							document.getElementById("idimg").src="assets/"+data.datos[i].rutimapro;
							document.getElementById("idtitle").innerHTML=data.datos[i].nompro;
							document.getElementById("idprice").innerHTML=formato_precio(data.datos[i].prepro);
							document.getElementById("iddescription").innerHTML=data.datos[i].despro;
                         }
						html+=
						'<div class="product-box">'+
                           '<a href="producto.php?p='+data.datos[i].codpro+'">'+
								'<div class="product">'+
									'<img src="assets/'+data.datos[i].rutimapro+'">'+
									'<div class="detail-title">'+data.datos[i].nompro+'</div>'+
									'<div class="detail-description">'+data.datos[i].despro+'</div>'+
									'<div class="detail-price">'+formato_precio(data.datos[i].prepro)+'</div>'+
								'</div>'+
							'</a>'+
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
              * Función para formatear el precio.
              *
              * @param {number} valor - Valor del precio a formatear.
              * @returns {string} - Precio formateado con formato "$ XX.YY".
              *
              * @example
              * // Ejemplo de uso:
              * const precioFormateado = formato_precio(25.99);
              */                                                    
            function formato_precio(valor){
			//10.99
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "$ "+array[0]+".<span>"+array[1]+"</span>";
		}
        /**
         * Función para iniciar el proceso de compra.
         * @function
         * @name start_buy
         */
		function start_buy() {
    $.ajax({
        url: 'servicios/compra/validar_inicio_compra.php',
        type: 'POST',
        data: {
            codpro: p
        },
        success: function (data) {
            console.log(data);
            if (data.state) {
                // Mostrar una alerta de éxito cuando se logra la operación
                Swal.fire({
                    icon: 'success',
                    title: 'Operación exitosa',
                    text: 'El producto se ha agregado al carrito.',
                });
            } else {
                // Mostrar una alerta de error en caso de error
                Swal.fire({
                    title: 'Error',
                    text: data.detail,
                }).then(function (result) {
                    if (result.isConfirmed) {
                        open_login(); // Redirige si el usuario confirma la alerta
                    }
                });
            }
        },
        error: function (err) {
            console.error(err);
        }
    });
}
         /**
         * Función para redirigir a la página de inicio de sesión.
         * @function
         * @name open_login
         */
		function open_login(){
			window.location.href="login.php";
		}
            
    </script>
</body>
</html>