<?php
global $mysqli;
include("../ConnectDB.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
    $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
    $SpeakerID= htmlentities($_POST['SpeakerID'], ENT_QUOTES);
// verificam daca sunt completate
    if ($EventID == '' || $SpeakerID == '')
    {
// daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';
    } else {
// insert
        if ($stmt = $mysqli->prepare("INSERT INTO eventspeakers (EventID, SpeakerID) VALUES (?, ?)")) {
            $stmt->bind_param("ii", $EventID, $SpeakerID);
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
