<?php
global $mysqli;
include("../ConnectDB.php");
$error='';
if (isset($_POST['submit']))
{
// preluam datele de pe formular
    $Name = htmlentities($_POST['Name'], ENT_QUOTES);
    $Password = htmlentities($_POST['Password'], ENT_QUOTES);
    $Email = htmlentities($_POST['Email'], ENT_QUOTES);
    $isAdmin = htmlentities($_POST['isAdmin'], ENT_QUOTES);
// verificam daca sunt completate
    if ($Name == '' || $Password == ''||$Email=='' ||$isAdmin=='')
    {
// daca sunt goale se afiseaza un mesaj
        $error = 'ERROR: Campuri goale!';
    } else {
// insert
        if ($stmt = $mysqli->prepare("INSERT into users (Name, Password, Email, isAdmin) VALUES (?, ?, ?, ?)"))
        {
            $stmt->bind_param("sssb", $Name, $Password, $Email, $isAdmin);
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
