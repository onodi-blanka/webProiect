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
        $Type= htmlentities($_POST['Type'], ENT_QUOTES);
        $Details = htmlentities($_POST['Details'], ENT_QUOTES);
// verificam daca numele, prenumele, an si grupa nu sunt goale
        if ($Name == '' || $Type == ''||$Details=='')
        { // daca sunt goale afisam mesaj de eroare
            echo "<div> ERROR: Completati campurile obligatorii!</div>";
        }else
        { // daca nu sunt erori se face update name, code, image, price, descriere, categorie
            if ($stmt = $mysqli->prepare("UPDATE partnerssponsors SET Name=?, Type=?, Details=? WHERE ID='" . $ID . "'")) {
                $stmt->bind_param("sst", $Name, $Type, $Details);
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
