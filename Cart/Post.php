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
        if ($stmt = $mysqli->prepare("INSERT INTO cart (UserID, EventID, NumberOfTickets) VALUES (?, ?, ?)")) {
            $stmt->bind_param("iii", $UserID, $EventID, $NumberOfTickets);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "ERROR: Nu se poate executa insert.";
        }
    }
}
$mysqli->close();
?>


