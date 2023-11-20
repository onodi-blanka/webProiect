<?php
if ($_SESSION['loggedin'] == 0) {
    header('Location: ../authentification.html');
    exit();
}
?>