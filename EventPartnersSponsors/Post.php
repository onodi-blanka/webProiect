<?php
global $mysqli;
include("../DBController.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
    $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
    $PartnerSponsorID = htmlentities($_POST['PartnerSponsorID'], ENT_QUOTES);
// verificam daca sunt completate
    if ($EventID == '' || $PartnerSponsorID == '')
    {
// daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';
    } else {
// insert
        if ($stmt = $mysqli->prepare("INSERT INTO eventpartnerssponsors (EventID, PartnerSponsorID) VALUES (?, ?)")) {
            $stmt->bind_param("ii", $EventID, $PartnerSponsorID);
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
