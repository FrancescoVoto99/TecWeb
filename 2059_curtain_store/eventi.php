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
              $ris=mysqli_query($conn, "select * from evento");
			  while ($row=mysqli_fetch_assoc($ris)) {
				$co=$row["Nome Evento"];
				$ti=$row["Data Evento"];
				$au=$row["Luogo Evento"];
				$pr=$row["Prezzo Evento"];
				$dv=$row["Biglietti venduti"];
                echo "<tr><td>$co</td><td>$ti</td><td>$au</td><td>$pr</td><td>$dv</td></tr>";
              }
			  mysqli_free_result($ris);
              mysqli_close($conn);
            ?>
        </table>
    </body>
</html>