<?php
include("../ConnectDB.php");
$error = '';

if (isset($_POST['submit'])) {
    $UserID = htmlentities($_POST['UserID'], ENT_QUOTES);
    $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
    $NumberOfTickets = htmlentities($_POST['NumberOfTickets'], ENT_QUOTES);

    if ($UserID == '' || $EventID == '' || $NumberOfTickets == '') {
        $error = 'ERROR: Campuri goale!';
    } else {
        // Începeți tranzacția
        $mysqli->begin_transaction();

        try {
            // Inserare în Cart
            if ($stmt = $mysqli->prepare("INSERT INTO cart (UserID, EventID, NumberOfTickets) VALUES (?, ?, ?)")) {
                $stmt->bind_param("iii", $UserID, $EventID, $NumberOfTickets);
                $stmt->execute();
                $stmt->close();
            } else {
                throw new Exception("Nu se poate executa insert.");
            }

            // Actualizare Event
            if ($stmt = $mysqli->prepare("UPDATE event SET Tickets = Tickets - ? WHERE ID = ?")) {
                $stmt->bind_param("ii", $NumberOfTickets, $EventID);
                $stmt->execute();
                $stmt->close();

                if ($mysqli->affected_rows > 0) {
                    // Confirmare tranzacție
                    $mysqli->commit();
                    echo "Achiziție realizată cu succes!";
                } else {
                    throw new Exception("Nu s-au putut actualiza biletele.");
                }
            } else {
                throw new Exception("Nu se poate executa update pe Event.");
            }
        } catch (Exception $e) {
            // Rollback în caz de eroare
            $mysqli->rollback();
            echo "Eroare la achiziție: " . $e->getMessage();
        }
    }
}
$mysqli->close();
?>

