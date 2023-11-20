<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="register_style.css">
</head>
<body>
<nav>
    <div class="nav-container">
      <div class="logo">Royal Ticket</div>
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="contact_page.php">Contact Us</a></li>
        <li><a href="create_event.php">Create Event</a></li>
        <li><a href="login_page.php">Login/Register</a></li>
        <li><a href="cart_page.php">My Cart</a></li>
      </ul>
      <div class="search-bar">
        <input type="text" placeholder="Search">
        <button type="submit">Search</button>
      </div>
    </div>
  </nav>

<form action="action_page.php">
  <div class="register-container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit" class="registerbtn">Register</button>
  </div>

  <div class="signin">
    <p>Already have an account? <a href="login_page.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html> 
