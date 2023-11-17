<?php
// Începem o nouă sesiune sau continuam una existentă
global $mysqli;
session_start();

// Verificam dacă formularul a fost trimis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'ConnectDB.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query pentru a verifica dacă utilizatorul există în baza de date

    if ($stmt = $mysqli->prepare("SELECT * FROM users WHERE Name = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verificați parola
            //  if (password_verify($password, $user['Password'])) {
            if ($password == $user['Password']) {
                // Parola este corectă, inițiați datele sesiunii
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['ID'] = $user['id'];

                // Redirecționați utilizatorul către o pagină protejată
                header("location: https://www.google.com");
            } else {
                echo $password;
                echo 'chipmunk';
                echo $user['Password'];
                echo "Parolă incorectă.";
            }
        } else {
            echo "Nume utilizator incorect.";
        }

        $stmt->close();
    }
    $mysqli->close();
}
?>

