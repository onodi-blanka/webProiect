<?php
global $mysqli;
include("../DBController.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
    $Name = htmlentities($_POST['Name'], ENT_QUOTES);
    $Date= htmlentities($_POST['Date'], ENT_QUOTES);
    $Location = htmlentities($_POST['Location'], ENT_QUOTES);
    $Tickets = htmlentities($_POST['Tickets'], ENT_QUOTES);
    $ContactName = htmlentities($_POST['ContactName'], ENT_QUOTES);
    $ContactPhone = htmlentities($_POST['ContactPhone'], ENT_QUOTES);
    $ContactEmail = htmlentities($_POST['ContactEmail'], ENT_QUOTES);
// verificam daca sunt completate
    if ($Name == '' || $Date == ''||$Location==''||$Tickets==''||$ContactName==''||$ContactPhone==''||$ContactEmail=='')
    {
// daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';
    } else {
// insert
        if ($stmt = $mysqli->prepare("INSERT INTO event (Name, Date, Location, Tickets, ContactName, ContactPhone, ContactEmail) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
            $stmt->bind_param("sssisss", $Name, $Date, $Location, $Tickets, $ContactName, $ContactPhone, $ContactEmail);
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
