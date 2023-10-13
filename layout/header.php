<header>
        <div class="logo-place"><img src="assets/niche.png" alt=""></div>
        <div class="search-place">
        <input type="text" id="idbusqueda" placeholder="¿Que necesitas?" value="<?php if(isset($_GET['text'])) {echo $_GET['text']; }else{echo "";} ?>">
        <button class="btn-main btn-search" onclick="search_products()"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <a href="logout.php" class="btn-warning">logout</a>

        <div class="options-place">
        <?php
        if (isset($_SESSION['iduser'])) {
            echo
				'<div class="item-option"><i class="fa fa-user-circle-o" aria-hidden="true"></i><p>'.$_SESSION['user'].'</p></div>';
                
        } else {
            # code...
        ?>
        <div class="item-option" title="Registrarse">
            <a href="registration.php"><i class="fa fa-user" aria-hidden="true"></i></a>
      </div>
      <div class="item-option" title="Ingresar">
            <a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
      </div>
        
        <?php
         }
        ?>
<div class="item-option" title="Mis compras">
    <a href="carrito.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
</div>

</header>