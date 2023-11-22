<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Cart </title>
	<link rel="stylesheet" type="text/css" href="cart_style.css">
</head>
<body>
<nav>
    <div class="nav-container">
        <div class="logo">Royal Ticket</div>
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="login_page.php">Login/Register</a></li>
            <li><a href="cart_page.php">My Cart</a></li>
        </ul>
    </div>
</nav>

  <header>
        <h1>My Shopping Cart</h1>
    </header>

    <main>
        <div class="cart-items">
            <!-- Aici vor fi listate elementele din coș -->
            <div class="item">
                <div class="item-details">
                    <!-- Afișează informațiile despre produs -->
                    <h2>Nume Produs</h2>
                    <p>Price: $XX</p>
                    <p>Quantity: X</p>
                    <button class="remove-btn">Remove</button>
                </div>
            </div>
        </div>

        <div class="cart-summary">
            <!-- Aici va fi afișat rezumatul coșului -->
            <h2>Cart Summary</h2>
            <p>Total: $XX</p>
            <button class="checkout-btn">Checkout</button>
        </div>
    </main>
    <footer>
        <!-- Footer content -->
        <p>&copy; 2023 Royal Ticket. Toate drepturile rezervate.</p>
    </footer>

</body>
</html>