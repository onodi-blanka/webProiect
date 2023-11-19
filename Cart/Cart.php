<?php
require_once "../DBController.php";
class Cart
{
    private $db;
    public function __construct()
    {
        $this->db = new DBController();
    }

    public function addToCart($userId, $eventId, $numberOfTickets)
    {
        $query = "INSERT INTO cart (UserID, EventID, NumberOfTickets) VALUES (?, ?, ?)";
        if ($stmt = $this->db->prepare($query)) {
            $stmt->bind_param("iii", $userId, $eventId, $numberOfTickets);
            $stmt->execute();
            $stmt->close();
        } else {
            throw new Exception("Nu se poate executa insert.");
        }
    }

    //fara update de cart daca iei un singur bilet
    public function updateCart($cartId, $numberOfTickets)
    {
        $query = "UPDATE cart SET NumberOfTickets = ? WHERE ID = ?";
        if ($stmt = $this->db->prepare($query)) {
            $stmt->bind_param("ii", $numberOfTickets, $cartId);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "ERROR: nu se poate executa update.";
        }
    }


    public function removeFromCart($cartId)
    {
        $query = "DELETE FROM cart WHERE ID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $cartId);
        $stmt->execute();
        $stmt->close();
    }


    public function getCartItems($userID)
    {
        echo "<p>am ajuns aici $userID</p>";
        $query = "SELECT * FROM cart WHERE UserID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $items;
    }

//    public function getCartItems($userID)
//    {
//        echo "<p>am ajuns aici $userID</p>";
//        $query = "SELECT * FROM cart WHERE UserID = ?";
//        if ($stmt = $this->db->prepare($query)) {
//            $stmt->bind_param("i", $userID);
//            if ($stmt->execute()) {
//                $result = $stmt->get_result();
//                $items = $result->fetch_all(MYSQLI_ASSOC);
//                $stmt->close();
//                return $items;
//            } else {
//                // Handle execution error
//                $stmt->close();
//                throw new Exception('Error executing the statement');
//            }
//        } else {
//            // Handle preparation error
//            throw new Exception('Error preparing the statement');
//        }
//    }


    // function that gets the cart of the current user
    public function getCartUser($userID)
    {
        $query = "SELECT FROM cart WHERE UserID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $item = $result->fetch(MYSQLI_ASSOC);
        $stmt->close();
        echo "<p>$item</p>";
        return $item;
    }
}

?>
