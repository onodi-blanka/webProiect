<?php

$Name = htmlentities($_POST['Name'], ENT_QUOTES);
$Event = htmlentities($_POST['Event'], ENT_QUOTES);
$Email = htmlentities($_POST['Email'], ENT_QUOTES);
$isAdmin = htmlentities($_POST['isAdmin'], ENT_QUOTES);

$subject = "Hello, $Name, you are invited to the $Event";
$message = "$Name, you can now check the event details at ";

mail(
    $Email,
    $subject,
    $message
);

?>