<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Evento</title>
     <link href="css/tooplate_style.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />
    </head>
    <body>

        <div id="tooplate_wrapper">
            <div id="tooplate_header">
                <div id="site_title">
                    <h1><a href="home12.php">SportTikets</a></h1>
                </div>

                <div id="tooplate_menu" class="ddsmoothmenu">
                    <ul>
                        <li><a href="home12.php" class="selected">Home </a></li>
                        <li><a href="login.html" >Login</a></li>
                        <li><a href="registrati.html" >Registrati</a></li>
                    </ul>
                    <br style="clear: left" />
                </div> <!-- end of menu -->
            </div>

            <div id="tooplate_main">
               
            <?php
              include("include/connessione.php");
              
              $conn=mysqli_connect($HOST, $USER, $PASSWORD,$DB);
              $stringa = "select * from eventi ";
              $stringa .= "where id = '" . $_GET['id'] . "'";
              $ris=mysqli_query($conn, $stringa);
              
			  while ( $row=mysqli_fetch_assoc($ris)) {
                                $id=$row["id"];
				$no=$row["nomeEvento"];
				$de=$row["descrizione"];
                                //header("Content-Type:/jpeg ");
                                //$da=$row["dati"];
				$do=$row["dataOra"];
				$lu=$row["luogo"];
                                $ca=$row["categoria"];
                                $ra=$row["raggiungere"];
                                $pr=$row["prezzo"];
                                $di=$row["bigliettiDisponibili"];
                                $ve=$row["bigliettiVenduti"];
                                $to=$row["IncassoTotale"];
                                $sc=$row["sconto"];
               }
              mysqli_free_result($ris);
              mysqli_close($conn);
              
           
            echo'<div id="tooplate_content">';
            echo"<h2>$no</h2>";
            echo'<img style="float: left" src="images/tooplate_image_04.png" alt="Image 04" />';
            echo'<div class="latofoto1">';
            echo" <p>Data:$do</p>";
            echo'<br></br>';
            echo"<p>Prezzo:$pr</p>";
            echo'<br></br>';
            echo"<p>Biglietti disponibili:$di</p>";
            echo'<br></br>';
            echo'</div>';
            echo'<div class="sottofoto">';
            echo"<p>$de</p>";
            echo'</div>';
            echo'<br></br>';
            echo'<div style="float: left">';
            echo"<iframe src=$lu width='250' height='150'></iframe>";
            echo'</div>';
            echo'<p class="latofoto1"> come raggiungerci'; 
            echo'<br></br>';  
            echo"<p>$ra</p>";
            echo'<div class="cleaner h20"></div>';
            echo'<br class="cleaner" />';
            echo'<hr></hr>';
            echo'</div>';
            echo'<div class="cleaner"></div>';
            ?>
            
        </div> <!-- end of main -->	

        <div id="tooplate_footer">
            <footer>
                
                <p class="footer1"><a href="FAQ.html">FAQ</a></p>
                <p class="footer1" ><a href="chi_siamo.html">Chi Siamo</a></p>
                <p class="footer1"><a href="lavora_con_noi.html">Lavora Con Noi</a></p>
                
                
            </footer> 
        </div>
        </div> <!-- end of main -->
        </body>
</html>