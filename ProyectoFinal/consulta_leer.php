<?php

            $filtro=$_POST['filtro'];

            $servername = "localhost";
            $database = "";
            $username = "jero";
            $password = "jero1";
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $database);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            
            function mostrarDatos ($resultados,$c) {

              if ($resultados !=NULL) {

               /* if ($filtro ==""||$filtro =="default") {
                  echo "1";
                }
                if ($filtro =="nombre") {
                  echo "2";
                }
                if ($filtro =="mayor_p") {
                  echo "3";
                }
                if ($filto =="menor_p") {
                  echo "4";
                }
                 */ 
                $rebaja = $resultados['PRECIO']-$resultados['PRECIO']*$resultados['DES_MAX']/100;
                  echo "<div id='div".$c."' style='background-color: #F5F5DC; 
                    border: 2px solid;
                    border-color: grey;
                    height: 400px;
                    width: 300px;
                    margin: 80px 50px 10px 0px;
                    float: left;'>";

                  echo "<img src='".$resultados['IMAGEN']."' width='200px' height='120px'><br/>";

                  echo "<p>Se vende ".$resultados['MARCA']." ".$resultados['MODELO'].". Se trata de un ".$resultados['TIPO']." con ".number_format($resultados['KM'])." Km de ".$resultados['POTENCIA']." CV.</p>";

                  echo "<table>";


                  echo "<tr><td><b>Lugar:</b> ".$resultados['CIUDAD_ORIGEN'].", ".$resultados['PAIS_ORIGEN']." </td></tr>";

                  echo "<tr><td><b>Descripción del vendedor:</b> ".$resultados['DECRIPCION'].". </td></tr>";

                  if ($resultados['DES_MAX']!=0){
                    
                    echo "<td><b>Precio original: </b><del>".number_format($resultados['PRECIO'])."</del> €</td></tr>";
                    echo "<tr><td><b>Precio rebajado: </b>".number_format($rebaja)."€<br>";
                    
                  }else{
                    echo "<td><b>Precio original: </b> ".number_format($resultados['PRECIO'])." €</td></tr>";
                  }


                  if ($resultados['DES_MAX']>50) {
                    echo "<br><center><b>AQUÍ HUELE A CHOLLO</b><img src='https://c.tenor.com/H6sjheSkU1wAAAAC/noice-nice.gif' width='50px' height='30px'></center>";
                  }
                  echo "</td></tr>";
                  echo "</table>";

                  echo "<br><a class='player-btn a".$c."' id='a".$c."' style='background-color: lightblue;display: inline-block;padding: 8px 30px;color: #fff;cursor: pointer; width: 100px;height: 20px;' href='fin_compra.php?marca=".$resultados['MARCA']."&modelo=".$resultados['MODELO']."&email=".$resultados['EMAIL']."&nombre=".$resultados['NOMBRE']."&tlf=".$resultados['TLF']."&apellidos=".$resultados['APELLIDOS']."&DECRIPCION=".$resultados['DECRIPCION']."&rebaja=".number_format($rebaja)."&img=".$resultados['IMAGEN']."&porc=".$resultados['DES_MAX']."' disabled>Comprar ahora</a>";

                  echo "</div>";
                  

                  if ($resultados['RESERVADO'] == true) {
                    echo "<script> document.getElementById('div".$c."').style.opacity = 0.4;";
                    echo " document.getElementById('a".$c."').classList.remove('a".$c."');
                          document.getElementById('a".$c."').classList.add('not_active');</script>";
                  }

                
              
            }

            else {echo "<br/>No hay más datos: <br/>".$resultados;}

            }

            $result = mysqli_query($conn, "SELECT MARCA,MODELO,COLOR,COMBUSTIBLE,TIPO,POTENCIA,CIUDAD_ORIGEN,PAIS_ORIGEN,DECRIPCION,DES_MAX,IMAGEN,PRECIO,KM,TLF,NOMBRE,APELLIDOS,EMAIL,RESERVADO FROM coches");
            $cont = 0;
            $c = 0;
            while ($fila = mysqli_fetch_array($result)){

              mostrarDatos($fila,$c);

              $cont++;
              $c++;

              if ($cont == 3) {
                
                $cont = 0;

              }

            }
            
            mysqli_free_result($result);

            mysqli_close($conn);           
                      ?>