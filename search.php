<?php
session_start();
//if (!isset($_SESSION["user"])) {
  // header("Location: login.php");
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ecommerce</title>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">

</head>
<body>
<?php include("layout/header.php") ?>
    <div class="main-content">
        <div class="content-page">
        <div class="title-section">Resultados encontrados para <strong><?php echo $_GET['text']; ?></strong></div>
        <div class="products-list" id="space-list">
            
            </div> 
        </div>
        </div>
    </div>
    <?php include("layout/_footer.php") ?>
    <script type="text/javascript" src="js/main_script.js"> </script>
    <script type="text/javascript">
        var text="<?php echo $_GET['text']; ?>";
        $(document).ready(function(){
    $.ajax({
				url:'servicios/producto/get_all_result.php',
				type:'POST',
				data:{
                    text:text
                },
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
                    if (html==''){
                        document.getElementById("space-list").innerHTML="No hay resultados";

                    }else{
                    document.getElementById("space-list").innerHTML=html;
                    }
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
			return "$/. "+array[0]+".<span>"+array[1]+"</span>";
		}

    </script>
</body>
</html>