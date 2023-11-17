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
        $Date= htmlentities($_POST['Date'], ENT_QUOTES);
        $Location = htmlentities($_POST['Location'], ENT_QUOTES);
        $Tickets = htmlentities($_POST['Tickets'], ENT_QUOTES);
        $ContactName = htmlentities($_POST['ContactName'], ENT_QUOTES);
        $ContactPhone = htmlentities($_POST['ContactPhone'], ENT_QUOTES);
        $ContactEmail = htmlentities($_POST['ContactEmail'], ENT_QUOTES);
// verificam daca numele, prenumele, an si grupa nu sunt goale
        if ($Name == '' || $Date == ''||$Location==''||$Tickets==''||$ContactName==''||$ContactPhone==''||$ContactEmail=='')
        { // daca sunt goale afisam mesaj de eroare
            echo "<div> ERROR: Completati campurile obligatorii!</div>";
        }else
        { // daca nu sunt erori se face update name, code, image, price, descriere, categorie
            if ($stmt = $mysqli->prepare("UPDATE  event SET (Name, Date, Location, Tickets, ContactName, ContactPhone, ContactEmail) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
                $stmt->bind_param("sssisss", $Name, $Date, $Location, $Tickets, $ContactName, $ContactPhone, $ContactEmail);
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

