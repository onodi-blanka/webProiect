<?php
require_once 'DBController.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obținerea datelor din formular
    $username = $_POST['username'];
    $password = $_POST['password']; // Parola ar trebui să fie hash-uită
    $email = $_POST['email']; // Asigură-te că adresa de email este validă

    // Validare și curățare date
    if (empty($username) || empty($password) || empty($email)) {
        exit('Completează toate câmpurile.');
    }

    // Validează adresa de email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit('Adresa de email nu este validă.');
    }

    // Hash-uirea parolei
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Crearea unei noi instanțe a clasei DBController
    $db = new DBController();
    $conn = DBController::getConnection();

    // Verifică dacă există deja un utilizator cu acest username
    if ($stmt = $conn->prepare("SELECT id FROM users WHERE Name = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            echo "Acest nume de utilizator este deja luat. Te rugăm să alegi altul.";
            $stmt->close();
            exit();
        }
        $stmt->close();
    }

    // Inserarea noului utilizator în baza de date
    if ($stmt = $conn->prepare("INSERT INTO users (Name, Password, Email) VALUES (?, ?, ?)")) {
        $stmt->bind_param("sss", $username, $hashed_password, $email);
        $stmt->execute();
        echo "Te-ai înregistrat cu succes!";
        $stmt->close();
    } else {
        echo "Ceva nu a funcționat corect. Te rugăm să încerci din nou mai târziu.";
    }

    $conn->close();
}
?>
