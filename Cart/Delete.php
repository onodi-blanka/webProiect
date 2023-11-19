<?php
require_once "../DBController.php";
require_once "../Cart.php";

$db = new DBController();
$cart = new Cart($db);

if (isset($_GET['ID']) && is_numeric($_GET['ID'])) {
    $ID = $_GET['ID'];

    $cart->removeFromCart($ID);

    echo "<div>Inregistrarea a fost stearsa!</div>";
} else {
    echo "<div>ID invalid sau lipsă.</div>";
}

echo "<p><a href=\"Get.php\">Înapoi la lista de articole</a></p>";
?>

