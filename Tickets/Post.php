<?php
global $mysqli;
include("../DBController.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
    $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
    $UserID= htmlentities($_POST['UserID'], ENT_QUOTES);
    $Status = htmlentities($_POST['Status'], ENT_QUOTES);
// verificam daca sunt completate
    if ($EventID == '' || $UserID == ''||$Status=='')
    {
// daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';
    } else {
// insert
        if ($stmt = $mysqli->prepare("INSERT INTO tickets (EventID, UserID, Status) VALUES (?, ?, ?)")) {
            $stmt->bind_param("iis", $EventID, $UserID, $Status);
            $stmt->execute();
            $stmt->close();
        }

// eroare le inserare
        else
        {
            echo "ERROR: Nu se poate executa insert.";
        }
    }
}
// se inchide conexiune mysqli
$mysqli->close();
?>
