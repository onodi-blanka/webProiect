<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Vizualizare Inregistrari</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Inregistrarile din tabela tickets</h1>
<p><b>Toate inregistrarile din tickets</b</p>
<?php
// connectare bazadedate
include("../ConnectDB.php");
// se preiau inregistrarile din baza de date
if ($result = $mysqli->query("SELECT * FROM tickets ORDER BY ID "))
{ // Afisare inregistrari pe ecran
    if ($result->num_rows > 0)
    {
// afisarea inregistrarilor intr-o table
        echo "<table border='1' cellpadding='10'>";
// antetul tabelului
        echo "<tr><th>ID</th><th>EventID</th><th>UserID
</th><th>Status</th><th></th><th></th><th></th></tr>";
        while ($row = $result->fetch_object())
        {
// definirea unei linii pt fiecare inregistrare
            echo "<tr>";
            echo "<td>" . $row->ID . "</td>";
            echo "<td>" . $row->EventID . "</td>";
            echo "<td>" . $row->UserID	 . "</td>";
            echo "<td>" . $row->Status . "</td>";
            echo "<td><a href='Update.php?ID=" . $row->ID . "'>Modificare</a></td>";
            echo "<td><a href='Delete.php?ID=" .$row->ID . "'>Stergere</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
// daca nu sunt inregistrari se afiseaza un rezultat de eroare
    else
    {
        echo "<p>Nu sunt inregistrari in tabela!</p>";
    }
}
// eroare in caz de insucces in interogare
else
{ echo "Error: " . $mysqli->error(); }
// se inchide
$mysqli->close();
?>
<a href="Post.php">Adaugarea unei noi inregistrari</a>
</body>
</html>

