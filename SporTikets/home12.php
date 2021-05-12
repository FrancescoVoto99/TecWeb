<!DOCTYPE html>
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
             
                <form action="home12.php" method="post">
                    <fieldset title="Cerca nelle descrizioni ">
                        <legend>Cerca nelle descrizioni</legend>
                        <input type="text" name="cerca" placeholder="Ricerca" />
                        <input type="submit" value="Cerca"/>
                    </fieldset>
                </form>
            <br></br>    
            
                 <fieldset title="Luogo ">     
                <form action="home12.php" method="post" >
                <fieldset title="Scegli una categoria">
                    <legend>Categorie</legend>
                <label><input type="checkbox" name="cate[]" value="calcio" >Calcio </label><br></br>
                <label><input type="checkbox" name= "cate[]" value="basket">Basket</label><br></br>
                <label><input type="checkbox" name= "cate[]" value="pallavolo">Pallavolo</label><br></br>
                </fieldset>
                
            <br></br>
                
               
                <fieldset title="Scegli la data dell'evento">
                <legend>Data</legend>
                <input type="date" name= "data" /><br></br>
                </fieldset>
                <br></br>
                
                
        
                <fieldset title="Luogo ">
                    <legend>Luogo</legend>
                <input type=hidden name=reg[] value=reggg><!--STQ:ITREGION-->
                <div ID="divITREGION" style="display:inline"><p><span ID='errITREGION'></span>&nbsp; 
                        <select name="regg[]" multiple>
                    <option value="Abruzzo" >Abruzzo
                    <option value="Basilicata" >Basilicata
                    <option value="Calabria" >Calabria
                    <option value="Campania" >Campania
                    <option value="Emilia Romagna" >Emilia-Romagna
                    <option value="Friuli Venezia Giulia" >Friuli-Venezia Giulia
                    <option value="Lazio" >Lazio
                    <option value="Liguria" >Liguria
                    <option value="Lombardia" >Lombardia
                    <option value="Marche" >Marche
                    <option value="Molise" >Molise
                    <option value="Piemonte" >Piemonte
                    <option value="Puglia" >Puglia
                    <option value="Sardegna" >Sardegna
                    <option value="Sicilia" >Sicilia
                    <option value="Toscana" >Toscana
                    <option value="Trentino Alto Adige" >Trentino-Alto Adige
                    <option value="Umbria" >Umbria
                    <option value="Valle d'Aosta" >Valle d'Aosta
                    <option value="Veneto" >Veneto
             </select></div><!--EDQ:ITREGION-->
                </fieldset>
                <br></br>

                <input type="submit" value="Invia">
                </fieldset>
                </form>
            </div>
            </div>    
             
            <?php
                include("include/connessione.php");
                $sql= "select * from eventi ";
                $conn=mysqli_connect($HOST, $USER, $PASSWORD,$DB);
                
                
                
                
                
                //inizio filtro di ricerca
                $result='';
                if(isset($_POST["cerca"])){
                $result='';
                $cerca=$_POST["cerca"];
                $sql="SELECT * FROM eventi WHERE descrizione like '%".$cerca."%'";
                $result=$conn->query($sql);
                if($result->num_rows >0){  
                }else{
                    echo" Nessn evento trovato ";
                }}//fine filtro di ricerca
                
                
                
                
                if(isset($_POST["cate"])){
                    $stringa="";
                for($i=0;$i<sizeof($_POST["cate"]);$i++){
                    if($i==(sizeof($_POST["cate"])-1))
                    $stringa .= "categoria = '" . $_POST["cate"][$i] . "'" ;
                else
                    $stringa .= "categoria = '" . $_POST["cate"][$i] . "' or ";}
                $sql .= "where " . $stringa;
                
                }
                $new_date;
                if(isset($_POST["data"])){
                $new_date = date('Y-m-d', strtotime($_POST['data']));
                if($new_date != "1970-01-01" ){
                if (isset($_POST["cate"])) $sql .= " and dataOra = '$new_date'";
                else $sql .= "where DATE(dataOra) = DATE('$new_date')";
                }}
                
                if(isset($_POST["regg"])){
                    $stringa="";
                for($i=0;$i<sizeof($_POST["regg"]);$i++){
                    if($i==(sizeof($_POST["regg"])-1))
                    $stringa .= "regione = '" . $_POST["regg"][$i] . "'" ;
                else
                    $stringa .= "regione = '" . $_POST["regg"][$i] . "' or ";}
                if(isset($_POST["cate"]) || $new_date != "1970-01-01" )
                $sql .= " and " . $stringa;
                else $sql .= "where " . $stringa;
                }
                
                $ris=mysqli_query($conn, $sql);
                    while ( $row=mysqli_fetch_assoc($ris)) {
                            $id=$row["id"];
                            $no=$row["nomeEvento"];
                            $de=$row["descrizione"];
                            $pr=$row["prezzo"];
                            $di=$row["bigliettiDisponibili"];
                                //$sc=$row["sconto"];
                echo ' <div id="tooplate_content">';
                echo "<h2><a name='$id' href='evento.php?id=$id'>$no</a></h2>";
                echo '<img src="images/tooplate_image_04.png" alt="Image 04" />';
                echo '<div class="latofoto">';
                echo "<p>Prezzo: $pr</p>";
                echo '<br></br>';
                echo "<p>Biglietti disponibili: $di </p>";
                echo '</div>';
                echo '<br></br><br></br>';
                echo "<p>$de</p>";
                echo '<div class="cleaner h20"></div>';
                echo '<br class="cleaner" />';
                echo '<hr> </hr>';
                echo '</div>';
                    }
                   
                    
                mysqli_free_result($ris);
                mysqli_close($conn);
            ?>
            <div class="cleaner"></div>
            </div>  <!-- end of main -->
            <div class="cleaner"></div>
            <div id="tooplate_footer">
            <footer>
                
                <p class="footer1"><a href="FAQ12.php">FAQ</a></p>
                <p class="footer1"><a href="chi_siamo.html">Chi Siamo</a></p>
                <p class="footer1"><a href="lavora_con_noi.html">Lavora Con Noi</a></p>
                Copyright © 2048 Company Name 
            </footer> 
            </div>
        </div> <!-- end of main -->
    </body>
</html>