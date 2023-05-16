<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="./img/logo.jpeg"/>
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
            <a href="principal.php"><img src="./img/logo.jpeg" width="60px"></a>
            <label>NOMBRE_EMPRESA</label>
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
      
        <form action="registrar-usuario.php" method="post" >
 <div>
  <br>
    <table>

      <center>
              <!--Nombre Usuario-->
        <p>
         <label for="nombre">Usuario:</label><br>
         <input type="text" name="username" maxlength="32" style="height:20px; width: 250px;" required>
        </p>

         <!--Password-->
         <p>
         <label for="pass" style="">Password:</label><br>
         <input type="password" name="password" minlength="8" maxlength="16" style="height:20px; width: 250px;" placeholder="Min. 8 caracteres - Max. 16" required>
        </p>


         <!--correo-->
         <p>
         <label for="nombre" style="">Correo electrónico:</label><br>
         <input type="text" name="correo" maxlength="50" style="height:20px; width: 250px;" required>
         </p> 
          
          <!--nombre parking-->
          <p>
          <label for="nombre" style="">Nombre del parking:</label><br>
          <input type="text" name="nom_parking" maxlength="40" minlength="5" style="height:20px; width: 250px;" placeholder="Min. 5 caracteres - Max. 40" required>
          </p>

           <!--planta-->
          <p>
          <label for="nombre" style="">Plantas:</label><br>
          <input type="text" name="plantas" maxlength="2" minlength="1" style="height:20px; width: 250px;" placeholder="1-99" required>
         </p>
          
          <!--plazas por planta-->
          <p>
          <label for="nombre" style="">Plazas:</label><br>
          <input type="text" name="plazas" maxlength="2" style="height:20px; width: 250px;" placeholder="1-99" required>
          </p>

          <br/><br/>
        </center>
    </table>
    </div>
  <center> 
            <!--validar-->

    <input type="submit" name="submit" value="Registrarme" id="boton_personalizado">
 <input type="reset" name="clear" value="Borrar" id="boton_personalizado" >
  </center>
</form>

          
        </div>
      </div>
    </div>
  </body>
</html>
  </body>
</html>