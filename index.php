<?php
/**
 * Página principal del sitio web de ecommerce.
 *
 * @package Ecommerce
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ecommerce</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
     <!-- Inclución del encabezado de la página -->
<?php include("layout/header.php") ?>
    <div class="main-content">
        <div class="content-page">
        <div class="title-section">Productos destacados</div>
        <div class="products-list" id="space-list">
            
            </div> 
        </div>
        </div>
    </div>
    <!-- Inclución del footer de la página -->
    <?php include("layout/_footer.php") ?>
    <script type="text/javascript" src="js/main_script.js"> </script>
    <script type="text/javascript">
         /**
         * Función que se ejecuta cuando el documento está listo.
         * Realiza una solicitud AJAX para obtener la lista de productos destacados.
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

    </script>
</body>
</html>