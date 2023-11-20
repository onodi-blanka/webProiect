<?php
require_once "../DBController.php";

class Cart
{
    private $db;

    public function __construct()
    {
        $this->db = new DBController();
    }

    public function addToCart($userId, $eventId)
    {
        $query = "INSERT INTO cart (UserID, EventID, NumberOfTickets) VALUES (?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($query);
        if ($stmt === false) {
            throw new Exception("Nu se poate executa insert.");
        }

        $stmt->bind_param("iii", $userId, $eventId);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        $stmt->close();
    }

    public function updateCart($cartId, $numberOfTickets)
    {
        $query = "UPDATE cart SET NumberOfTickets = ? WHERE ID = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        if ($stmt === false) {
            throw new Exception("ERROR: nu se poate executa update.");
        }

        $stmt->bind_param("ii", $numberOfTickets, $cartId);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        $stmt->close();
    }

    public function removeFromCart($cartId)
    {
        $query = "DELETE FROM cart WHERE ID = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        if ($stmt === false) {
            throw new Exception("ERROR: nu se poate executa delete.");
        }

        $stmt->bind_param("i", $cartId);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        $stmt->close();
    }

    public function getCartItems($userID)
    {
        $query = "SELECT * FROM cart WHERE UserID = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        if ($stmt === false) {
            throw new Exception("ERROR: nu se poate pregati interogarea.");
        }

        $stmt->bind_param("i", $userID);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        $result = $stmt->get_result();
        $items = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $items;
    }

    public function getCartUser($userID)
    {
        $query = "SELECT * FROM cart WHERE UserID = ?";
        $stmt = $this->db->getConnection()->prepare($query);
        if ($stmt === false) {
            throw new Exception("ERROR: nu se poate pregati interogarea.");
        }

        $stmt->bind_param("i", $userID);
        if (!$stmt->execute()) {
            throw new Exception($stmt->error);
        }
        $result = $stmt->get_result();
        $item = $result->fetch_assoc();
        $stmt->close();
        return $item;
    }
}
?>
