<?php
session_start();

require_once 'DBController.php';

$db = new DBController();
$conn = DBController::getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($stmt = $conn->prepare("SELECT * FROM users WHERE Name = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verificați parola
            if (password_verify($password, $user['Password'])) {

                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['ID'] = $user['ID'];
                $_SESSION['isAdmin'] = $user['isAdmin'];

//                header("location: Dashboard/public/index.html");
                header("location: Cart/Get.php");
            } else {
                echo "<p>am ajuns aici</p>";
                echo "Parolă incorectă.";
            }
        } else {
            echo "Nume utilizator incorect.";
        }
        $stmt->close();
    }
}
?>


