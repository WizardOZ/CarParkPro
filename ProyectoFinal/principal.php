<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="./img/logo.jpeg"/>
  <link rel="stylesheet" href="./style.css">
  <title>CarParkPro</title>
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <script>
    $(document).ready(function () {
   (function($) {
       $('#FiltrarContenido').keyup(function () {
            var ValorBusqueda = new RegExp($(this).val(), 'i');
            $('.BusquedaRapida div').hide();
             $('.BusquedaRapida div').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
                })
      }(jQuery));
    });


  </script>

</head>
<body background="./img/fondo_inicio.jpg">

  <header>
      <div id="cabecera" align="center" 
      style="background-color: white; 
      border: 3px solid;
      border-color: black;
      height: 60px;
      padding: 0.2em 0.5em;
      color:  black;
      font-size: 30px;
      font-weight: bold;
      text-align: left;
      margin-right: 15px;">
        
        <div style="float: left;">
          <a href="principal.php"><img src="./img/logo.jpeg" width="60px"></a>
          <label>CarParkPro</label>
        </div>
        <div style="float: left; margin-left: 1200px;" class="dropdown">
          <button class="mainmenubtn">Main Menu</button>
          <div class="dropdown-child">
            <a href="principal.php">INICIO</a>
            <a href="areaPersonal.php">AREA PERSONAL</a>
            <a href="index.php">SALIR</a>
          </div>
        </div>
      </div>

    </header>

  <div align="center" 
  style="padding-top: 50px; 
  height: 700px; 
  width: 1200px; 
  padding-left:50px ; 
  margin-top: 60px; 
  margin-left: 170px;">

    <div style="background-color: #FFFFFF80;
      border: 2px solid;
      border-color: grey;
      border-radius: 55px;
      height: 1340px;
      width: 1500px;
      margin: 0px 50px 10px 0px;">

        <div style="padding-top:50px;">
            <div class="search_box">
              <input id="FiltrarContenido" type="text" placeholder="Buscar..">
              <a href="##" class="icon">
              <button><img src="./img/lupa.png" height="20px"></button>
            </a>
            </div>
            <!--
            <div>
                <select id="filtro" name="filtro" >
                  <option value="def" name="def"> Ordenar por : </option>  
                  <option value="marca" name="marca"> Marca </option>
                  <option value="mayor_p" name="mayor_p"> Mayor a menor precio </option>
                  <option value="menor_p" name="menor_p"> Menor a mayor precio </option>
                </select>
                <button id="boton">FILTRAR</button>
            </div>
          --><?php

          if ($_SESSION['cookies'] == "true") {
            $_SESSION['cookies'] = "false";
            echo '  <form>
            <div class="window-notice" id="window-notice">
              
              <div class="content">
                <div class="content-text">
                  <div class="content-buttons">
                        
                          Todo para obtener la mejor experiencia en nuestra web.<br>
                          Esta web utiliza cookies, puede ver aquí nuestra <a href="cookies.html">Política de cookies</a>. 
              <br>
              <br>
              <input type=button style="background-color: lightskyblue;display: inline-block;padding: 0px 10px;color: #fff;cursor: pointer; width: 200px;height: 40px;" value="Cerrar ventana secundaria" onclick="cerrarVentana()">
                        
                    <script>
                          $( "form" ).click(function() {
                            $( this ).slideUp();
                          });
                    </script>
                  </div>
                </div>
              </div>
              
            </div>
            </form>';
            
          }

          
            ?>
        </div>
      <div class="BusquedaRapida" style="background-color: #fafbfd; 
        border: 2px solid;
        border-color: grey;
        height: 700px;
        width: 1200px;
        margin: 100px 50px 10px 0px;
        overflow-y: auto;" 
        id="resultados">
        <div style="margin-left: 100px;" id="resultado">
            <?php
                $data = json_decode( file_get_contents('http://localhost:8080/reload/%7B%22id%22:%22646201d4a372384ee535402a%22%7D'),true);
                $contador = 0;
                echo "<table>";
                for ($i=0; $i < sizeof($data["parking"]["plazas"]); $i++) { 
                  for ($j=0; $j < sizeof($data["parking"]["plazas"][$i]) ; $j++) { 
                    $contador++;
                    if ($contador%6 == 0) {
                         echo "</tr>";
                       }
                     if ($data["parking"]["plazas"][$i][$j]["ocupado"] == false) {
                       echo "<td>ESPACIO: LIBRE </td><td>MATRICULA: S/N</td><td>PLANTA:".($i+1)." </td><td>PLAZA:".($j+1)." </td>";

                     }
                     if ($data["parking"]["plazas"][$i][$j]["ocupado"] != false) {
                       echo "ESPACIO: OCUPADO";
                     }
                     if ($contador%6 == 0) {
                         echo "</tr>";
                       }
                      
                  }
                }
                echo "</table>";
               // var_dump($data);
            ?>    
        </div>
      </div>
      <div class="BusquedaRapida" style="background-color: #fafbfd; 
        border: 2px solid;
        border-color: grey;
        height: 300px;
        width: 1200px;
        margin: 100px 50px 10px 0px;
        overflow-y: auto;" 
        id="resultados">
        <div style="margin-left: 100px;">
        <div style="float: left; padding-right: 200px; padding-left: 50px;">
            <form action="registrar-usuario.php" method="post" >
 <div>
  <br>
    <table>

      <center>
              <!--Nombre Usuario-->
        <p>LIBERAR VEHICULO</p>
        <p>
         <label for="nombre">Matricula:</label><br>
         <input type="text" name="matricula" maxlength="7" style="height:20px; width: 250px;" required>
        </p>

         <!--Password-->
         <p>
         <label for="pass" style="">Planta:</label><br>
         <input type="password" name="planta" minlength="1" maxlength="2" style="height:20px; width: 250px;" required>
        </p>


         <!--correo-->
         <p>
         <label for="nombre" style="">Plaza:</label><br>
         <input type="text" name="plaza" maxlength="3" style="height:20px; width: 250px;" required>
         </p>

          <br/><br/>
        </center>
    </table>
    </div>
  <center> 
    <input type="submit" name="submit" value="Liberar plaza" id="boton_personalizado">
 <input type="reset" name="clear" value="Borrar" id="boton_personalizado" >
  </center>
</form>
        </div>
        <div>
                      <form action="registrar-usuario.php" method="post">
 <div >
  <br>
    <table>

      <center>
              <!--OCUPAR PLAZA-->
        <p>OCUPAR PLAZA </p>
        <p>

         <!--PLANTA-->
         <p>
         <label for="pass" style="">Planta:</label><br>
         <input type="password" name="planta" minlength="1" maxlength="2" style="height:20px; width: 250px;"  required>
        </p>


         <!--PLAZA-->
         <p>
         <label for="nombre" style="">Plaza:</label><br>
         <input type="text" name="plaza" maxlength="3" style="height:20px; width: 250px;" required>
         </p>

          <br/><br/>
        </center>
    </table>
    </div>
  <center> 
    <input type="submit" name="submit" value="Ocupar plaza" id="boton_personalizado">
 <input type="reset" name="clear" value="Borrar" id="boton_personalizado" >
  </center>
</form>
        </div>
        </div>
    </div>
  </div>

</body>
</html>
