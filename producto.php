<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ecommerce</title>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
    <header>
        <div class="logo-place"><img src="assets/niche.png" alt=""></div>
        <div class="search-place">
        <input type="text" id="idbusqueda" placeholder="¿Que necesitas?">
        <button class="btn-main btn-search"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <div class="options-place">
        <div class="item-option" title="Registrarse"><i class="fa fa-user" aria-hidden="true"></i>
</div>
<div class="item-option" title="Ingresar"><i class="fa fa-sign-in" aria-hidden="true"></i>
</div>
<div class="item-option" title="Mis compras"><i class="fa fa-shopping-cart" aria-hidden="true"></i></i>
</div>
</div>

    </header>
    <div class="main-content">
        <div class="content-page">
            <section>
            <div class="part1">
					<img id="idimg" src="assets/famicom.jpg">
				</div>
				<div class="part2">
					<h2 id="idtitle">NOMBRE PRINCIPAL</h2>
					<h1 id="idprice">S/. 35.<span>99</span></h1>
					<h3 id="iddescription">Descripcion del producto</h3>
					<button >Comprar</button>
				</div>
            </section>
        <div class="title-section">Productos destacados</div>
        <div class="products-list" id="space-list">
            
            </div> 
        </div>
        </div>
    </div>
    <script type="text/javascript">
		var p='<?php echo $_GET["p"]; ?>';
	</script>

    <script type="text/javascript">
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
            function formato_precio(valor){
			//10.99
			let svalor=valor.toString();
			let array=svalor.split(".");
			return "S/. "+array[0]+".<span>"+array[1]+"</span>";
		}

    </script>
</body>
</html>