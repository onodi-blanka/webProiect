<?php
require_once "DBController.php";
require_once "Cart.php";

$db = new DBController();
$cart = new Cart($db);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <title>Vizualizare Înregistrări Cart</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<h1>Înregistrările din tabela Cart</h1>
<p><b>Toate înregistrările din Cart</b></p>

<?php
$UserID = $_SESSION['loggedin'];
$items = $cart->getCartItems($UserID); // Înlocuiește $userId cu ID-ul utilizatorului actual

if (!empty($items)) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>UserID</th><th>EventID</th><th>NumberOfTickets</th><th></th><th></th></tr>";

    foreach ($items as $row) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['UserID'] . "</td>";
        echo "<td>" . $row['EventID'] . "</td>";
        echo "<td>" . $row['NumberOfTickets'] . "</td>";
        echo "<td><a href='Update.php?ID=" . $row['ID'] . "'>Modificare</a></td>";
        echo "<td><a href='Delete.php?ID=" . $row['ID'] . "'>Stergere</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>Nu sunt înregistrări în tabela!</p>";
}
?>

<a href="Post.php">Adăugarea unei noi înregistrări</a>
</body>
</html>
