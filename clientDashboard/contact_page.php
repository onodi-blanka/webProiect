<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact_style.css">
    <title>Contact Us</title>
</head>
<body>
<nav>
    <div class="nav-container">
      <div class="logo">Royal Ticket</div>
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="login_page.php">Login/Register</a></li>
        <li><a href="cart_page.php">My Cart</a></li>
      </ul>
      <div class="search-bar">
        <input type="text" placeholder="Search">
        <button type="submit">Search</button>
      </div>
    </div>
  </nav>
     <div class="contact-container">
        <div class="contact-header">
                <h2>If you have any kind of questions, please don't hesitate to contact us</h2>
                <p>Phone: +1 (555) 123-4567</p>
                <p>Fax: +1 (555) 987-6543</p>
            </div>
        <div class="contact-content">
            <div class="contact-form">
                <form action="process_contact.php" method="post">
                    <label for="name">Name*</label>
                    <input type="text" id="name" name="name" required>

                    <label for="phone">Phone*</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="email">Email*</label>
                    <input type="email" id="email" name="email" required>

                    <label for="message">Your message*</label>
                    <textarea id="message" name="message" rows="4" required></textarea>

                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
    </div> 
</body>
</html>
