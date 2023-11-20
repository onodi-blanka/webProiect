<?php
if ($_SESSION['isAdmin'] == 0) {
    header('Location: ../unauthorized.html');
//    session_destroy();
    exit();
}
?>