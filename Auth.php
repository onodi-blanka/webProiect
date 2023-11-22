<?php
session_start();

// If the user is already logged in, redirect to the dashboard
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: clientDashboard/index.php");
    exit;
}

require_once 'DBController.php';

$db = new DBController();
$conn = $db::getConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($stmt = $conn->prepare("SELECT ID, Name, Password, isAdmin FROM users WHERE Name = ?")) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verify the password
            if (password_verify($password, $user['Password'])) {
                // Regenerate session ID to prevent session fixation attacks
                session_regenerate_id();

                // Set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user['Name'];
                $_SESSION['ID'] = $user['ID'];
                $_SESSION['isAdmin'] = $user['isAdmin'];

                // Redirect to the dashboard
                header("Location: clientDashboard/index.php");
                exit;
            } else {
                echo "Parolă incorectă.";
            }
        } else {
            echo "Nume utilizator incorect.";
        }
        $stmt->close();
    }
    $conn->close();
}
?>
