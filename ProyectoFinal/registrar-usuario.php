<?php
session_start( );

//$nombre = $_POST['usuario'];

//$password = $_POST['password'];
$usuario = $_POST['username'];

$correo = $_POST['correo'];

$nom_parking = $_POST['nom_parking'];

$plantas = $_POST['plantas'];

$plazas = $_POST['plazas'];
$password = $_POST['password'];
 

 $row = file_get_contents('http://localhost:8080/login/%7B%22usuario%22:%22'.$usuario.'%22,%22password%22:%22'.$password.'%22%7D');
        
 if($row == "Contraseña incorrecta"){
 echo "<br />". "El Nombre de Usuario ya a sido tomado." . "<br />";
 echo "<a href='http://localhost/ProyectoFinal/Registrar.php'>Por favor escoga otro Nombre</a>";
 }
 else{
    
    file_get_contents('http://localhost:8080/register/%7B%22username%22:%22'.$usuario.'%22,%22password%22:%22'.$password.'%22,%22email%22:%22'.$correo.'%22,%22parking%22:%22'.$nom_parking.'%22%7D');
    $id = file_get_contents('http://localhost:8080/login/%7B%22usuario%22:%22'.$usuario.'%22,%22password%22:%22'.$password.'%22%7D');
    file_get_contents('http://localhost:8080/registerparking/%7B%22id%22:%22'.$id.'%22,%22plazas%22:%22'.$plazas.'%22,%22plantas%22:%22'.$plantas.'%22%7D');
    if($row != "Contraseña incorrecta"){
        echo '<script language="javascript">alert("USUARIO Y PARKING REGISTRADO");</script>';
        header('location:http://localhost/ProyectoFinal/principal.php');
    }else{
        echo '<script language="javascript">alert("ERROR AL REGISTRAR AL USUARIO");</script>';
    }
    //$hash = password_hash($form_pass, PASSWORD_BCRYPT);
    
    /*if ($mysqli->query($query) === TRUE) {
    echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
    echo "<h4>" . "Bienvenido: " . $_POST['usuario'] . "</h4>" . "\n\n";
    echo "<h5>" . "Hacer Login: " . "<a href='LOGEO.php'>Login</a>" . "</h5>";
    }
    
    }
   }
}

	echo "</div>";
    echo "</body>";
    echo "<html>";

 //mysqli_close($conexion);
 */
  }
?>
