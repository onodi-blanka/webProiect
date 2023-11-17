<?php // connectare bazadedate
global $mysqli;
include("../ConnectDB.php");
//Modificare datelor
// se preia id din pagina vizualizare
$error='';
if (!empty($_POST['ID']))
{ if (isset($_POST['submit']))
{ // verificam daca id-ul din URL este unul valid
    if (is_numeric($_POST['ID']))
    { // preluam variabilele din URL/form
        $ID = $_POST['ID'];
        $Name = htmlentities($_POST['Name'], ENT_QUOTES);
        $Password = htmlentities($_POST['Password'], ENT_QUOTES);
        $Email = htmlentities($_POST['Email'], ENT_QUOTES);
// verificam daca numele, prenumele, an si grupa nu sunt goale
        if ($Name == '' || $Password == ''||$Email=='')
        { // daca sunt goale afisam mesaj de eroare
            echo "<div> ERROR: Completati campurile obligatorii!</div>";
        }else
        { // daca nu sunt erori se face update name, code, image, price, descriere, categorie
            if ($stmt = $mysqli->prepare("INSERT into users (Name, Password, Email) VALUES (?, ?, ?)"))
            {
                $stmt->bind_param("sss", $Name, $Password,$Email);
                $stmt->execute();
                $stmt->close();
            }// mesaj de eroare in caz ca nu se poate face update
            else
            {echo "ERROR: nu se poate executa update.";}
        }
    }
// daca variabila 'id' nu este valida, afisam mesaj de eroare
    else
    {echo "id incorect!";} }}?>
