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
                <div id="tooplate_sidebar">
                    <div class="sb_box">
                        <h3>Categories</h3>
                    </div>

                </div> <!-- end of sidebar -->
                 <?php
                include("include/connessione.php");
                $sql= "select * from faq ";
                
               
                
                $conn=mysqli_connect($HOST, $USER, $PASSWORD,$DB);
                    $ris=mysqli_query($conn, $sql);
                    while ( $row=mysqli_fetch_assoc($ris)) {
                            $id=$row["id"];
                            $do=$row["domanda"];
                            $ri=$row["risposta"];
                         
                      
                echo ' <div id="tooplate_content">';
                echo '<div class="latofoto">';
                echo "<p>DOMANDE:</p>";
                echo "<p> $do </p>";
                echo '<br></br>';
                echo "<p>$ri</p>";
                echo '<br></br>';
                echo '<div class="cleaner h20"></div>';
                echo '<br class="cleaner" />';
                echo '<hr> </hr>';
                echo '</div>';
                    }
                   
                    
                mysqli_free_result($ris);
                mysqli_close($conn);
            ?>
                


                <div class="cleaner"></div>
            </div>
            <!-- end of main -->
            <div class="cleaner"></div>
        
        <div id="tooplate_footer">
            <footer>
                
                <p class="footer1"><a href="FAQ12.php">FAQ</a></p>
                <p class="footer1" ><a href="chi_siamo.html">Chi Siamo</a></p>
                <p class="footer1"><a href="lavora_con_noi.html">Lavora Con Noi</a></p>
                
                 
                Copyright © 2048 Company Name </footer> 
        </div>
        </div> <!-- end of main -->	


    </body>
</html>