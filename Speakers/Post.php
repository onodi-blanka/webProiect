<?php
global $mysqli;
include("../ConnectDB.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
    $Name = htmlentities($_POST['Name'], ENT_QUOTES);
    $Details= htmlentities($_POST['Details'], ENT_QUOTES);
// verificam daca sunt completate
    if ($Name == '' || $Details == '')
    {
// daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';
    } else {
// insert
        if ($stmt = $mysqli->prepare("INSERT INTO speakers (Name, Details) VALUES (?, ?)")) {
            $stmt->bind_param("st", $Name, $Details);
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
