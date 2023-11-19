<?php
require_once "Cart.php";

$cart = new Cart();
$error = '';

if (isset($_POST['submit'])) {
    $UserID = htmlentities($_POST['UserID'], ENT_QUOTES);
    $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
    $NumberOfTickets = htmlentities($_POST['NumberOfTickets'], ENT_QUOTES);

    if ($UserID == '' || $EventID == '' || $NumberOfTickets == '') {
        $error = 'ERROR: Campuri goale!';
    } else {
        $db->begin_transaction();

        try {
            $cart->addToCart($UserID, $EventID, $NumberOfTickets);

            if ($stmt = $db->prepare("UPDATE event SET Tickets = Tickets - ? WHERE ID = ?")) {
                $stmt->bind_param("ii", $NumberOfTickets, $EventID);
                $stmt->execute();
                $stmt->close();

                if ($db->affected_rows > 0) {
                    // Confirmare tranzacție
                    $db->commit();
                    echo "Achiziție realizată cu succes!";
                } else {
                    throw new Exception("Nu s-au putut actualiza biletele.");
                }
            } else {
                throw new Exception("Nu se poate executa update pe Event.");
            }
        } catch (Exception $e) {
            $db->rollback();
            echo "Eroare la achiziție: " . $e->getMessage();
        }
    }
}
$db->close();
?>

