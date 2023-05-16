<?php
    
    session_start();


    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 

        // destroy the session 
        session_destroy();

        //redireccion login
        header('location:http://localhost/ProyectoFinal/principal.php'); 
    }
     

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $row = file_get_contents('http://localhost:8080/login/%7B%22username%22:%22'.$username.'%22,%22password%22:%22'.$password.'%22%7D');
        
        if($row != "Contraseña incorrecta"){
            $id = $row;
            $_SESSION['id'] = $id;
            $_SESSION['cookies'] = "true";
            header('location: http://localhost/ProyectoFinal/principal.php');
            
        }else{
            // no existe el usuario
            echo "El usuario no existe";
        }
        

    }

?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="./img/"/>
	<title>NOMBRE_EMPRESA</title>
</head>
<body  background="./img/fondo_inicio.jpg">
	<div align="center" 
	style="padding-top: 50px; 
	height: 700px; 
	width: 1200px; 
	padding-left:50px ; 
	margin-top: 30px; 
	margin-left: 300px;">

		<div style="background-color: lightgray; 
			border: 2px solid;
			border-color: grey;
			border-radius: 55px;
			height: 670px;
			width: 100%;
			margin: 0px 50px 10px 30px;">

			<form action="#" method="post" style="padding-top: 200px;">
				<div id="mio">
				 
				 <!--Usuario-->

				<label style="padding: 78px; color: black;" for="nombre">USUARIO:</label> 
				<input type="text" name="username"><br><br>

		 		 <!--Contraseña-->

				<label style="padding: 58px; color: black;" for="nombre">CONTRASEÑA:</label>
		 		<input type="password" name="password" ><br><br>

		 		<!--Botón-->
				</div>
				<div align="center">		
					<br><button style="background-color: lightgray;display: inline-block;padding: 8px 30px;color: #fff;cursor: pointer; width: 150px;height: 60px;"><b>ENTRAR</b></button>
				</div>
				<p align="center">¿Quieres empezar a usar nuestro servicio? <a href="Registrar.php">REGÍSTRATE AQUÍ</a></p>		
			</form>
		</div>
	</div>
</body>
</html>
