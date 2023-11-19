<?php
// conectare la baza de date database
global $mysqli;
include("../DBController.php");
// se verifica daca id a fost primit
if (isset($_GET['ID']) && is_numeric($_GET['ID']))
{
// preluam variabila 'id' din URL
    $ID = $_GET['ID'];
// stergem inregistrarea cu ib=$id
    if ($stmt = $mysqli->prepare("DELETE FROM users WHERE ID = ? LIMIT 1"))
    {
        $stmt->bind_param("i",$ID);
        $stmt->execute();
        $stmt->close();
    }
    else
    {
        echo "ERROR: Nu se poate executa delete.";
    }
    $mysqli->close();
    echo "<div>Inregistrarea a fost stearsa!!!!</div>";
}
echo "<p><a href=\"Get.php\">Index</a></p>";
?>
