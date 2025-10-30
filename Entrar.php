<?php

// Inicializa la sesión

session_start();



/* Verifique si el usuario ya ha iniciado sesión, si es así,

rediríjalo a la página de bienvenida (index.php)*/

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

  header("location: acc.php");

  exit;

}



// Incluir el archivo de configuración

require_once "Conexcion.php";



// Definir variables e inicializar con valores vacíos

$username = $password = $username_err = $password_err = "";



// Procesamiento de datos del formulario cuando se envía el formulario

if($_SERVER["REQUEST_METHOD"] == "POST"){



    // Comprobar si el nombre de usuario está vacío

    if(empty(trim($_POST["username"]))){

        $username_err = "Por favor ingrese su usuario.";

    } else{

        $username = trim($_POST["username"]);

    }



    // Comprobar si la contraseña está vacía

    if(empty(trim($_POST["password"]))){

        $password_err = "Por favor ingrese su contraseña.";

    } else{

        $password = trim($_POST["password"]);

    }



    // Validar información del usuario

    if(empty($username_err) && empty($password_err)){

        // Preparar la consulta select

        $sql = "SELECT id, username, password FROM users WHERE username = ?";



        if($stmt = mysqli_prepare($link, $sql)){

            /* Vincular variables a la declaración preparada como parámetros, s es por la

			variable de tipo string*/

            mysqli_stmt_bind_param($stmt, "s", $param_username);



            // Asignar parámetros

            $param_username = $username;



            // Intentar ejecutar la declaración preparada

            if(mysqli_stmt_execute($stmt)){

                // almacenar el resultado de la consulta

                mysqli_stmt_store_result($stmt);



                /*Verificar si existe el nombre de usuario, si es así,

				verificar la contraseña*/

                if(mysqli_stmt_num_rows($stmt) == 1){

                    // Vincular las variables del resultado

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

					//obtener los valores de la consulta

                    if(mysqli_stmt_fetch($stmt)){

						/*comprueba que la contraseña ingresada sea igual a la

						almacenada con hash*/

                        if(password_verify($password, $hashed_password)){

                            // La contraseña es correcta, así que se inicia una nueva sesión

                            session_start();



                            // se almacenan los datos en las variables de la sesión

                            $_SESSION["loggedin"] = true;

                            $_SESSION["id"] = $id;

                            $_SESSION["username"] = $username;



                            // Redirigir al usuario a la página de inicio

                            header("location: acc.php");

                        } else{

                            // Mostrar un mensaje de error si la contraseña no es válida

                            $password_err = "La contraseña que ha ingresado no es válida.";

                        }

                    }

                } else{

                    // Mostrar un mensaje de error si el nombre de usuario no existe

                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";

                }

            } else{

                echo "Algo salió mal, por favor vuelve a intentarlo.";

            }

        }



        // Cerrar la sentencia de consulta

        mysqli_stmt_close($stmt);

    }



    // Cerrar laconexión

    mysqli_close($link);

}

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;1,700&display=swap" rel="stylesheet">

    <link rel="preload" href="css/normalize.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preload" href="css/login.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="entrar">
    
    <section class="login">
        <h1>Inicio de session</h1>
        
        <section class="formulario">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2> Usuario <input type="text" name="username" id="" class="txt" value="<?php echo $username; ?>"></h2>
            <span ><?php echo $username_err; ?></span>
            <h2> Contraseña <input type="password" name="password" id="" class="txt"  ></h2>
            <span ><?php echo $password_err; ?></span>
        </section>
        <section class="opciones">
            
                <input class="btn" type="submit" class"btn"  value="Ingresar">

        </section>







        <section class="opciones">
            <a href="registro.html" class="btn2">Crea tu cuenta</a>
        
        
        
        
        
        
        
        
            <br>
            <a href="#" class="btn2">¿has olvidado tu contraseña?</a>
        
        
        
        </section>



        <img src="img/logo3.jpg" class="img">
    </section>
    
</body>
</html>