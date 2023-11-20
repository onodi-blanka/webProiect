<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="create_event_style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="script.js"></script>
  <title>Royal Ticket</title>
</head>
<body>
  <nav>
    <div class="nav-container">
      <div class="logo">Royal Ticket</div>
      <ul class="nav-list">
        <li><a href="index.php">Home</a></li>
        <li><a href="contact_page.php">Contact Us</a></li>
        <li><a href="#">Create Event</a></li>
        <li><a href="login_page.php">Login/Register</a></li>
        <li><a href="cart_page.php">My Cart</a></li>
      </ul>
      <div class="search-bar">
        <input type="text" placeholder="Search">
        <button type="submit">Search</button>
      </div>
    </div>
  </nav>

  <div class="container">
    <form class="create-form">
                <h2>Create new event</h2>
                <label for="eventname">Event Name:</label>
                <input type="text" placeholder="Enter Name" id="eventname" name="eventname" required>

                <label for="date">Event Date:</label>
                <input type="date" placeholder="Enter Date" id="date" name="date" required>

                <label for="location">Event Location:</label>
                <input type="text" placeholder="Enter Location" id="loaction" name="location" required>

                <label for="tickets">Event Tickets:</label>
                <input type="text" placeholder="Enter Tickets" id="tickets" name="tickets" required>

                <label for="contact_name">Event Contact Name:</label>
                <input type="text" placeholder="Enter Contact Name" id="contact_name" name="contact_name" required>

                <label for="contact_phone">Event Contact Phone:</label>
                <input type="tel" placeholder="Enter Contact Phone" id="contact_name" name="contact_name" required>

                <label for="contact_email">Event Contact Email:</label>
                <input type="email" placeholder="Enter Contact Email" id="contact_email" name="contact_email" required>

                <input type="submit" value="Create new event">

            </form>
    </div>
</body>
</html>