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
        $EventID = htmlentities($_POST['EventID'], ENT_QUOTES);
        $SpeakerID= htmlentities($_POST['SpeakerID'], ENT_QUOTES);
// verificam daca numele, prenumele, an si grupa nu sunt goale
        if ($EventID == '' || $SpeakerID == '')
        { // daca sunt goale afisam mesaj de eroare
            echo "<div> ERROR: Completati campurile obligatorii!</div>";
        }else
        { // daca nu sunt erori se face update name, code, image, price, descriere, categorie
            if ($stmt = $mysqli->prepare("UPDATE eventspeakers SET (EventID, SpeakerID) VALUES (?, ?)")) {
                $stmt->bind_param("ii", $EventID, $SpeakerID);
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
