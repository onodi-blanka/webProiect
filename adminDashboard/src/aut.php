<?php 
    session_start();

    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'proiect_evenimente';
    $mysqli = new mysqli($hostname, $username, $password, $db);

    if(!mysqli_connect_errno())
    {
        'Connectat la baza de date: '. $db;
    }
    else
    {
        echo 'Nu se poate connecta';
        exit();
    }

    if(!isset($_POST['username'], $_POST['parola'])) 
    {
        exit('Completati username si password !');
    }

    if($stmt = $mysqli->prepare('SELECT ID, Password, isAdmin FROM users WHERE Name = ?'))
    {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();           
        if($stmt->num_rows > 0) 
        {
            $stmt->bind_result($id, $parola, $isAdmin);
            $stmt->fetch();
            if($isAdmin == 0) {
                header('Location: ../public/unauthorized.html');
                exit();
            }
            if ($_POST['parola'] == $parola)
            {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                $_SESSION['isAdmin'] = $isAdmin;
                echo 'Bine ati venit' . $_SESSION['name'] . '!';
                header('Location: ../public/index.php');
            } 
            else 
            {
                echo 'Incorect 1!';
            }
        } 
        else 
        {
            echo 'Incorect 2!';
        }
        
        $stmt->close();
    }
?>