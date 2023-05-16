<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="./img/.jpg"/>
    <link rel="stylesheet" href="./style.css">
    <title>NOMBRE_EMPRESA</title>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
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
            <a href="principal.php"><img src="./img/.jpg" width="60px"></a>
            <label>NOMBRE_EMPRESA</label>
          </div>
          <div style="float: left; margin-left: 1200px;" class="dropdown">
            <button class="mainmenubtn">Main Menu</button>
            <div class="dropdown-child">
            <a href="principal.php">INICIO</a>
            <a href="areaPersonal.html">AREA PERSONAL</a>
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
          height: 700px;
          width: 1500px;
          margin: 0px 50px 10px 0px;">

        <div style="background-color: #fafbfd; 
      border: 2px solid;
      border-color: grey;
      border-radius: 55px;
      height: 600px;
      width: 1200px;
      margin: 50px 50px 10px 0px;
      ">
      
          <?php
              $data = json_decode( file_get_contents('http://localhost:8080/reload/%7B%22id%22:%22646201d4a372384ee535402a%22%7D'),true);
              $contador = 0;
              echo "<table style='padding-top:100px;'>";
                echo "<tr><td> Nombre del administrador: ";
                echo $data["username"];
                echo "</td></tr>  ";
                echo "<tr><td> Contraseña: ";
                echo $data["password"];
                echo "</td></tr>";
                echo "<tr><td> Email: ";
                echo $data["email"];
                echo "</td></tr>";
              echo "</table>";
             // var_dump($data);
          ?>    

          
        </div>
      </div>
    </div>
  </body>
</html>
  </body>
</html>