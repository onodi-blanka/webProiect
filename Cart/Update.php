<?php
include("../ConnectDB.php");
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
                if ($stmt = $mysqli->prepare("UPDATE cart SET UserID=?,EventID=?,NumberOfTickets=? WHERE id='".$ID."'")){
                    $stmt->bind_param("iiii", $UserID, $EventID, $NumberOfTickets);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    echo "ERROR: nu se poate executa update.";
                }
            }
        } else {
            echo "id incorect!";
        }
    }
}
?>

