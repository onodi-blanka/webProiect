<?php
require_once "Cart.php";

$cart = new Cart();
$error = '';

if (!empty($_POST['ID'])) {
    if (isset($_POST['submit'])) {
        if (is_numeric($_POST['ID'])) {
            $ID = $_POST['ID'];
            $UserID = htmlentities($_POST['UserID'], ENT_QUOTES);
            $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
            $NumberOfTickets = htmlentities($_POST['NumberOfTickets'], ENT_QUOTES);

            if ($UserID == '' || $EventID == '' || $NumberOfTickets == '') {
                echo "<div>ERROR: Completati campurile obligatorii!</div>";
            } else {

                $cart->updateCart();
            }
        } else {
            echo "id incorect!";
        }
    }
}
?>

