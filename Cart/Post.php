<?php
require_once "Cart.php";
$db = new DBController();
$cart = new Cart();
$error = '';

if (isset($_POST['submit'])) {
    $UserID = htmlentities($_POST['UserID'], ENT_QUOTES);
    $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
    $NumberOfTickets = htmlentities($_POST['NumberOfTickets'], ENT_QUOTES);

    if ($UserID == '' || $EventID == '') {
        $error = 'ERROR: Campuri goale!';
    } else {
        $db->getConnection()->begin_transaction();

        try {
            $cart->addToCart($UserID, $EventID);

            if ($stmt = $db->getConnection()->prepare("UPDATE event SET Tickets = Tickets - 1 WHERE ID = ?")) {
                $stmt->bind_param("ii", $NumberOfTickets, $EventID);
                $stmt->execute();
                $stmt->close();

                if ($db->getConnection()->affected_rows > 0) {
                    // Confirmare tranzacție
                    $db->getConnection()->commit();
                    echo "Achiziție realizată cu succes!";
                } else {
                    throw new Exception("Nu s-au putut actualiza biletele.");
                }
            } else {
                throw new Exception("Nu se poate executa update pe Event.");
            }
        } catch (Exception $e) {
            $db->getConnection()->rollback();
            echo "Eroare la achiziție: " . $e->getMessage();
        }
    }
}
$db->getConnection()->close();
?>

