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
            <li><a href="login_page.php">Login/Register</a></li>
            <li><a href="cart_page.php">My Cart</a></li>
        </ul>
    </div>
</nav>
    <div class="login-container">
    <form class="login-form" action="../Auth.php" method="post">
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
            </form>
    </div>
            <div>
                 <span class="password">Don't have an account? <a href="../Registration.html"><br>Create one here.</a></br></span>
            </div>
</body>
</html> 
