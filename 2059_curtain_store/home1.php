<html>
    <head>
        <title>Home</title>
        <link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
    </head>
    <body>
        <div id="tooplate_wrapper">
            <div id="tooplate_header">
                <div id="site_title">
                    <h1><a href="home.html">SportTikets</a></h1>
                </div>

                <div id="tooplate_menu" class="ddsmoothmenu">
                    <ul>
                        <li><a href="home.html" class="selected">Home </a></li>
                        <li><a href="login.html" >Login</a></li>
                        <li><a href="registrati.html" >Registrati</a></li>
                    </ul>
                    <br style="clear: left" />
                </div> <!-- end of menu -->
            </div>

            <div id="tooplate_main">
                <div id="tooplate_sidebar">
                    <div class="sb_box">
                        <h3>CATEGORIE</h3>
                        <p>EVENTO 1</p>
                        <p>EVENTO 2</p>
                    </div>

                </div> <!-- end of sidebar -->
                <?php
              include("include/connessione.php");
              
              $conn=mysqli_connect($HOST, $USER, $PASSWORD,$DB);
              $ris=mysqli_query($conn, "select * from eventi");
              
                      while ( $row=mysqli_fetch_assoc($ris)) {
                                $id=$row["id"];
				$no=$row["nomeEvento"];
				$de=$row["descrizione"];
                                //header("Content-Type:/jpeg ");
                                //$da=$row["dati"];
				//$do=$row["dataOra"];
				//$lu=$row["luogo"];
                                //$ca=$row["categoria"];
                                //$ra=$row["raggiungere"];
                                $pr=$row["prezzo"];
                                $di=$row["bigliettiDisponibili"];
                                //$ve=$row["bigliettiVenduti"];
                                //$to=$row["IncassoTotale"];
                                //$sc=$row["sconto"];
               
			  mysqli_free_result($ris);
              mysqli_close($conn);
              echo ' <div id="tooplate_content">';
                 echo "<h2><a href='evento.html?$id'>$no</a></h2>";
                  echo '  <img src="images/tooplate_image_04.png" alt="Image 04" />';
                  echo '  <div class="latofoto">';
                   echo " <p>Prezzo: $pr</p>";
                   echo ' <br></br>';
                  echo " <p>Biglietti disponibili: $di </p>";
                  echo '  </div>';
                 echo '   <br></br><br></br>';
                    
                    
                echo "    <p>$de</p>";
                        
                 echo '   <div class="cleaner h20"></div>';
                    
                echo '    <br class="cleaner" />';
              echo '<hr> </hr>';
                        echo '  </div>';
              
                          }
            ?>
                
                


                <div class="cleaner"></div>
            </div> 
            <!-- end of main -->

            <div class="cleaner"></div>
        
        <div id="tooplate_footer">
            <footer>
                
                <p class="footer1"><a href="FAQ.html">FAQ</a></p>
                <p class="footer1" ><a href="chi_siamo.html">Chi Siamo</a></p>
                <p class="footer1"><a href="lavora_con_noi.html">Lavora Con Noi</a></p>
                
                 
                Copyright © 2048 Company Name </footer> 
        </div>
        </div> <!-- end of main -->
    </body>
</html>