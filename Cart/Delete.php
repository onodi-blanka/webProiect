<?php
include("../ConnectDB.php");

if (isset($_GET['ID']) && is_numeric($_GET['ID'])) {
    $ID = $_GET['ID'];

    if ($stmt = $mysqli->prepare("DELETE FROM cart WHERE ID = ? LIMIT 1")) {
        $stmt->bind_param("i", $ID);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "ERROR: Nu se poate executa delete.";
    }
    $mysqli->close();
    echo "<div>Inregistrarea a fost stearsa!</div>";
}
echo "<p><a href=\"Get.php\">Index</a></p>";
?>
