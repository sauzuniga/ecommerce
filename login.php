
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php
         /**
          * Maneja el envío del formulario de inicio de sesión.
          * Valida las credenciales del usuario y crea una sesión si las credenciales son válidas.
          */
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "servicios/_conexion.php";
            // Consulta SQL para obtener el usuario con el email proporcionado
            $sql = "SELECT * FROM clientes WHERE email = '$email'";
            $result = mysqli_query($con, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            // Verifica si el usuario existe
            if ($user) {
                
                 // Verifica si la contraseña proporcionada coincide con la almacenada en la base de datos
                if (password_verify($password, $user["clave"])) {
                      // Inicia la sesión y almacena información del usuario
                    session_start();
                    $_SESSION["iduser"] =$user['id'];
                    $_SESSION["user"] =$user['nombre_completo'];
                    $_SESSION["email"] =$user['email'];
                    header("Location: index.php");
                    die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>No tiene una cuenta <a href="registration.php">Registrese aqui </a></p></div>
    </div>
</body>
</html>