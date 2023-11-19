<?php
global $mysqli;
include("../DBController.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
    $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
    $StartTime = htmlentities($_POST['StartTime'], ENT_QUOTES);
    $EndTime = htmlentities($_POST['EndTime'], ENT_QUOTES);
    $ActivityDetails = htmlentities($_POST['ActivityDetails'], ENT_QUOTES);
    $SpeakerID = htmlentities($_POST['SpeakerID'], ENT_QUOTES);
// verificam daca sunt completate
    if ($EventID == '' || $StartTime == ''||$EndTime==''||$ActivityDetails==''||$SpeakerID=='')
    {
// daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';
    } else {
// insert
        if ($stmt = $mysqli->prepare("INSERT into agenda (EventID, StartTime, EndTime, ActivityDetails, SpeakerID) VALUES (?, ?, ?, ?, ?)"))
        {
            $stmt->bind_param("iddsi", $EventID, $StartTime,$EndTime,$ActivityDetails,$SpeakerID);
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
