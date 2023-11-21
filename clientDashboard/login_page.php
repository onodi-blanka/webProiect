<!DOCTYPE html>
<html lang="en">
 <head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="login_style.css">
    <title>Login Page</title>
</head>
<body>
  <nav>
    <div class="nav-container">
      <div class="logo">Royal Ticket</div>
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="contact_page.php">Contact Us</a></li>
        <li><a href="login_page.php">Login/Register</a></li>
        <li><a href="cart_page.php">My Cart</a></li>
      </ul>
      <div class="search-bar">
        <input type="text" placeholder="Search">
        <button type="submit">Search</button>
      </div>
    </div>
  </nav>
    
    <form action="../Auth.php" method="post">
    <div class="login-container">
                <h2>Login</h2>
                <hr>
                <label for="username">Username:</label>
                <input type="text" placeholder="Enter Username" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" placeholder="Enter Password" id="password" name="password" required>
                 </hr>
                <div class="form-options">
                    <input type="checkbox" id="remember-me" name="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>

                <input type="submit" value="Login">

                <div>
                <span class="password"><a href="#">Forgot password?</a></span>
                </div>
              </div>
         </form>
    
            <div>
                 <span class="password">Don't have an account? <a href="register_page.php"><br>Create one here.</a></br></span>
            </div>

            <footer>
               <p>&copy; 2023 Royal Ticket. Toate drepturile rezervate.</p>
            </footer>
</body>
</html> 
