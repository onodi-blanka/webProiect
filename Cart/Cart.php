<?php

class Cart
{


    private $db;


    public function __construct($db)
    {
        $this->db = $db;
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


    public function updateCart($cartId, $numberOfTickets)
    {
        $query = "UPDATE cart SET NumberOfTickets = ? WHERE ID = ?";
        if ($stmt = $this->db->prepare($query)){
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
        $query = "SELECT * FROM cart WHERE UserID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $items;
    }
    // function that gets the cart of the current user
    public function getCartUser($userID)
    {
        $query = "SELECT * FROM cart WHERE UserID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $items;
    }
}

?>
