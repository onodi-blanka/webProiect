<?php // connectare bazadedate
global $mysqli;
include("../DBController.php");
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
        $StartTime = htmlentities($_POST['StartTime'], ENT_QUOTES);
        $EndTime = htmlentities($_POST['EndTime'], ENT_QUOTES);
        $ActivityDetails = htmlentities($_POST['ActivityDetails'], ENT_QUOTES);
        $SpeakerID = htmlentities($_POST['SpeakerID'], ENT_QUOTES);
// verificam daca numele, prenumele, an si grupa nu sunt goale
        if ($EventID == '' || $StartTime == ''||$EndTime==''||$ActivityDetails==''||$SpeakerID=='')
        { // daca sunt goale afisam mesaj de eroare
            echo "<div> ERROR: Completati campurile obligatorii!</div>";
        }else
        { // daca nu sunt erori se face update name, code, image, price, descriere, categorie
            if ($stmt = $mysqli->prepare("UPDATE agenda SET EventID=?, StartTime=?, EndTime=?, ActivityDetails=?, SpeakerID=? WHERE ID='".$ID."'")) {

                $stmt->bind_param("iddsi", $EventID, $StartTime,$EndTime,$ActivityDetails,$SpeakerID);
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
