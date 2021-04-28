<html>
    <head>
        <meta charset="UTF-8">
        <title>Visualizza Dati DB</title>
    </head>
    <body>
        <h1 style="text-align: center;">Visualizzazione record nella tabella Eventi</h1>
        <table style="background-color:#ffffcc; border-collapse: collapse;" border>
            <tr><th>Nome</th><th>Data</th><th>luogo</th><th>Prezzo</th><th>biglietti</th></tr>
            <?php
              include("include/connessione.php");
              
              $conn=mysqli_connect($HOST, $USER, $PASSWORD,$DB);
              $ris=mysqli_query($conn, "select * from eventi");
              
			  while ($row=mysqli_fetch_assoc($ris)) {
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
                /*echo "<tr><td>$id</td><td>$no</td><td>$de</td><td><$da></td><td>$do</td><td>$lu</td><td>$ca</td><td>$ra</td><td>$pr</td><td>$di</td><td>$ve</td><td>$to</td><td>$sc</td></tr>";
                }*/
			  mysqli_free_result($ris);
              mysqli_close($conn);
            ?>
        </table>
    </body>
</html>